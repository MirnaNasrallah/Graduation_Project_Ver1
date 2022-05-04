<?php

namespace App\Http\Controllers;

use App\Models\Wears;
use Illuminate\Http\Request;

class AdminCRUDController extends Controller
{

    public function index()
    {
        $wears = Wears::all();
        return view('admin.wearsAdmin', [
            'wears' => $wears,

        ]);
    }


    public function createWear()
    {

        return view('admin.createWear');
    }


    public function storeWear(Request $request)
    {
        $wears = new Wears();
        $wears->product_name = $request->post('name');
        $wears->description = $request->post('description');
        $wears->price = $request->post('price');

        $myFile = $request->file('product_img');
        $filename = $myFile->getClientOriginalName();
        $myFile->storeAs('public/images', $filename);
        $wears->product_img = $filename;

        $wears->event = $request->post('event');
        $wears->category = $request->post('category');
        $wears->size = $request->post('size');
        $wears->color = $request->post('color');
        $wears->gender = $request->post('gender');
        $wears->save();
        return redirect()->route('admin.wearsAdmin');
    }

    public function show($id)
    {
        //
    }


    public function editWear($id)
    {
        $wears = Wears::find($id);
        return view('admin.editWear', [
            'wears' => $wears,

        ]);

    }

    public function updateWear(Request $request, $id)
    {
        $wears = Wears::find($id);
        $wears->product_name = $request->post('name', $wears->product_name);
        $wears->description = $request->post('description', $wears->description);
        $wears->price = $request->post('price', $wears->price);
        if ($request->hasFile('image')) {
            $myFile = $request->file('product_img');
            $filename = $myFile->getClientOriginalName();
            $myFile->storeAs('public/images', $filename);
            $wears->product_img = $filename;
        }
        $wears->event = $request->post('event', $wears->event);
        $wears->category = $request->post('category', $wears->category);
        $wears->size = $request->post('size', $wears->size);
        $wears->color = $request->post('color', $wears->color);
        $wears->gender = $request->post('gender', $wears->gender);
        $wears->save();
        return redirect()->route('admin.wearsAdmin');
    }


    public function destroyWear($id)
    {
        $wears = Wears::find($id);
        $wears->delete();
        return redirect()->route('admin.wearsAdmin');
    }
}
