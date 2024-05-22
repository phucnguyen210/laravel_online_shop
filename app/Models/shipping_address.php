<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping_address extends Model
{
    use HasFactory;
    protected $table = 'shippingaddress';
    protected $fillable = [
        'user_id',
        'last_name',
        'first_name',
        'email',
        'country',
        'address',
        'order_notes',
        'mobile',

    ];
}