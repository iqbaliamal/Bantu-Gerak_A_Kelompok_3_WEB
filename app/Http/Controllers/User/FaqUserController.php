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
        $faq = Faq::all();

        return View('user.pages.faq', compact( 'faq' ));
    }
}
