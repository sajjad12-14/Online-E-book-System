<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{

    protected $fillable = [

        'name',
        'email',
        'phone',
        'city',
        'address',

        'total_amount',

        'status',

        'payment_method',

        'payment_status',

        'transaction_id'

    ];


    public function items()
    {

        return $this->hasMany(OrderItem::class);
    }
}
