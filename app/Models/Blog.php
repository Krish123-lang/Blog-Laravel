<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    static public function getRecord()
    {
        $return = self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id');

        if (!empty(Request::get('id'))) {
            $return = $return->where('blog.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('username'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('username') . '%');
        }

        if (!empty(Request::get('title'))) {
            $return = $return->where('blog.title', 'like', '%' . Request::get('title') . '%');
        }

        if (!empty(Request::get('category'))) {
            $return = $return->where('category.name', 'like', '%' . Request::get('category') . '%');
        }

        if (!empty(Request::get('is_publish'))) {
            $is_publish = Request::get('is_publish');
            if ($is_publish == 100) {
                $is_publish = 0;
            }
            $return = $return->where('blog.is_publish', '=', $is_publish);
        }

        if (!empty(Request::get('status'))) {
            $status = Request::get('status');
            if ($status == 100) {
                $status = 0;
            }
            $return = $return->where('blog.status', '=', $status);
        }

        if (!empty(Request::get('start_date'))) {
            $return = $return->whereDate('blog.created_at', '>=', Request::get('start_date'));
        }

        if (!empty(Request::get('end_date'))) {
            $return = $return->whereDate('blog.created_at', '<=', Request::get('end_date'));
        }

        $return = $return->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(30);
        return $return;
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

    public function getTag()
    {
        return $this->hasMany(BlogTags::class, 'blog_id');
    }
}
