<?php

namespace App\Http\Controllers\shops;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class booksController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewBooks()
    {
        $books = Books::all();
        return view('shops.books', compact('books'));
    }


    public function shopAuth1()
    {
        $books = Books::where('author' , 'Paulo Coelho')->get();
        return view('shops.books', compact('books'));
    }
    public function shopAuth2()
    {
        $books = Books::where('author' , 'Kristin Hannah')->get();
        return view('shops.books', compact('books'));
    }

    public function shopAuth3()
    {
        $books = Books::where('author' , 'Marian Keyes')->get();
        return view('shops.books', compact('books'));
    }

    public function shopNovel()
    {
        $books = Books::where('genre' , 'Novel')->get();
        return view('shops.books', compact('books'));
    }
    public function shopkidBooks()
    {
        $books = Books::where('genre' , 'Kids')->get();
        return view('shops.books', compact('books'));
    }
    public function shopEdu()
    {
        $books = Books::where('genre' , 'Educational')->get();
        return view('shops.books', compact('books'));
    }
    public function shopHistory()
    {
        $books = Books::where('genre' , 'History')->get();
        return view('shops.books', compact('books'));
    }
    public function priceLimitBooks(Request $request)
    {
        $min = str_replace('$','',$request->get('minamount'));

        $max = str_replace('$','',$request->get('maxamount'));
        $books = DB::table('books')
            ->select('*')
            ->where('price','>=',$min)
            ->where('price','<=',$max)
            ->orderBy('price')
            ->get();
        return view('shops.books', compact('books'));
    }



}
