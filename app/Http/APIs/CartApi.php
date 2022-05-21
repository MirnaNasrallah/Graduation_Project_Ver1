<?php

namespace App\Http\APIs;


use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;



class CartApi extends Controller
{


    public function Cart(Request $request)
    {

        $cart = Cart::where('user_id', $request->user_id)->get();
        return $cart;
    }
}
