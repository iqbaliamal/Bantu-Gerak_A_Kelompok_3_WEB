<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profil = User::all();

        return view('admin.pages.profil.index', compact($profil));
    }

    public function update()
    {
        # code...
    }
}
