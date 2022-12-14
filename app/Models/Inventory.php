<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the products for the inventory.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
