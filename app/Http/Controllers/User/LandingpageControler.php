<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class LandingpageControler extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        return view('user.pages.index', compact('campaigns'));
    }
}
