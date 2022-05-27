<?php

namespace App\Http\APIs;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Drugs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class FiltersApi
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function shopMedicine()
    {
        $drugs = Drugs::where('genre' , 'Medicine')->get();
        return response()->json([
            "drugs" => $drugs,
            "message"=> 'Medicine products only from drugs store'
        ]);
    }

    public function shopHairCare()
    {
        $drugs = Drugs::where('genre' , 'Hair Care')->get();
        return response()->json([
            "drugs" => $drugs,
            "message"=> 'Hair Care products only from drugs store'
        ]);
    }
    public function shopSkinCare()
    {
        $drugs = Drugs::where('genre' , 'Skin Care')->get();
        return response()->json([
            "drugs" => $drugs,
            "message"=> 'Skin Care products only from drugs store'
        ]);
    }
    public function shopDevices()
    {
        $drugs = Drugs::where('genre' , 'Devices')->get();
        return response()->json([
            "drugs" => $drugs,
            "message"=> 'Devices products only from drugs store'
        ]);
    }
    public function shopSanitizers()
    {
        $drugs = Drugs::where('genre' , 'Sanitizers')->get();
        return response()->json([
            "drugs" => $drugs,
            "message"=> 'Sanitizers products only from drugs store'
        ]);
    }

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
            return response()->json([
                "drugs" => $drugs,
                "message"=> 'Filtered by Price'
            ]);
    }
}
