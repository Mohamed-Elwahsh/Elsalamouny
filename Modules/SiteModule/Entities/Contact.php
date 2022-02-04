<?php

namespace Modules\SiteModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\BlogModule\Entities\Blog;

class Contact extends Model
{
    protected $fillable = ['name','phone','description','blog_id'];

    public function blogs() {
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
