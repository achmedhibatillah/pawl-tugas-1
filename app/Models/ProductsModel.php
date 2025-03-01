<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'product_id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'product_id',
        'product_name',
        'product_slug',
        'product_price',
        'product_photo',
        'product_status',
    ];
}
