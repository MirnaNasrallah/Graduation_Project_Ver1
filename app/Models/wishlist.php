<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','product_id','type'];
    public $table = "wishlist";
    public $timestamps = false;
}
