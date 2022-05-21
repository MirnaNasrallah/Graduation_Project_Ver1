<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartFood extends Model
{
    protected $fillable = ['customer_id', 'product_id', 'quantity'];
    use HasFactory;
}
