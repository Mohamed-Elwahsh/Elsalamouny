<?php

namespace Modules\NewsModule\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\NewsModule\Entities\NewsTranslation;
use Modules\NewsModule\Entities\Category;

class News extends Model 
{

    use Translatable;

    protected $table = 'news';
    public $timestamps = false;
    protected $fillable = ['category_id','photo'];
    public $translatedAttributes = ['title', 'short_desc', 'desc'];
    public $translationModel = NewsTranslation::class;
    
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}