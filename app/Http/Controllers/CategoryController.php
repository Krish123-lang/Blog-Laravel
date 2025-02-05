<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category_list()
    {
        $data['getRecord'] = Category::getRecord();
        return view('backend.category.list', $data);
    }

    public function category_add()
    {
        return view('backend.category.add');
    }

    public function category_store(Request $request)
    {
        $save = new Category();
        $save->name = trim($request->name);
        $save->slug = trim(Str::slug($request->name));
        $save->title = trim($request->title);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->status = trim($request->status);
        $save->is_menu = trim($request->is_menu);
        $save->save();
        return to_route('backend.category.list')->with('success', 'Category Created Successfully!');
    }

    public function category_edit($id)
    {
        $data['getRecord'] = Category::getSingle($id);
        return view('backend.category.edit', $data);
    }

    public function category_update(Request $request, $id)
    {
        $save = Category::getSingle($id);
        $save->name = trim($request->name);
        $save->slug = trim(Str::slug($request->name));
        $save->title = trim($request->title);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->status = trim($request->status);
        $save->is_menu = trim($request->is_menu);
        $save->save();
        return to_route('backend.category.list')->with('success', 'Category Updated Successfully!');
    }

    public function category_delete($id){
        $delete_category = Category::getSingle($id);
        $delete_category->is_delete=1;
        $delete_category->save();
        return redirect()->back()->with('success', 'Category Deleted Successfully!');
    }
}
