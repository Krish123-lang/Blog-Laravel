<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    static public function getSingle($id)
    {
        return Category::find($id);
    }

    static public function getRecord()
    {
        return self::select('category.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'asc')
            ->paginate(30);
    }

    static public function getCategory()
    {
        return self::select('category.*')
            ->where('status', '=', 1)
            ->where('is_delete', '=', 0)
            ->get();
    }
}
