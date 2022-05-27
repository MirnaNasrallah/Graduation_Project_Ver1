<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Drugs;
use App\Models\Foodie;
use App\Models\Tech;
use App\Models\Wears;
use Faker\Provider\File as ProviderFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

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
        $wears->sale = $request->post('sale');

        if ($wears->sale > 0) {
            $wears->price = ($wears->price * (100 - $wears->sale)) / 100;
        }


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
        Alert::success('Congrats', 'Product Created Successfully ');
        return redirect()->route('admin.wearsAdmin');
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

        if ($request->hasFile('product_img')) {
            $myFile = $request->file('product_img');
            $filename = $myFile->getClientOriginalName();
            $myFile->storeAs('public/images', $filename);
            $wears->product_img = $filename;
        }


        $wears->quantity = $request->post('quantity', $wears->quantity);
        $wears->event = $request->post('event', $wears->event);
        $wears->category = $request->post('category', $wears->category);
        $wears->size = $request->post('size', $wears->size);
        $wears->color = $request->post('color', $wears->color);
        $wears->gender = $request->post('gender', $wears->gender);
        $wears->save();
        Alert::success('Congrats', 'Product Edited Successfully ');
        return redirect()->route('admin.wearsAdmin');
    }

    public function destroyWear($id)
    {
        $wears = Wears::find($id);
        $wears->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return redirect()->route('admin.wearsAdmin');
    }
    //-------------------------------------TECH---------------------------------------//
    public function indexTech()
    {
        $tech = Tech::all();
        return view('admin.techAdmin', [
            'tech' => $tech,

        ]);
    }
    public function createTech()
    {

        return view('admin.createTech');
    }
    public function storeTech(Request $request)
    {
        $tech = new Tech();
        $tech->product_name = $request->post('name');
        $tech->description = $request->post('description');
        $tech->price = $request->post('price');
        $tech->sale = $request->post('sale');
        if ($tech->sale > 0) {
            $tech->price = ($tech->price * (100 - $tech->sale)) / 100;
        }


        $myFile = $request->file('product_img');
        $filename = $myFile->getClientOriginalName();
        $myFile->storeAs('public/images', $filename);
        $tech->product_img = $filename;
        $tech->category = $request->post('category');
        $tech->save();
        Alert::success('Congrats', 'Product Created Successfully ');
        return redirect()->route('admin.techAdmin');
    }
    public function editTech($id)
    {
        $tech = Tech::find($id);
        return view('admin.editTech', [
            'tech' => $tech,

        ]);
    }
    public function updateTech(Request $request, $id)
    {
        $tech = Tech::find($id);
        $tech->product_name = $request->post('name', $tech->product_name);
        $tech->description = $request->post('description', $tech->description);
        $tech->price = $request->post('price', $tech->price);
        $tech_sale = $request->post('sale', $tech->sale);
        if ($request->input('sale') !=null || $request->input('price') !=null) {

            if ($tech_sale > 0) {
                $tech->price = ($tech->price * (100 - $tech_sale)) / 100;
                $tech->sale = $tech_sale;
            } elseif ($tech_sale == 0) {
                $tech->price = ($tech->price * 100 / (100 - $tech->sale));
                $tech->sale = $tech_sale;
            }
        }
        if ($request->hasFile('product_img')) {
            $myFile = $request->file('product_img');
            $filename = $myFile->getClientOriginalName();
            $myFile->storeAs('public/images', $filename);
            $tech->product_img = $filename;
        }
        $tech->quantity = $request->post('quantity', $tech->quantity);
        $tech->category = $request->post('category', $tech->category);
        $tech->save();
        Alert::success('Congrats', 'Product Edited Successfully ');
        return redirect()->route('admin.techAdmin');
    }

    public function destroyTech($id)
    {
        $tech = Tech::find($id);
        $tech->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return redirect()->route('admin.techAdmin');
    }
    //-----------------------------DRUG-----------------------------------------//
    public function indexDrug()
    {
        $drugs = Drugs::all();
        return view('admin.drugAdmin', [
            'drugs' => $drugs,

        ]);
    }
    public function createDrug()
    {

        return view('admin.createDrug');
    }


    public function storeDrug(Request $request)
    {
        $drugs = new Drugs();
        $drugs->product_name = $request->post('name');
        $drugs->description = $request->post('description');
        $drugs->price = $request->post('price');
        $drugs->sale = $request->post('sale');
        if ($drugs->sale > 0) {
            $drugs->price = ($drugs->price * (100 - $drugs->sale)) / 100;
        }


        $myFile = $request->file('product_img');
        $filename = $myFile->getClientOriginalName();
        $myFile->storeAs('public/images', $filename);
        $drugs->product_img = $filename;
        $drugs->genre = $request->post('genre');
        $drugs->save();
        Alert::success('Congrats', 'Product Created Successfully ');
        return redirect()->route('admin.drugAdmin');
    }

    // public function show($id)
    // {
    //     //
    // }


    public function editDrug($id)
    {
        $drugs = Drugs::find($id);
        return view('admin.editDrug', [
            'drugs' => $drugs,

        ]);
    }

    public function updateDrug(Request $request, $id)
    {
        $drugs = Drugs::find($id);
        $drugs->product_name = $request->post('name', $drugs->product_name);
        $drugs->description = $request->post('description', $drugs->description);
        $drugs->price = $request->post('price', $drugs->price);
        $drugs_sale = $request->post('sale', $drugs->sale);
        if ($request->input('sale') !=null || $request->input('price') !=null) {

            if ($drugs_sale > 0) {
                $drugs->price = ($drugs->price * (100 - $drugs_sale)) / 100;
                $drugs->sale = $drugs_sale;
            } elseif ($drugs_sale == 0) {
                $drugs->price = ($drugs->price * 100 / (100 - $drugs->sale));
                $drugs->sale = $drugs_sale;
            }
        }

        if ($request->hasFile('product_img')) {
            $myFile = $request->file('product_img');
            $filename = $myFile->getClientOriginalName();
            $myFile->storeAs('public/images', $filename);
            $drugs->product_img = $filename;
        }
        $drugs->quantity = $request->post('quantity', $drugs->quantity);
        $drugs->genre = $request->post('genre', $drugs->genre);
        $drugs->save();
        Alert::success('Congrats', 'Product Edited Successfully ');
        return redirect()->route('admin.drugAdmin');
    }


    public function destroyDrug($id)
    {
        $drugs = Drugs::find($id);
        $drugs->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return redirect()->route('admin.drugAdmin');
    }


    //-----------------------------FOOD-----------------------------------------//
    public function indexFood()
    {
        $food = Foodie::all();
        return view('admin.foodAdmin', [
            'food' => $food,

        ]);
    }
    public function createFood()
    {

        return view('admin.createFood');
    }


    public function storeFood(Request $request)
    {
        $food = new Foodie();
        $food->product_name = $request->post('name');
        $food->description = $request->post('description');
        $food->price = $request->post('price');
        $food->sale = $request->post('sale');
        if ($food->sale > 0) {
            $food->price = ($food->price * (100 - $food->sale)) / 100;
        }


        $myFile = $request->file('product_img');
        $filename = $myFile->getClientOriginalName();
        $myFile->storeAs('public/images', $filename);
        $food->product_img = $filename;


        $food->category = $request->post('category');
        $food->calories = $request->post('calories');
        $food->save();
        Alert::success('Congrats', 'Product Created Successfully ');
        return redirect()->route('admin.foodAdmin');
    }

    // public function show($id)
    // {
    //     //
    // }


    public function editFood($id)
    {
        $food = Foodie::find($id);
        return view('admin.editFood', [
            'food' => $food,

        ]);
    }

    public function updateFood(Request $request, $id)
    {
        $food = Foodie::find($id);
        $food->product_name = $request->post('name', $food->product_name);
        $food->description = $request->post('description', $food->description);
        $food->price = $request->post('price', $food->price);
        $food_sale = $request->post('sale', $food->sale);

        if ($request->input('sale') !=null || $request->input('price') !=null) {
            if ($food_sale > 0) {
                $food->price = ($food->price * (100 - $food_sale)) / 100;
                $food->sale = $food_sale;
            } elseif ($food_sale == 0) {
                $food->price = ($food->price * 100 / (100 - $food->sale));
                $food->sale = $food_sale;
            }
        }
        if ($request->hasFile('product_img')) {
            $myFile = $request->file('product_img');
            $filename = $myFile->getClientOriginalName();
            $myFile->storeAs('public/images', $filename);
            $food->product_img = $filename;
        }
        $food->quantity = $request->post('quantity', $food->quantity);
        $food->category = $request->post('category', $food->category);
        $food->calories = $request->post('calories', $food->calories);
        $food->save();
        Alert::success('Congrats', 'Product Edited Successfully ');
        return redirect()->route('admin.foodAdmin');
    }


    public function destroyFood($id)
    {
        $food = Foodie::find($id);
        $food->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return redirect()->route('admin.foodAdmin');
    }


    //-----------------------------BOOKS-----------------------------------------//
    public function indexBook()
    {
        $books = Books::all();
        return view('admin.booksAdmin', [
            'books' => $books,

        ]);
    }
    public function createBook()
    {

        return view('admin.createBook');
    }


    public function storeBook(Request $request)
    {
        $books = new Books();
        $books->product_name = $request->post('name');
        $books->description = $request->post('description');
        $books->price = $request->post('price');
        $books->sale = $request->post('sale');
        if ($books->sale > 0) {
            $books->price = ($books->price * (100 - $books->sale)) / 100;
        }

        $myFile = $request->file('product_img');
        $filename = $myFile->getClientOriginalName();
        $myFile->storeAs('public/images', $filename);
        $books->product_img = $filename;

        $books->genre = $request->post('genre');
        $books->author = $request->post('author');
        $books->save();
        Alert::success('Congrats', 'Product Created Successfully ');
        return redirect()->route('admin.booksAdmin');
    }

    // public function show($id)
    // {
    //     //
    // }


    public function editBook($id)
    {
        $books = Books::find($id);
        return view('admin.editBook', [
            'books' => $books,

        ]);
    }

    public function updateBook(Request $request, $id)
    {
        $books = Books::find($id);
        $books->product_name = $request->post('name', $books->product_name);
        $books->description = $request->post('description', $books->description);
        $books->price = $request->post('price', $books->price);

        $books_sale = $request->post('sale', $books->sale);

        if ($request->input('sale') !=null || $request->input('price') !=null) {
            if ($books_sale > 0) {
                $books->price = ($books->price * (100 - $books_sale)) / 100;
                $books->sale = $books_sale;
            } elseif ($books_sale == 0) {
                $books->price = ($books->price * 100 / (100 - $books->sale));
                $books->sale = $books_sale;
            }
        }
        if ($request->hasFile('product_img')) {
            $myFile = $request->file('product_img');
            $filename = $myFile->getClientOriginalName();
            $myFile->storeAs('public/images', $filename);
            $books->product_img = $filename;
        }

        $books->quantity = $request->post('quantity', $books->quantity);
        $books->genre = $request->post('genre', $books->genre);
        $books->author = $request->post('author', $books->author);
        $books->save();
        Alert::success('Congrats', 'Product Edited Successfully ');
        return redirect()->route('admin.booksAdmin');
    }


    public function destroyBook($id)
    {
        $books = Books::find($id);
        $books->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return redirect()->route('admin.booksAdmin');
    }
}
