<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Config extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['display_name','value'];
    protected $fillable = ['is_static','static_value','type','category_id'];
    public function config_categories()
    {
        return $this->belongsTo(Config_category::class);
    }
}
