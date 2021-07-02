<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
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
        $donaturs = Donatur::latest()->get();

        return view('admin.pages.donatur.index', compact('donaturs'));
    }
}
