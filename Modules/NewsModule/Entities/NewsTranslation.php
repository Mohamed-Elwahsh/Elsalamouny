<?php

namespace Modules\NewsModule\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model 
{

    protected $table = 'news_translations';
    protected $fillable = ['title', 'short_desc', 'desc','category_id'];
    public $timestamps = false;

    
}