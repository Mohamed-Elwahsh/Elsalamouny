<?php

namespace Modules\WidgetsModule\Entities\Slider;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'sliders';
    protected $fillable = ['photo', 'created_by'];
    public $translatedAttributes = ['title', 'description'];
    public $translationModel = SliderTranslation::class;
}
