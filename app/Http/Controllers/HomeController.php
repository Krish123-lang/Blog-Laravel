<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data['meta_title'] = 'Blog';
        return view('home.home', $data);
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
        $getCategory = Category::getSlug($slug);
        if (!empty($getCategory)) {
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $data['header_title'] = $getCategory->title;

            $data['getRecord'] = Blog::getRecordFrontCategory($getCategory->id);
            return view('home.blog', $data);
        } else {
            $getRecord = Blog::getRecordSlug($slug);
            if (!empty($getRecord)) {
                $data['getCategory'] = Category::getCategory();
                $data['getRecentPost'] = Blog::getRecentPost();
                $data['getRelatedPost'] = Blog::getRelatedPost($getRecord->category_id, $getRecord->id);
                $data['getRecord'] = $getRecord;

                $data['meta_title'] = $getRecord->title;
                $data['meta_description'] = $getRecord->meta_description;
                $data['meta_keywords'] = $getRecord->meta_keywords;

                return view('home.blog_detail', $data);
            } else {
                abort(404);
            }
        }
    }

    public function contact()
    {
        return view('home.contact');
    }
}
