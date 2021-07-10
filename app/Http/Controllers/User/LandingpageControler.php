<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Program;
use Illuminate\Http\Request;

class LandingpageControler extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        $programs = Program::all();
        $danaSementara = Donation::where('status', 'success')->sum('amount');

        return view('user.pages.index', compact('campaigns', 'programs', 'danaSementara'));
    }

    public function getCampaign($slug)
    {
        $data = Campaign::where('slug', $slug)->firstOrFail();
        $danaSementara = Donation::where('campaign_id', $data->id)->where('status', 'success')->sum('amount');

        return view('user.pages.detailCampaign', compact('data', 'danaSementara'));
    }

    public function storeDonation(Request $request)
    {
    }
}
