<?php

namespace Modules\AreaModule\Entities;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    protected $table = 'countries_translations';

    protected $fillable = ['name'];
    public $timestamps = false;
}
