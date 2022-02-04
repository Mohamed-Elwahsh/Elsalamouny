<?php

namespace Modules\ServiceModule\Entities\ServiceMod;

use Illuminate\Database\Eloquent\Model;
use Modules\ServiceModule\Entities\ServiceCategory\ServiceCategory;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Service extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'service';
    protected $fillable = ['feature','photo','cover_photo', 'service_category_id', 'created_by'];
    public $translatedAttributes = ['slug', 'title', 'description', 'meta_title', 'meta_desc', 'meta_keywords'];
    public $translationModel = ServiceTranslation::class;

    # Relation
    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
