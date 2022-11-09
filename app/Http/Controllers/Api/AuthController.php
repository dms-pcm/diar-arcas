<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Resources\UserResource;
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
}
