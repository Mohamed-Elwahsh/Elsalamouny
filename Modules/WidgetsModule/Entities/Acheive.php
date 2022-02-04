<?php

namespace Modules\WidgetsModule\Entities;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Modules\WidgetsModule\Entities\AcheiveTranslation;

class Acheive extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'acheive';
    protected $fillable = ['icon','number'];
    public $translatedAttributes = ['title','content'];
    public $translationModel = AcheiveTranslation::class;
    
}
