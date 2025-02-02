<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function blog_list()
    {
        return view('backend.blog.list');
    }

    public function blog_add()
    {
        $data['getCategory'] = Category::getCategory();
        return view('backend.blog.add', $data);
    }

    // public function blog_store(Request $request)
    // {
    //     // dd($request->all());
    //     $save = new Blog();
    //     $save->user_id = Auth::user()->id;
    //     $save->title = trim($request->title);
    //     $save->category_id = trim($request->category_id);
    //     $save->description = trim($request->description);
    //     $save->meta_description = trim($request->meta_description);
    //     $save->meta_keywords = trim($request->meta_keywords);
    //     $save->is_publish = trim($request->is_publish);
    //     $save->status = trim($request->status);
    //     $save->save();

    //     $slug = Str::slug($request->title);
    //     $checkSlug = Blog::where('slug', '=', $slug)->first();
    //     if (!empty($checkSlug)) {
    //         $dbslug = $slug . '-' . $save->id;
    //     } else {
    //         $dbslug = $slug;
    //     }
    //     $save->slug = $dbslug;

    //     if (!empty($request->file('image_file'))) {
    //         $ext = $request->file('image_file')->getClientOriginalExtension();
    //         $file = $request->file('image_file');
    //         $filename = $dbslug . '.' . $ext;
    //         $file->move('uploads/blog/', $filename);
    //         $save->image_file = $filename;
    //     }

    //     $save->save();
    //     return to_route('backend.blog.list')->with('success', 'Blog Created Successfully!');
    // }

    public function blog_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'is_publish' => 'nullable|integer|in:0,1',
            'status' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $save = new Blog();
        $save->user_id = Auth::user()->id;
        $save->title = trim($request->title);
        $save->category_id = trim($request->category_id);
        $save->description = trim($request->description);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);

        $save->is_publish = $request->is_publish ?? 0;

        $save->status = $request->status ?? 1;

        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = Blog::where('slug', '=', $slug)->first();
        if (!empty($checkSlug)) {
            $dbslug = $slug . '-' . $save->id;
        } else {
            $dbslug = $slug;
        }
        $save->slug = $dbslug;

        if (!empty($request->file('image_file'))) {
            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $dbslug . '.' . $ext;
            $file->move('uploads/blog/', $filename);
            $save->image_file = $filename;
        }

        $save->save();

        return to_route('backend.blog.list')->with('success', 'Blog Created Successfully!');
    }
}
