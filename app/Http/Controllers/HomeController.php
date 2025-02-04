<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.home');
    }

    public function about()
    {
        return view('home.about');
    }

    public function team()
    {
        return view('home.team');
    }

    public function gallery()
    {
        return view('home.gallery');
    }

    public function blog()
    {
        $data['getRecord'] = Blog::getRecordFront();
        return view('home.blog', $data);
    }

    public function blog_detail($slug)
    {
        $getRecord = Blog::getRecordSlug($slug);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            return view('home.blog_detail', $data);
        } else {
            abort(404);
        }
    }

    public function contact()
    {
        return view('home.contact');
    }
}
