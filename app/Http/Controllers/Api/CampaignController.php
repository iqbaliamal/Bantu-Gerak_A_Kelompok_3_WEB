<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data campaigns
        // $campaigns = Campaign::with('user')->with('sumDonation')->when(request()->q, function ($campaigns) {
        //     $campaigns = $campaigns->where('title', 'like', '%' . request()->q . '%');
        // })->latest()->get();

        $campaigns = Campaign::with('user')->with('sumDonation')->latest()->get();



        //return with response JSON
        return response()->json([
            'success' => 1,
            'message' => 'List Data Campaigns',
            'campaigns'    => $campaigns,
        ], 200);
    }

    /**
     * show
     *
     * @param  mixed $slug
     * @return void
     */
    public function show($slug)
    {
        //get detail data campaign
        $campaign = Campaign::with('user')->with('sumDonation')->where('slug', $slug)->first();

        //get data donation by campaign
        $donations = Donation::with('user')->where('campaign_id', $campaign->id)->where('status', 'success')->latest()->get();

        if ($campaign) {

            //return with response JSON
            return response()->json([
                'success'   => 1,
                'message'   => 'Detail Data Campaign : ' . $campaign->title,
                'data'      => $campaign,
                'donations' => $donations
            ], 200);
        }

        //return with response JSON
        return response()->json([
            'success' => 0,
            'message' => 'Data Campaign Tidak Ditemukan!',
        ], 404);
    }
}
