<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Midtrans\Snap;
use Illuminate\Support\Str;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DonasiUserController extends Controller
{
    public function __construct()
    {
        // Set midtrans configuration
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fungsi riwayat donasi user
        if (Auth::user()) {
            # code...
            $user_id = Auth::user()->id;
            $riwayatDonasi = Donation::with('campaign')->where('user_id', $user_id)->latest()->get();
            return view('user.pages.riwayatDonasi', compact('riwayatDonasi'));
        } else {
            return view('error-404');
        }
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
            return redirect()->back()->with(['error' => 'Donasi minimal Rp. 10.000']);
        }
        $donasi = Donation::create([
            'invoice'       => $no_invoice,
            'campaign_id'   => $campaign->id,
            'user_id'       => $user,
            'amount'        => $request->amount,
            'pray'          => $request->pray,
            'status'        => 'pending',
        ]);

        // Buat transaksi ke midtrans kemudian save snap tokennya.
        $payload = [
            'transaction_details' => [
                'order_id'      => $donasi->invoice,
                'gross_amount'  => $donasi->amount,
            ],
            'customer_details' => [
                'first_name'       => Auth::user()->name,
                'email'            => Auth::user()->email,
            ]
        ];

        //create snap token
        $snapToken = Snap::getSnapToken($payload);
        $donasi->snap_token = $snapToken;
        $donasi->save();

        // $this->response['snap_token'] = $snapToken;


        // return response()->json([
        //     'success' => true,
        //     'message' => 'Donasi Berhasil Dibuat!',
        //     $this->response
        // ]);

        if ($donasi) {
            # code...
            return redirect()->route('user.donasi.index')->with(['success' => 'Donasi Berhasil Dibuat, Silahkan lanjutkan pembayaran!']);
        } else {
            return redirect()->back()->with(['error' => 'Donasi Gagal Dibuat']);
        }
    }

    /**
     * notificationHandler
     *
     * @param  mixed $request
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $payload      = $request->getContent();
        $notification = json_decode($payload);

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . config('services.midtrans.serverKey'));

        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $transaction  = $notification->transaction_status;
        $type         = $notification->payment_type;
        $orderId      = $notification->order_id;
        $fraud        = $notification->fraud_status;

        //data donation
        $data_donation = Donation::where('invoice', $orderId)->first();

        if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

                if ($fraud == 'challenge') {

                    /**
                     *   update invoice to pending
                     */
                    $data_donation->update([
                        'status' => 'pending'
                    ]);
                } else {

                    /**
                     *   update invoice to success
                     */
                    $data_donation->update([
                        'status' => 'success'
                    ]);
                }
            }
        } elseif ($transaction == 'settlement') {

            /**
             *   update invoice to success
             */
            $data_donation->update([
                'status' => 'success'
            ]);
        } elseif ($transaction == 'pending') {


            /**
             *   update invoice to pending
             */
            $data_donation->update([
                'status' => 'pending'
            ]);
        } elseif ($transaction == 'deny') {


            /**
             *   update invoice to failed
             */
            $data_donation->update([
                'status' => 'failed'
            ]);
        } elseif ($transaction == 'expire') {


            /**
             *   update invoice to expired
             */
            $data_donation->update([
                'status' => 'expired'
            ]);
        } elseif ($transaction == 'cancel') {

            /**
             *   update invoice to failed
             */
            $data_donation->update([
                'status' => 'failed'
            ]);
        }
    }
}
