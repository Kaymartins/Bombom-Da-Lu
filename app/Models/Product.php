<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'flavor',
        'price',
        'description',
        'image',
    ];

    /**
     * Get the inventory that owns the product.
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
