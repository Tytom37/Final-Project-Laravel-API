<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold_Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_id',
        'sale_id',
        'qty',
        'selling_price'
    ];
}
