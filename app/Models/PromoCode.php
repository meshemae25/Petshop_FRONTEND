<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $table = 'promocodes';

    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'discount_value',
        'start_date',
        'expiration_date',
        'usage_limit',
        'usage_count',
        'min_purchase',
        'is_active',
        'status',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'expiration_date' => 'date',
        'discount_value' => 'decimal:2',
        'min_purchase' => 'decimal:2',
    ];
}