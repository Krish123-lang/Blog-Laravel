<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTags extends Model
{
    protected $table = 'blog_tags';

    static public function InsertDeleteTags($blog_id, $tags)
    {
        BlogTags::where('blog_id', '=', $blog_id)->delete();
        if (!empty($tags)) {
            $tagsarray = explode(",", $tags);
            foreach ($tagsarray as $tag) {
                $save = new BlogTags;
                $save->blog_id = $blog_id;
                $save->name = trim($tag);
                $save->save();
            }
        }
    }
}
