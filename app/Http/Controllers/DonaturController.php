<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\User;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $donaturs = User::latest()->where('role', 'user')->get();

        return view('admin.pages.donatur.index', compact('donaturs'));
    }
}
