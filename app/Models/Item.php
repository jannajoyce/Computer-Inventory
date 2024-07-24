<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'property_number',
        'unit',
        'unit_value',
        'quantity',
        'location',
        'condition',
        'remarks',
        'po_number',
        'dealer',
        'date_acquired',
    ];

}
