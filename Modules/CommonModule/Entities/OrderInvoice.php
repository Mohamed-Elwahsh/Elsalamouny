<?php

namespace Modules\CommonModule\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderInvoice extends Model
{
    //
    protected $table="order_invoice";

    protected $fillable = [
        "customer_name","customer_email","order_id"
    ];
}

