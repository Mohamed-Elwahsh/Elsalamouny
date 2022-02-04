<?php

namespace Modules\NewsModule\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'categories_translations';

    protected $fillable = ['title', 'category_id'];
    public $timestamps = false;
}