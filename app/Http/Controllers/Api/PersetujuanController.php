<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pengajuan;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\NotifData;

class PersetujuanController extends Controller
{
    public function index()
    {
        $show_data = "";

        $show_data = Pengajuan::where('draft','0')
                            ->where(
                                function($query) {
                                    return $query
                                           ->where('jenis_izin','0')
                                           ->orWhere('jenis_izin','1');
                            })
                            ->get();

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

        $role = auth()->user()->role_id;
        $users = User::when($role == 2, function ($query) {
                $query->where('role_id', 3);
        })->get();

        if ($data->jenis_izin == 0) {
            Notification::send($users, new NotifData('Pengajuan izin anda telah disetujui ', route('pengajuan.ijin')));
        } elseif ($data->jenis_izin == 1) {
            Notification::send($users, new NotifData('Pengajuan izin sakit anda telah disetujui ', route('pengajuan.ijin')));
        } elseif ($data->jenis_izin == 2) {
            Notification::send($users, new NotifData('Pengajuan cuti anda telah disetujui ', route('pengajuan.cuti')));
        } elseif ($data->jenis_izin == 3 && $data->created_by != 2) {
            Notification::send($users, new NotifData('Pengajuan lembur anda telah disetujui ', route('pengajuan.lembur')));
        }
        

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

        $role = auth()->user()->role_id;
        $users = User::when($role == 2, function ($query) {
                $query->where('role_id', 3);
        })->get();

        if ($data->jenis_izin == 0) {
            Notification::send($users, new NotifData('Pengajuan izin anda telah ditolak ', route('pengajuan.ijin')));
        } elseif ($data->jenis_izin == 1) {
            Notification::send($users, new NotifData('Pengajuan izin sakit anda telah ditolak ', route('pengajuan.ijin')));
        } elseif ($data->jenis_izin == 2) {
            Notification::send($users, new NotifData('Pengajuan cuti anda telah ditolak ', route('pengajuan.cuti')));
        } elseif ($data->jenis_izin == 3 && $data->created_by != 2) {
            Notification::send($users, new NotifData('Pengajuan lembur anda telah ditolak ', route('pengajuan.lembur')));
        }

        $this->responseCode = 200;
        $this->responseMessage = 'Data pengajuan telah ditolak.';
        $this->responseData['data_pengajuan'] = $data;

        DB::commit();

        return response()->json($this->getResponse(), $this->responseCode);
    }
    
    public function indexCuti()
    {
        $show_data = Pengajuan::where('jenis_izin','2')
                    ->get();

        return Datatables::of($show_data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="viewPersetujuanCuti('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $actionBtn;  
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function indexLembur()
    {
        $show_data = Pengajuan::where('jenis_izin','3')
                    ->get();

        return Datatables::of($show_data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="viewPersetujuanLembur('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $actionBtn;  
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
