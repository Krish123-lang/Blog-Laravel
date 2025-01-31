<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog_list()
    {
        return view('backend.blog.list');
    }

    public function blog_add()
    {
        return view('backend.blog.add');
    }
}
