<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'order_id',
        'order_total',
        'customer_id',
    ];
}
