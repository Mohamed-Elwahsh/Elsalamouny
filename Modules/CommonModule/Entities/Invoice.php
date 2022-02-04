<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table="invoices";

//    protected $fillable=['name','email','amount','currency','slug','trip_id','start_date'];

    protected $guarded=[];
}
