<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDetailModel extends Model
{
    protected $table = 'orders_detail';

    protected $primaryKey = 'od_id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'od_id',
        'order_id',
        'product_id',
    ];
}
