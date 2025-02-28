<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomersModel extends Model
{
    use HasFactory;

    protected $table = 'customers';
    
    protected $primaryKey = 'customer_id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_email',
        'customer_pass',
    ];
}
