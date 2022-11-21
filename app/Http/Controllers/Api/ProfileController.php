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
use App\Models\Biodata;
use Carbon\Carbon;

class ProfileController extends Controller
{
    protected $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('public');
    }

    public function index()
    {
        try {
            $userId = Auth::id();
            $data_profile = Biodata::where('id_user',$userId)->first();
            
            if (empty($data_profile)) {
                $this->responseCode = 422;
                $this->responseMessage = 'Data profile belum ada';

                return response()->json($this->getResponse(), $this->responseCode);
            }

            $this->responseCode = 200;
            $this->responseMessage = 'Data profile ditemukan.';
            $this->responseData['data_profile'] = $data_profile;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function store(Request $request)
    {
        $attachment = null;
        
        try {
            DB::beginTransaction();
            $rules = [
                'attachment' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png',
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'email' => 'required|email',
                'no_hp' => 'required|max:13|min:12'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'mimetypes' => ':attribute yand diperbolehkan berupa file .jpeg, .jpg, .png',
                'min' => ':attribute minimal harus 12 karakter.',
                'max' => ':attribute tidak boleh lebih dari 13 karakter.'
            ];

            $attributes = [
                'attachment' => 'Foto Profil',
                'nama_lengkap' => 'Nama Lengkap',
                'tempat_lahir' => 'Tempat Lahir',
                'tgl_lahir' => 'Tanggal Lahir',
                'alamat' => 'Alamat',
                'email' => 'Email',
                'no_hp' => 'Nomor Handphone'
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
            $data_profile = Biodata::where('created_by',$userId)->first();
            // $userAuth = Biodata::find(auth('api')->user()->id);

            if ($data_profile) {
                $temp = $data_profile->attachment;
                $data = [
                    'nama_lengkap' => $request->nama_lengkap,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp
                ];

                if (!empty($request->attachment)) {
                    $data['attachment'] = $attachment;
                    $this->storage->delete($temp);
                }

                $update = $data_profile->update($data);
                
                // if (empty($request->nama_lengkap)) {
            
                // }else {
                //     $updateNama = $userAuth->update([
                //         'nama_lengkap' => $request->nama_lengkap
                //     ]);
                // }
            } 
            else {
                $data_profile = Biodata::create([
                    'attachment' => $attachment,
                    'id_user' => $userId,
                    'nama_lengkap' => $request->nama_lengkap,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp
                ]);

                // if (empty($request->name)) {
            
                // }else {
                //     $updateNama = $userAuth->update([
                //         'name' => $request->name
                //     ]);
                // }
            }
            
            $this->responseCode = 200;
            $this->responseMessage = 'Data profile berhasil disimpan.';
            $this->responseData['data_profile'] = $data_profile;
            // $this->responseData['nama_karyawan'] = $userAuth;

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

    private function uploadPath($blob, $path = 'data-profile') {
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
