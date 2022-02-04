<?php

namespace Modules\WidgetsModule\Entities\Team;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Team extends Model implements TranslatableContract
{
    protected $table = 'teams';

    use Translatable;
    public $translatedAttributes = ['name', 'job_title', 'description', 'meta_title', 'meta_desc', 'meta_keywords', 'slug'];

    protected $fillable =
    [
        'photo', 'created_by', 'skills', 'experience', 'phone', 'email', 'facebook', 'twitter', 'skype', 'instagram', 'youtube'
    ];

    public $translationModel = TeamTranslations::class;
}
