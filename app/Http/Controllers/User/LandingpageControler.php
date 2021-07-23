<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Program;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class LandingpageControler extends Controller
{
    public function index()
    {
        // $campaigns = Campaign::orderBy('id', 'desc')->limit(8)->get();
        $campaigns = Campaign::with('user')->with('sumDonation')->limit(8)->get();
        $programs = Program::all();
        $publications = Publication::orderBy('id', 'desc')->limit(6)->get();

        $campaigns_count = Campaign::count();

        $sum_donations = Donation::where('status', 'success')->sum('amount');

        $donaturs_count = User::where('role', 'user')->count();

        $programs_count = Program::count();




        $danaSementara = Donation::selectRaw('donations.campaign_id,SUM(donations.amount) as total')->where('donations.status', 'success')->groupBy('donations.campaign_id')->first();

        return view('user.pages.index', compact('campaigns', 'programs', 'danaSementara', 'publications', 'campaigns_count', 'sum_donations', 'donaturs_count', 'programs_count'));
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
