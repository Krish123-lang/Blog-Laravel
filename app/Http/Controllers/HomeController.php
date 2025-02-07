<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $getPage = Page::getSlug('home');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('home.home', $data);
    }

    public function about()
    {
        $getPage = Page::getSlug('about');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('home.about', $data);
    }

    public function team()
    {
        $getPage = Page::getSlug('team');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('home.team', $data);
    }

    public function gallery()
    {
        $getPage = Page::getSlug('gallery');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('home.gallery', $data);
    }

    public function contact()
    {
        $getPage = Page::getSlug('contact');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
        return view('home.contact', $data);
    }

    public function blog()
    {
        $getPage = Page::getSlug('blog');
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : '';
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
        $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';

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

    public function BlogCommentSubmit(Request $request)
    {
        $save = new BlogComment;
        $save->user_id = Auth::user()->id;
        $save->blog_id = $request->blog_id;
        $save->comment = $request->comment;
        $save->save();

        return redirect()->back()->with('success', 'Your comment has been posted!');
    }
}
