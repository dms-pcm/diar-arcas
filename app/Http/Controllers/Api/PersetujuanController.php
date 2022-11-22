<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pengajuan;
use Carbon\Carbon;

class PersetujuanController extends Controller
{
    public function index()
    {
        $show_data = "";

        $show_data = Pengajuan::all();

        return Datatables::of($show_data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="viewPersetujuan('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function setuju($id)
    {
        $data = Pengajuan::find($id);

        $update = $data->update([
            'status' => '2'
        ]);

        $this->responseCode = 200;
        $this->responseMessage = 'Data pengajuan telah disetujui.';
        $this->responseData['data_pengajuan'] = $data;

        DB::commit();

        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function direct($id)
    {
        $data = Pengajuan::find($id);

        $update = $data->update([
            'status' => '3'
        ]);

        $this->responseCode = 200;
        $this->responseMessage = 'Data pengajuan telah ditolak.';
        $this->responseData['data_pengajuan'] = $data;

        DB::commit();

        return response()->json($this->getResponse(), $this->responseCode);
    }
    
}
