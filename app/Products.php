<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'company', 'generic', 'unit_price', 'quantity','status', 'inventory_code', 'expiry_date', 'lot_number', 'manufacturer'];
}
