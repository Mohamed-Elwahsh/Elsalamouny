<?php

namespace Modules\WidgetsModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\WidgetsModule\Entities\PageTranslation;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Page extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'pages';
    protected $fillable = ['photo', 'created_by'];
    public $translatedAttributes = ['title', 'content', 'meta_title','meta_desc', 'meta_keywords', 'slug'];
    public $translationModel = PageTranslation::class;
}
