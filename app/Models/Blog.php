<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'short_desc', 'content', 'category_blog_id'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_blog_id');
    }
}
