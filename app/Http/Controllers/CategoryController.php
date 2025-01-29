<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list()
    {
        $data['getRecord'] = Category::getRecord();
        return view('backend.category.list', $data);
    }
}
