<?php

namespace App\Http\Controllers\shops;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Drugs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class drugsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewDrugs()
    {
        $drugs = Drugs::all();
        return view('shops.drugs', compact('drugs'));
    }
    public function shopMedicine()
    {
        $drugs = Drugs::where('genre' , 'Medicine')->get();
        return view('shops.drugs', compact('drugs'));
    }

    public function shopHairCare()
    {
        $drugs = Drugs::where('genre' , 'Hair Care')->get();
        return view('shops.drugs', compact('drugs'));
    }
    public function shopSkinCare()
    {
        $drugs = Drugs::where('genre' , 'Skin Care')->get();
        return view('shops.drugs', compact('drugs'));
    }
    public function shopDevices()
    {
        $drugs = Drugs::where('genre' , 'Devices')->get();
        return view('shops.drugs', compact('drugs'));
    }
    public function shopSanitizers()
    {
        $drugs = Drugs::where('genre' , 'Sanitizers')->get();
        return view('shops.drugs', compact('drugs'));
    }

    // public function shopEvent()
    // {
    //     $wears = Wears::all();
    //     $user = Auth::user();
    //     return view('shops.wears.event', compact('wears','user'));
    // }
    public function priceLimitDrugs(Request $request)
    {
        $min = str_replace('$','',$request->get('minamount'));

        $max = str_replace('$','',$request->get('maxamount'));
        $drugs = DB::table('drugs')
            ->select('*')
            ->where('price','>=',$min)
            ->where('price','<=',$max)
            ->orderBy('price')
            ->get();
        return view('shops.drugs', compact('drugs'));
    }
}
