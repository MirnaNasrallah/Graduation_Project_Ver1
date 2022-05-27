<?php

namespace App\Http\APIs;


use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistApi
{
    public function wishlist(Request $request)
    {

            $wishlist = Wishlist::where('user_id', $request->user_id)->get();
            return response()->json([
                "wishlist" => $wishlist,
            ]);


    }
}
