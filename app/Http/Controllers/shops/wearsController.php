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
        $wears = Wears::where([['gender', 'women'], ['category', 'T-shirt']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopJeans()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'jeans']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopBags()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'bag']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopAccessories()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'Accessories']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function womenShopShoes()
    {
        $wears = Wears::where([['gender', 'women'], ['category', 'shoes']])->get();
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
    public function menShopBags()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'bag']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function menShopAccessories()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'Accessories']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function menShopShoes()
    {
        $wears = Wears::where([['gender', 'men'], ['category', 'shoes']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopCoats()
    {
        $wears = Wears::where([['gender', ''], ['category', 'coat']])->get();
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
    public function kidsShopBags()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'bag']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopAccessories()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'Accessories']])->get();
        return view('shops.wears.wears', compact('wears'));
    }
    public function kidsShopShoes()
    {
        $wears = Wears::where([['gender', 'kids'], ['category', 'shoes']])->get();
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



//-------------------------------PREMIUM------------------------//

    public function EventClassy()
    {
        $wears = Wears::all();
        $gender = Auth::user()->gender;
        if($gender == 'female')
        {
            $wears = Wears::where([['gender', 'women'], ['event', 'classy']])->get();
        } elseif($gender == 'male')
        {
            $wears = Wears::where([['gender', 'men'], ['event', 'classy']])->get();
        }
        return view('shops.wears.wears', compact('wears'));
    }
    public function EventParty()
    {
        $wears = Wears::all();
        $gender = Auth::user()->gender;
        if($gender == 'female')
        {
            $wears = Wears::where([['gender', 'women'], ['event', 'party']])->get();
        }
        elseif($gender == 'male')
        {
            $wears = Wears::where([['gender', 'men'], ['event', 'party']])->get();
        }
        return view('shops.wears.wears', compact('wears'));
    }
    public function EventCasual()
    {
        $wears = Wears::all();
        $gender = Auth::user()->gender;
        if($gender == 'female')
        {
            $wears = Wears::where([['gender', 'women'], ['event', 'casual']])->get();
        }
        elseif($gender == 'male')
        {
            $wears = Wears::where([['gender', 'men'], ['event', 'casual']])->get();
        }
        return view('shops.wears.wears', compact('wears'));
    }
    public function EventFormal()
    {
        $wears = Wears::all();
        $gender = Auth::user()->gender;
        if($gender == 'female')
        {
            $wears = Wears::where([['gender', 'women'], ['event', 'formal']])->get();
        }
        elseif($gender == 'male')
        {
            $wears = Wears::where([['gender', 'men'], ['event', 'formal']])->get();
        }
        return view('shops.wears.wears', compact('wears'));
    }

}
