<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Support\Str;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DonasiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * algorithm create no invoice
         */
        $length = 10;
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }
        $no_invoice = 'TRX-' . Str::upper($random);
        $campaign = Campaign::where('slug', $request->campaignSlug)->first();
        $amount = $request->amount;
        $user = Auth::user()->id;

        //check minimal donasi
        if ($amount < 10000) {
            return redirect()->back()->with(['error', 'Donasi minimal Rp. 10.000']);
        } else {
            $donasi = Donation::create([
                'invoice'       => $no_invoice,
                'campaign_id'   => $campaign->id,
                'user_id'       => Auth::user()->id,
                'amount'        => $request->amount,
                'pray'          => $request->pray,
                'status'        => 'pending',
            ]);

            if ($donasi) {
                return redirect()->route('admin.campaign.index');
            }

            // Buat transaksi ke midtrans kemudian save snap tokennya.
            // $payload = [
            //     'transaction_details' => [
            //         'order_id'      => $donasi->invoice,
            //         'gross_amount'  => $donasi->amount,
            //     ],
            //     'customer_details' => [
            //         'first_name'       => Auth::user()->name,
            //         'email'            => Auth::user()->email,
            //     ]
            // ];

            // //create snap token
            // $snapToken = Snap::getSnapToken($payload);
            // $donasi->snap_token = $snapToken;
            // $donasi->save();

            // $this->response['snap_token'] = $snapToken;

        }


        // return response()->json([
        //     'success' => true,
        //     'message' => 'Donasi Berhasil Dibuat!',
        //     $this->response
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}