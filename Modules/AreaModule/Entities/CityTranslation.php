<?php

namespace Modules\AreaModule\Entities;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    protected $table = 'cities_translations';

    protected $fillable = ['name'];
    public $timestamps = false;
}
