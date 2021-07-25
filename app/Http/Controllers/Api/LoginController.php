<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            $val = $validator->errors()->all();
            return $this->error($val[0]);
            // $errors = $validator->errors();
            // throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json(
            //     [
            //         'success' => 0,
            //         'message' => 'Error : Silahkan periksa kembali form registrasi anda',
            //     ],
            //     \Illuminate\Http\JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            // ));
            // return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => 0,
                'message' => 'Login Failed! User atau Password salah!',
            ], 401);
        }

        return response()->json([
            'success' => 1,
            'message' => 'Login Berhasil!',
            'data'    => $user,
        ], 200);
    }

    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        $removeToken = $request->user()->tokens()->delete();

        if ($removeToken) {
            return response()->json([
                'success' => 1,
                'message' => 'Logout Berhasil!',
            ]);
        }
    }

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan,
        ], 400);
    }
}
