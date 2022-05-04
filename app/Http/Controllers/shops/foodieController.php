<?php

namespace App\Http\Controllers\shops;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Foodie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class foodieController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewFoodie()
    {
        $foodie = Foodie::all();
        return view('shops.foodie', compact('foodie'));
    }
    // public function shopCoats()
    // {
    //     $wears = Wears::all();
    //     return view('shops.wears.coats', compact('wears'));
    // }

    // public function shopJeans()
    // {
    //     $wears = Wears::all();
    //     return view('shops.wears.jeans', compact('wears'));
    // }
    // public function shopDresses()
    // {
    //     $wears = Wears::all();
    //     return view('shops.wears.dresses', compact('wears'));
    // }

    // public function shopEvent()
    // {
    //     $wears = Wears::all();
    //     $user = Auth::user();
    //     return view('shops.wears.event', compact('wears','user'));
    // }
    public function priceLimitFoodie(Request $request)
    {
        $min = str_replace('$','',$request->get('minamount'));

        $max = str_replace('$','',$request->get('maxamount'));
        $food = DB::table('food')
            ->select('*')
            ->where('price','>=',$min)
            ->where('price','<=',$max)
            ->orderBy('price')
            ->get();
        return view('shops.foodie', compact('food'));
    }

}
