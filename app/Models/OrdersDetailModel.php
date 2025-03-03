<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\OrdersModel;
use App\Models\ProductsModel;

class OrdersDetailModel extends Model
{
    protected $table = 'orders_detail';

    protected $primaryKey = 'od_id';
    public $incrementing = false;
    protected $keyType = 'integer';

    public $timestamps = false;

    protected $fillable = [
        'od_id',
        'order_id',
        'product_id',
        'od_qty'
    ];

    public function order()
    {
        return $this->belongsTo(OrdersModel::class, 'order_id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductsModel::class, 'product_id', 'product_id');
    }
}
