<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\OrdersDetailModel;
use App\Models\CustomersModel;

class OrdersModel extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'order_id',
        'order_status',
        'order_total',
        'customer_id',
    ];

    public function details()
    {
        return $this->hasMany(OrdersDetailModel::class, 'order_id', 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(CustomersModel::class, 'customer_id', 'customer_id');
    }
}
