<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Donatur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        //donatur
        $donaturs = Donatur::count();

        //campaign
        $campaigns = Campaign::count();

        //donations
        $donations = Donation::where('status', 'success')->sum('amount');

        return view('admin.pages.dashboard.index', compact('donaturs', 'campaigns', 'donations'));
    }
}
