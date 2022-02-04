<?php

namespace Modules\AreaModule\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\AreaModule\Entities\GovernmentTranslation;

class Government extends Model
{
    use Translatable;

    protected $fillable = ['country_id'];

    protected $table = "governments";
    public $translatedAttributes = ['name','meta_title', 'meta_desc', 'meta_keywords', 'government_id'];
    public $translationModel = GovernmentTranslation::class;
    function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
