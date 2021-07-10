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


        return view('user.pages.index', compact('campaigns', 'programs'));
    }

    public function getCampaign($slug)
    {
        $data = Campaign::where('slug', $slug)->firstOrFail();
        $danaSementara = Donation::where('status', 'success')->sum('amount');

        return view('user.pages.detailCampaign', compact('data', 'danaSementara'));
    }

    public function storeDonation(Request $request)
    {
        $this->validate($request, [
            'amount'    => 'required|string',
            'pray'      => 'required|string',
        ]);

        $amount = $request->amount;
        $pray = $request->pray;

        //check minimal donasi
        if ($amount < 10000) {
            return back()->with(['error' => 'Donasi Minimal Rp. 10.000!']);
        }
    }
}
