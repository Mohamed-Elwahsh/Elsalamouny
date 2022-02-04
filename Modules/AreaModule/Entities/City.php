<?php

namespace Modules\AreaModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Modules\BlogModule\Entities\Blog;

class City extends Model
{
    use Translatable;

    protected $fillable = ['government_id','type'];

    protected $table = "cities";
    public $translatedAttributes = ['name'];
    public $translationModel = CityTranslation::class;
    function government(){
        return $this->belongsTo(Government::class,'government_id');
    }

    public function blogs(){
        return $this->hasMany(Blog::class,'city_id');
    }
}
