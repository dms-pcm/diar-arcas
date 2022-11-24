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

class PengajuanController extends Controller
{
    protected $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('public');
    }

    public function index()
    {
        $userid = Auth::id();

        $show_data = Pengajuan::where('id_user',$userid)
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
                    if ($row->draft == 0) {
                        $actionBtn = '<a href="javascript:void(0)" onclick="viewPengajuan('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    } else {
                        $actionBtn = '<a href="javascript:void(0)" onclick="editUser('.$row->id.')" class="btn btn-sm btn-warning text-white"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                    <a href="javascript:void(0)" onclick="viewPengajuan('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function storeIzin(Request $request)
    {
        $attachment = null;
        
        try {
            DB::beginTransaction();
            $rules = [
                'attachment' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png',
                'nama_karyawan' => 'required',
                'jabatan_karyawan' => 'required',
                'jenis_izin' => 'required',
                'tgl_izin' => 'required',
                'lama_izin' => 'required',
                'alasan' => 'required'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'mimetypes' => ':attribute yand diperbolehkan berupa file .jpeg, .jpg, .png',
            ];

            $attributes = [
                'attachment' => 'Surat Dokter',
                'nama_karyawan' => 'Nama Karyawan',
                'jabatan_karyawan' => 'Jabatan Karyawan',
                'jenis_izin' => 'Jenis Izin',
                'tgl_izin' => 'Tanggal Izin',
                'lama_izin' => 'Lama Izin',
                'alasan' => 'Alasan'
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            if (!empty($request->attachment)) {
                if (!$request->attachment->isValid()) {
                    $this->responseCode = 422;
                    $this->responseMessage = 'Tidak dapat mengunggah lampiran.';

                    return response()->json($this->getResponse(), $this->responseCode);
                }
                
                $path = $this->uploadPath($request->attachment->getMimeType());

                if (!$this->storage->exists($path)) {
                    $this->storage->makeDirectory($path);
                }
                
                $attachment = $request->attachment->store($path, 'public');
            }

            $userId = Auth::id();

            if ($request->jenis_izin == 0) {//izin lainnya
                $data_pengajuan = Pengajuan::create([
                    'id_user' => $userId,
                    'nama_karyawan' => $request->nama_karyawan,
                    'jabatan_karyawan' => $request->jabatan_karyawan,
                    'jenis_izin' => $request->jenis_izin,
                    'tgl_izin' => $request->tgl_izin,
                    'lama_izin' => $request->lama_izin,
                    'alasan' => $request->alasan
                ]);
            } elseif($request->attachment == null && $request->jenis_izin == 1){//izin sakit
                $data_pengajuan = Pengajuan::create([
                    'id_user' => $userId,
                    'nama_karyawan' => $request->nama_karyawan,
                    'jabatan_karyawan' => $request->jabatan_karyawan,
                    'jenis_izin' => $request->jenis_izin,
                    'tgl_izin' => $request->tgl_izin,
                    'lama_izin' => $request->lama_izin,
                    'alasan' => $request->alasan,
                    'draft' => $request->draft
                ]);
            } else{
                $data_pengajuan = Pengajuan::create([
                    'attachment' => $attachment,
                    'id_user' => $userId,
                    'nama_karyawan' => $request->nama_karyawan,
                    'jabatan_karyawan' => $request->jabatan_karyawan,
                    'jenis_izin' => $request->jenis_izin,
                    'tgl_izin' => $request->tgl_izin,
                    'lama_izin' => $request->lama_izin,
                    'alasan' => $request->alasan
                ]);
            }
            
            $this->responseCode = 200;
            $this->responseMessage = 'Data pengajuan berhasil disimpan.';
            $this->responseData['data_pengajuan'] = $data_pengajuan;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            $this->storage->delete($attachment);
            
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function edit(Request $request, $id)
    {
        $attachment = null;
        
        try {
            DB::beginTransaction();
            $rules = [
                'attachment' => 'required|mimetypes:image/jpeg,image/jpg,image/png',
                'nama_karyawan' => 'required',
                'jabatan_karyawan' => 'required',
                'jenis_izin' => 'required',
                'tgl_izin' => 'required',
                'lama_izin' => 'required',
                'alasan' => 'required'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'mimetypes' => ':attribute wajib diisi dan yang diperbolehkan berupa file .jpeg, .jpg, .png',
            ];

            $attributes = [
                'attachment' => 'Surat Dokter',
                'nama_karyawan' => 'Nama Karyawan',
                'jabatan_karyawan' => 'Jabatan Karyawan',
                'jenis_izin' => 'Jenis Izin',
                'tgl_izin' => 'Tanggal Izin',
                'lama_izin' => 'Lama Izin',
                'alasan' => 'Alasan'
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            if (!empty($request->attachment)) {
                if (!$request->attachment->isValid()) {
                    $this->responseCode = 422;
                    $this->responseMessage = 'Tidak dapat mengunggah lampiran.';

                    return response()->json($this->getResponse(), $this->responseCode);
                }
                
                $path = $this->uploadPath($request->attachment->getMimeType());

                if (!$this->storage->exists($path)) {
                    $this->storage->makeDirectory($path);
                }
                
                $attachment = $request->attachment->store($path, 'public');
            }

            $userId = Auth::id();
            $edit = Pengajuan::find($id);
            
            if ($edit) {
                $data = [
                    'id_user' => $userId,
                    'nama_karyawan' => $request->nama_karyawan,
                    'jabatan_karyawan' => $request->jabatan_karyawan,
                    'jenis_izin' => $request->jenis_izin,
                    'tgl_izin' => $request->tgl_izin,
                    'lama_izin' => $request->lama_izin,
                    'alasan' => $request->alasan,
                    'draft' => '0'
                ];
                if (!empty($request->attachment)) {
                    $data['attachment'] = $attachment;
                }

                $update = $edit->update($data);
            }
            
            $this->responseCode = 200;
            $this->responseMessage = 'Data pengajuan berhasil disimpan.';
            $this->responseData['data_pengajuan'] = $edit;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
            
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function indexCuti()
    {
        $user = Auth::id();

        $tampil_data = Pengajuan::where('id_user',$user)
                            ->where('jenis_izin','2')
                            ->get();

        return Datatables::of($tampil_data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="viewCuti('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function storeCuti(Request $request)
    {        
        try {
            DB::beginTransaction();
            $rules = [
                'nama_karyawan' => 'required',
                'jabatan_karyawan' => 'required',
                'tgl_izin' => 'required',
                'lama_izin' => 'required',
                'alasan' => 'required'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.'
            ];

            $attributes = [
                'nama_karyawan' => 'Nama Karyawan',
                'jabatan_karyawan' => 'Jabatan Karyawan',
                'tgl_izin' => 'Tanggal Cuti',
                'lama_izin' => 'Durasi Cuti',
                'alasan' => 'Alasan'
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            $userId = Auth::id();
            
            $data_cuti = Pengajuan::create([
                'id_user' => $userId,
                'nama_karyawan' => $request->nama_karyawan,
                'jabatan_karyawan' => $request->jabatan_karyawan,
                'jenis_izin' => '2',
                'tgl_izin' => $request->tgl_izin,
                'lama_izin' => $request->lama_izin,
                'alasan' => $request->alasan
            ]);
            
            $this->responseCode = 200;
            $this->responseMessage = 'Data cuti berhasil disimpan.';
            $this->responseData['data_cuti'] = $data_cuti;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function indexLembur()
    {
        $user = Auth::id();

        $tampil_data = Pengajuan::where('id_user',$user)
                            ->where('jenis_izin','3')
                            ->get();

        return Datatables::of($tampil_data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="viewLembur('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function indexLemburAdmin()
    {
        $tampil_data = Pengajuan::where('jenis_izin','3')
                            ->get();

        return Datatables::of($tampil_data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="viewLemburAdmin('.$row->id.')" class="btn btn-sm btn-cyan text-white"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function storeLembur(Request $request)
    {        
        try {
            DB::beginTransaction();
            $rules = [
                'nama_karyawan' => 'required',
                'jabatan_karyawan' => 'required',
                'tgl_izin' => 'required',
                'lama_izin' => 'required',
                'selesai_lembur' => 'required',
                'alasan' => 'required'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.'
            ];

            $attributes = [
                'nama_karyawan' => 'Nama Karyawan',
                'jabatan_karyawan' => 'Jabatan Karyawan',
                'tgl_izin' => 'Tanggal Lembur',
                'lama_izin' => 'Durasi Lembur',
                'selesai_lembur' => 'Selesai Lembur',
                'alasan' => 'Alasan'
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            // $userId = Auth::id();
            
            $data_lembur = Pengajuan::create([
                'id_user' => $request->id_user,
                'nama_karyawan' => $request->nama_karyawan,
                'jabatan_karyawan' => $request->jabatan_karyawan,
                'jenis_izin' => '3',
                'tgl_izin' => $request->tgl_izin,
                'lama_izin' => $request->lama_izin,
                'selesai_lembur' => $request->selesai_lembur,
                'alasan' => $request->alasan
            ]);
            
            $this->responseCode = 200;
            $this->responseMessage = 'Data lembur berhasil disimpan.';
            $this->responseData['data_lembur'] = $data_lembur;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    private function uploadPath($blob, $path = 'data-pengajuan-izin') {
        $data = [];

        if (!is_null($path)) {
            $data[] = $path;
        }

        switch ($blob) {
            case 'image/jpeg':
                $data[] = 'images';
                break;

            case 'image/jpg':
                $data[] = 'images';
                break;

            case 'image/png':
                $data[] = 'images';
                break;
            
            default:
                $data[] = 'others';
                break;
        }

        return implode('/', $data);
    }
}
