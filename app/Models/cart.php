<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = ['customer_id', 'product_id','quantity','subtotal'];
    use HasFactory;
}
