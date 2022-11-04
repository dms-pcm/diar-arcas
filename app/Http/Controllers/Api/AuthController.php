<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Resources\UserResource;
use App\Models\User;
use DB;
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
                } else {
                    $this->responseCode = 401;
                    $this->responseMessage = 'User tidak ditemukan';
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
}
