<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignUserController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->paginate(6);
        return view('user.pages.listCampaign', compact('campaigns'));
    }
}
