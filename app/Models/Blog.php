<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    static public function getRecord()
    {
        return self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(30);
    }

    public function getImage()
    {
        if (!empty($this->image_file) && file_exists('uploads/blog/' . $this->image_file)) {
            return url('uploads/blog/' . $this->image_file);
        } else {
            return "";
        }
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
