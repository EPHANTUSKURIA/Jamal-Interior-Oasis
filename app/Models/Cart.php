<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Table name if it's not the plural form of the model name
    protected $table = 'carts';

    // Disable timestamps if not used
    public $timestamps = false;

    // Fillable fields for mass assignment
    protected $fillable = ['user_id', 'product_id', 'quantity', 'price'];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
