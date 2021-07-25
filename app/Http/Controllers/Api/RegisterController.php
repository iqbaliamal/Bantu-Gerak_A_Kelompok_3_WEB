<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * register
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request)
    {
        //set validasi
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
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

        //create user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'user',
        ]);

        //return JSON
        if ($user) {
            // jika berhasil
            return response()->json([
                'success' => 1,
                'message' => 'Register Berhasil!',
                'data'    => $user,
            ], 201);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Registrasi Gagal!',
            ], 400);
        }
        // jika gagal
        // return $this->error('Registrasi gagal!');
    }

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan,
        ], 400);
    }
}
