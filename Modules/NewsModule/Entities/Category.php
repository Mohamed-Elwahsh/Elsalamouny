<?php

namespace Modules\NewsModule\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\NewsModule\Entities\CategoryTranslation;
use Modules\NewsModule\Entities\News;

class Category extends Model
{
    use Translatable;

    protected $table = "categories";
    protected $fillable = ['category_id'];

    public $translatedAttributes = ['title', 'category_id'];
    public $translationModel = CategoryTranslation::class;
    // public $timestamps = false;

    function news(){
        return $this->hasMany(News::class);
    }
}
