<?php

namespace App\Http\Controllers\shops;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Tech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class techController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewTech()
    {
        $tech = Tech::all();
        return view('shops.tech', compact('tech'));
    }
    public function shopMobiles()
    {
        $tech = Tech::where('category' , 'Mobiles')->get();
        return view('shops.tech', compact('tech'));
    }
    public function shopLaptops()
    {
        $tech = Tech::where('category' , 'LapTops')->get();
        return view('shops.tech', compact('tech'));
    }
    public function shopTablets()
    {
        $tech = Tech::where('category' , 'Tablets')->get();
        return view('shops.tech', compact('tech'));
    }
    public function shopChargers()
    {
        $tech = Tech::where('category' , 'Chargers')->get();
        return view('shops.tech', compact('tech'));
    }
    public function shopAccessories()
    {
        $tech = Tech::where('category' , 'Accessories')->get();
        return view('shops.tech', compact('tech'));
    }

    // public function shopEvent()
    // {
    //     $wears = Wears::all();
    //     $user = Auth::user();
    //     return view('shops.wears.event', compact('wears','user'));
    // }
    public function priceLimitTech(Request $request)
    {
        $min = str_replace('$','',$request->get('minamount'));

        $max = str_replace('$','',$request->get('maxamount'));
        $tech = DB::table('tech')
            ->select('*')
            ->where('price','>=',$min)
            ->where('price','<=',$max)
            ->orderBy('price')
            ->get();
        return view('shops.tech', compact('tech'));
    }
}
