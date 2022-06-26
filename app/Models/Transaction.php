<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'code',
        'date',
        'customer_name',
        'customer_phone',
        'name',
        'price',
        'discount',
        'total',
        'note'
    ];
}
