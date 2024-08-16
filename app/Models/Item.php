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
        'mode_of_procurement',
        'accountname_with_accountcode',
        'date_acquired',
        'date_issued',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

