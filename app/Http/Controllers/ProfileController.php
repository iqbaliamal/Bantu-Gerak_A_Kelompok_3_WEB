<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id)
    {
        $profil = User::find($id);
        if (!$profil) return view('error-404');

        return view('admin.pages.profil.index', compact('profil'));
    }

    public function update(Request $request, $id, User $user)
    {
        # code...
        $isPasswordExist = false;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($request->password) {
            $this->validate(
                $request,
                [
                    'password' => 'required|required_with:password|confirmed',
                    'password_confirmation' => 'required',
                ],
                [
                    'password.required' => 'password wajib diisi',
                    'password.required_with' => 'rahasiakan password anda',
                    'password.confirmed' => 'ulangi password anda',
                    'password_confirmation.required' => 'konfirmasi ulang password wajib diisi',
                ]
            );
            $isPasswordExist = true;
        }

        //check jika image kosong
        if ($request->file('avatar') == '') {

            //update data tanpa image
            $admin = User::findOrFail($id);
            $admin->update([
                'name'     => $request->name,
                'password' => $isPasswordExist ? Hash::make($request->password) :  $admin->password,
            ]);
        } else {
            //hapus image lama
            // $image_path = "/public/users/" . basename($user->avatar);
            // unlink($image_path);
            // User::disk('local')->delete('public/users/' . basename($user->avatar));

            //upload image baru
            $image = $request->file('avatar');
            $image->storeAs('public/users', $image->hashName());

            //update dengan image baru
            $admin = User::findOrFail($id);
            $admin->update([
                'name'         => $request->name,
                'password'      => $isPasswordExist ? Hash::make($request->password) :  $admin->password,
                'avatar'         => $image->hashName(),
            ]);
        }
        //update admin
        // $admin = User::find($id);
        // $admin->name = $request->name;
        // $admin->password = $isPasswordExist ? Hash::make($request->password) :  $admin->password;
        // $admin->email = $request->email;
        // //update foto
        // if ($request->hasFile('avatar')) {
        //     if (file_exists($admin->avatar)) {
        //         // dd($admin->foto_user);
        //         unlink($admin->avatar);
        //     }

        //     // $image = $request->avatar;
        //     // $imageName = time() . $image->getClientOriginalName();
        //     // $image->move('avatar/', $imageName);
        //     // $imagePath = 'avatar/' . $imageName;
        //     if ($request->hasFile('avatar')) {
        //         $admin->avatar = $admin->avatar;
        //     } else {
        //         $admin->avatar = 'avatar/' . $imageName;
        //     }
        // }
        // $admin->save();

        return redirect()->back();
    }
}
