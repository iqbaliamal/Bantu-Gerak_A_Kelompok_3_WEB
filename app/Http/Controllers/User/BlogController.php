<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Publication::latest()->paginate(5);

        return view('user.pages.blog', compact('blogs'));
    }

    public function getBlog($slug)
    {
        $blog = Publication::where('slug', $slug)->firstOrFail();

        return view('user.pages.detailBlog', compact('blog'));
    }
}
