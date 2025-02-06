<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function pages_list()
    {
        $data['getRecord'] = Page::getRecord();
        return view('backend.pages.list', $data);
    }

    public function pages_add()
    {
        return view('backend.pages.add');
    }

    public function pages_store(Request $request)
    {
        $save = new Page();
        $save->slug = trim($request->slug);
        $save->title = trim($request->title);

        $description = Str::of($request->description)->stripTags()->trim();
        $meta_description = Str::of($request->meta_description)->stripTags()->trim();

        $save->description = $description;
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = $meta_description;
        $save->meta_keywords = trim($request->meta_keywords);

        $save->save();
        return to_route('backend.pages.list')->with('success', 'Page Created Successfully!');
    }


    public function pages_edit($id)
    {
        $data['getRecord'] = Page::getSingle($id);
        return view('backend.pages.edit', $data);
    }

    public function pages_update(Request $request, $id)
    {
        $save = Page::getSingle($id);
        $save->slug = trim($request->slug);
        $save->title = trim($request->title);

        $description = Str::of($request->description)->stripTags()->trim();
        $meta_description = Str::of($request->meta_description)->stripTags()->trim();

        $save->description = $description;
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = $meta_description;
        $save->meta_keywords = trim($request->meta_keywords);

        $save->save();
        return to_route('backend.pages.list')->with('success', 'Page Updated Successfully!');
    }

    public function pages_delete(Page $page)
    {
        $page->delete();
        return redirect()->back()->with('success', 'Page Deleted Successfully!');
    }
}
