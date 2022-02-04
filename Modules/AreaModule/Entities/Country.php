<?php

namespace Modules\AreaModule\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\AreaModule\Entities\CountryTranslation;

class Country extends Model
{
    use Translatable;

    protected $fillable = ['phone_code', 'code', 'photo'];

    protected $table = "countries";
    public $translatedAttributes = ['name'];
    public $translationModel = CountryTranslation::class;
    
}
