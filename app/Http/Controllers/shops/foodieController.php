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
    public function shopDesserts()
    {
        $foodie = Foodie::where('category', 'desserts')->get();
        return view('shops.foodie', compact('foodie'));
    }
    public function shopSnacks()
    {
        $foodie = Foodie::where('category', 'Snacks')->get();
        return view('shops.foodie', compact('foodie'));
    }
    public function shopVeggies()
    {
        $foodie = Foodie::where('category', 'veggies')->get();
        return view('shops.foodie', compact('foodie'));
    }
    public function shopFruits()
    {
        $foodie = Foodie::where('category', 'fruits')->get();
        return view('shops.foodie', compact('foodie'));
    }
    public function shopDressings()
    {
        $foodie = Foodie::where('category', 'dressings')->get();
        return view('shops.foodie', compact('foodie'));
    }
    public function shopLowCal()
    {
        $foodie = Foodie::where('calories', 'low')->get();
        return view('shops.foodie', compact('foodie'));
    }
    public function shopMidCal()
    {
        $foodie = Foodie::where('calories', 'mid')->get();
        return view('shops.foodie', compact('foodie'));
    }
    public function shopHighCal()
    {
        $foodie = Foodie::where('calories', 'high')->get();
        return view('shops.foodie', compact('foodie'));
    }



    public function priceLimitFoodie(Request $request)
    {
        $min = str_replace('$','',$request->get('minamount'));

        $max = str_replace('$','',$request->get('maxamount'));
        $foodie = DB::table('food')
            ->select('*')
            ->where('price','>=',$min)
            ->where('price','<=',$max)
            ->orderBy('price')
            ->get();
        return view('shops.foodie', compact('foodie'));
    }

}
