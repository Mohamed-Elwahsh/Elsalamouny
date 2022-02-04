<?php

namespace Modules\BlogModule\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\AreaModule\Entities\City;
use Modules\SiteModule\Entities\Contact;

class Blog extends Model implements TranslatableContract
{
    protected $table = 'blogs';

    use Translatable;
    public $translatedAttributes = ['title','short_desc','tags', 'description', 'slug', 'meta_title', 'meta_desc', 'meta_keywords'];

    protected $fillable = ['created_by','num_of_view', 'is_featured','slug', 'photo','city_id','code','address'];

    public $translationModel = BlogTranslation::class;


    public function categories(){
        return $this->belongsToMany(BlogCategory::class,'blog_category','blog_id','blog_category_id')->withTimestamps();
    }

    public function cities(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function contacts(){
        return $this->hasMany(Contact::class,'blog_id');
    }


    public function admin()
    {
        return $this->hasOne('Modules\AdminModule\Entities\Admin','id','created_by');
    }

}
