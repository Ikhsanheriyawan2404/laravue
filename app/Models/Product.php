<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'stock', 'price', 'description'];

    public function salesorders()
    {
        return $this->hasMany(SalesOrder::class);
    }
}
