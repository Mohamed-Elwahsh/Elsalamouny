<?php

namespace Modules\AreaModule\Entities;

use Illuminate\Database\Eloquent\Model;

class GovernmentTranslation extends Model
{
    protected $table = 'governments_translations';

    protected $fillable = ['name', 'meta_title', 'meta_desc', 'meta_keywords', 'government_id'];
    public $timestamps = false;
}
