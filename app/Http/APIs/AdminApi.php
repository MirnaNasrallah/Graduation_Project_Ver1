<?php

namespace App\Http\APIs;

use App\Models\Books;
use App\Models\Drugs;
use App\Models\Foodie;
use App\Models\Tech;
use App\Models\Wears;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminApi
{



    public function storeWear(Request $request)
    {
        $wears = new Wears();
        $wears->product_name = $request->post('name');
        $wears->description = $request->post('description');
        $wears->price = $request->post('price');
        $wears->sale = $request->post('sale');

        if ($wears->sale > 0) {
            $wears->price = ($wears->price * (100 - $wears->sale)) / 100;
        }


        $wears->event = $request->post('event');
        $wears->category = $request->post('category');
        $wears->size = $request->post('size');
        $wears->color = $request->post('color');
        $wears->gender = $request->post('gender');
        $wears->save();
        Alert::success('Congrats', 'Product Created Successfully ');
        return response()->json([
            "wears" => $wears,
            "message"=> 'Product Created Successfully'
        ]);
    }


    public function updateWear(Request $request, $id)
    {
        $wears = Wears::find($id);
        $wears->product_name = $request->post('name', $wears->product_name);
        $wears->description = $request->post('description', $wears->description);
        $wears->price = $request->post('price', $wears->price);

        $wears_sale = $request->post('sale', $wears->sale);

        if ($request->input('sale') !=null || $request->input('price') !=null) {
            if ($wears_sale > 0) {
                $wears->price = ($wears->price * (100 - $wears_sale)) / 100;
                $wears->sale = $wears_sale;
            } elseif ($request->input('sale') == 0) {
                $wears->price = ($wears->price * 100 / (100 - $wears->sale));
                $wears->sale = $wears_sale;
            }
        }


        $wears->event = $request->post('event', $wears->event);
        $wears->category = $request->post('category', $wears->category);
        $wears->size = $request->post('size', $wears->size);
        $wears->color = $request->post('color', $wears->color);
        $wears->gender = $request->post('gender', $wears->gender);
        $wears->save();
        Alert::success('Congrats', 'Product Edited Successfully ');
        return response()->json([
            "wears" => $wears,
            "message"=> 'Product Created Successfully'
        ]);
    }

    public function destroyWear($id)
    {
        $wears = Wears::find($id);
        $wears->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return response()->json([
            'Success' => '200',
            'message' => 'product deleted successfully'
        ]);
    }

}
