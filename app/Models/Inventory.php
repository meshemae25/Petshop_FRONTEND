<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

     protected $fillable = [
        'category_id',
        'name',
        'description',
        'sku',
        'price',
        'stock',
        'discount',
        'cost',
        'image',
        'status',
    ];
}
