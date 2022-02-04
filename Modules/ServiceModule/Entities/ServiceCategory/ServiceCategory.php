<?php

namespace Modules\ServiceModule\Entities\ServiceCategory;
use Modules\ServiceModule\Entities\ServiceMod\Service;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ServiceCategory extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'service_category';
    protected $fillable = ['created_by','photo','cover_photo'];
    public   $translatedAttributes = ['title', 'description','meta_title', 'meta_desc', 'meta_keywords','slug'];
    
    
    public $translationModel = ServiceCategoryTranslation::class;

    # Relation
    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
