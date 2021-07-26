<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class FaqUserController extends Controller
{
    public function index()
    {
        # code...
        $faq = Faq::orderBy('id', 'desc')->get();

        // dd($faq);

        // return View('', compact( 'faq' ));
        return view('user.pages.faq', compact('faq'));
    }
}
