<?php

namespace App\Http\Controllers\shops;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Wears;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class wearsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewWears()
    {
        $wears = Wears::all();
        return view('shops.wears.wears', compact('wears'));
    }

    public function womenShopCoats()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'coat']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopJackets()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'jacket']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopDresses()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'dress']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopShirts()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'shirt']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopTshirts()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'Tshirt']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopJeans()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'jeans']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function menShopCoats()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'coat']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function menShopJackets()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'jacket']])->get();
        return view('shops.wears.wears', compact('wears'));
    }

    public function menShopShirts()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'shirt']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function menShopTshirts()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'Tshirt']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function menShopJeans()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'jeans']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopCoats()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'coat']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopJackets()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'jacket']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopDresses()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'dress']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopShirts()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'shirt']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopTshirts()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'Tshirt']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopJeans()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'jeans']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function shopXS()
    {
        $wears = Wears::where('size' , 'xs')->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function shopS()
    {
        $wears = Wears::where('size' , 's')->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function shopM()
    {
        $wears = Wears::where('size' , 'm')->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function shopL()
    {
        $wears = Wears::where('size' , 'l')->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function shopXL()
    {
        $wears = Wears::where('size' , 'xl')->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function shopXXL()
    {
        $wears = Wears::where('size' , 'xxl')->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function sortPrice()
    {
        $wears = Wears::all();

        DB::table('wears')
            ->select('*')
            ->orderBy('price')
            ->get();
        return view('shops.wears.wears', compact('wears'));
    }

    public function priceLimitWears(Request $request)
    {
        $min = str_replace('$','',$request->get('minamount'));

        $max = str_replace('$','',$request->get('maxamount'));
        $wears = DB::table('wears')
            ->select('*')
            ->where('price','>=',$min)
            ->where('price','<=',$max)
            ->orderBy('price')
            ->get();
        return view('shops.wears.wears', compact('wears'));
    }





    // public function shopEvent()
    // {
    //     $wears = Wears::all();
    //     $user = Auth::user();
    //     return view('shops.wears.event', compact('wears','user'));
    // }

}
