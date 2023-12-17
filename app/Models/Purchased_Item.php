<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchased_Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_id',
        'purchase_id',
        'whole_sale_qty',
        'purchase_price'
    ];
}
