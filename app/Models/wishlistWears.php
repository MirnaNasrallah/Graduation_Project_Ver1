<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlistWears extends Model
{
    protected $fillable = ['customer_id', 'product_id', 'product_name'];
    use HasFactory;
}
