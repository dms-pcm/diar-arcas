<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];

            $messages = [];

            $attributes = [
                'username' => 'Username',
                'password' => 'Password'
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Silahkan isi form dengan benar terlebih dahulu';
                $this->responseData['errors'] = $validator->errors();
            } else {
                $credentials = $request->only('username', 'password');
                $token = auth('api')->attempt($credentials);

                if (!empty($token)) {
                    if (auth('api')->user()) {
                        $userAuth = User::with('role')->find(auth('api')->user()->id);
                        $this->responseCode = 200;
                        $this->responseMessage = 'User berhasil login';
                        $this->responseData['user'] = $userAuth;
                        $this->responseData['token'] = $this->respondWithToken($token);
                    } else {
                        $this->responseCode = 401;
                        $this->responseMessage = 'User anda telah diblokir';
                    }
                } elseif (! Auth::attempt($credentials)) {
                    $this->responseCode = 401;
                    $this->responseMessage = 'Username atau Password salah.';
                }
            }
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
        }
        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function logout()
    {
        try {
            $this->guard()->logout();

            $this->responseCode = 200;
            $this->responseMessage = 'User berhasil logout';
        }
        catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
        }
        return response()->json($this->getResponse(), $this->responseCode);
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ];
    }

    public function me()
    {
        try {
            $this->responseCode = 200;
            $this->responseMessage = 'User berhasil ditampilkan';
            $this->responseData['user'] = $this->guard()->user();
        }
        catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
        }
        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    public function guard()
    {
        return Auth::guard();
    }

    public function index()
    {
        $show_user = "";
        $role = Auth::user()->role_id;

        if ($role == 1) {
            $show_user = User::where('role_id',2)->get();
        }
        elseif ($role == 2) {
            $show_user = User::where('role_id',3)->get();
        }

        return Datatables::of($show_user)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $actionBtn = '<a href="javascript:void(0)" onclick="editUser('.$row->id.')" class="btn btn-sm btn-warning text-white mr-1"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="javascript:void(0)" onclick="hapusUser('.$row->id.')" class="btn btn-sm btn-danger text-white mr-1"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $rules = [
                'name' => 'required',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:8'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'min' => ':attribute minimal 8 karakter',
                'unique' => ':attribute sudah digunakan.'
            ];

            $attributes = [
                'name' => 'Nama Lengkap',
                'username' => 'Username',
                'password' => 'Password'
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            $role = Auth::user()->role_id;
            if ($role == 1) {
                $tambahuser = User::create([
                    'name' => $request->name,
                    'role_id' => '2',
                    'username' => $request->username,
                    'password' => Hash::make($request->password)
                ]);
            }
            elseif ($role == 2) {
                $tambahuser = User::create([
                    'name' => $request->name,
                    'role_id' => '3',
                    'username' => $request->username,
                    'password' => Hash::make($request->password)
                ]);
            }


            $this->responseCode = 200;
            $this->responseMessage = 'User berhasil ditambahkan.';
            $this->responseData['data_users'] = $tambahuser;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $rules = [
                'name' => 'required',
                'username' => 'required'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'unique' => ':attribute sudah digunakan.'
            ];

            $attributes = [
                'name' => 'Nama Lengkap',
                'username' => 'Username',
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            $dataUser = [
                'name' => $request->name,
                'username' => $request->username
            ];

            $update = $user->update($dataUser);


            $this->responseCode = 200;
            $this->responseMessage = 'User berhasil diubah.';
            $this->responseData['data_users'] = $dataUser;

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function destroy($id)
    {
        $deleteUser = User::find($id);

        if (empty($deleteUser)) {
            $this->responseCode = 404;
            $this->responseMessage = 'Data user tidak ditemukan.';

            return response()->json($this->getResponse(), $this->responseCode);
        }

        $deleteUser->delete();
        $this->responseCode = 200;
        $this->responseMessage = 'Data user telah dihapus.';
        $this->responseData['data_user'] = $deleteUser;

        return response()->json($this->getResponse(), $this->responseCode);
    }

    public function changePassword(Request $request)
    {
        try {
            $rules = [
                'current_password' => 'required|string',
                'new_password' => 'required|min:8|string',
                'new_confirm_password' => 'same:new_password'
            ];

            $messages = [
                'required' => ':attribute wajib diisi.',
                'same' => ':attribute dan password baru harus cocok.',
                'min' => ':attribute harus minimal 8 karakter.'
            ];

            $attributes = [
                'current_password' => 'Password lama',
                'new_password' => 'Password baru',
                'new_confirm_password' => 'Konfirmasi password'
            ];

            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails()) {
                $this->responseCode = 422;
                $this->responseMessage = 'Form tidak valid.';
                $this->responseData['errors'] = $validator->errors();

                return response()->json($this->getResponse(), $this->responseCode);
            }

            if (!Hash::check($request->get('current_password'), Auth::user()->password)) {
                $this->responseCode = 422;
                $this->responseMessage = 'Password Saat Ini Tidak Valid';
                return response()->json($this->getResponse(), $this->responseCode);
            } else if(strcmp($request->get('current_password'), $request->new_password) == 0){
                $this->responseCode = 422;
                $this->responseMessage = 'Password Baru tidak boleh sama dengan password Anda saat ini.';
                return response()->json($this->getResponse(), $this->responseCode);
            }

            
            $user =  User::find(Auth::user()->id);
            $user->password =  Hash::make($request->new_password);
            $user->save();

            $this->responseCode = 200;
            $this->responseMessage = 'Password berhasil diubah.';

            DB::commit();

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }
}
