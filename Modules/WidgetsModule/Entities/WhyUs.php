<?php

namespace Modules\WidgetsModule\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\WidgetsModule\Entities\WhyUsTranslation;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class WhyUs extends Model implements TranslatableContract
{
	use Translatable;

	protected $table = 'why_us';
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['photo'];
    public $translationModel = WhyUsTranslation::class;
}
