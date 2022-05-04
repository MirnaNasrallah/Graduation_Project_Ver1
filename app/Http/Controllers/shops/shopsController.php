<?php

namespace App\Http\Controllers\shops;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Wears;
use App\Models\Books;
use App\Models\cart;
use App\Models\wishlist;
use App\Models\Drugs;
use App\Models\Foodie;
use App\Models\Tech;


class shopsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Wearscart()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $wears = DB::table('carts')
                ->join('users', 'users.id', '=', 'carts.customer_id')
                ->join('wears', 'wears.id', '=', 'carts.product_id')

                ->join('drugs', 'drugs.id', '=', 'carts.product_id')
                ->join('food', 'food.id', '=', 'carts.product_id')
                ->join('tech', 'tech.id', '=', 'carts.product_id')
                ->join('books', 'books.id', '=', 'carts.product_id')
                ->where('carts.customer_id', 'LIKE', '%' . $user_id . '%')
                // ->select('wears.*')->get()
                // ->select('drugs.*')->get()
                // ->select('food.*')->get()
                // ->select('wears.*')->get();
                ->select('wears.*','books.*', 'drugs.*', 'food.*','tech.*')->get();
// , 'drugs.*', 'food.*','tech.*'

            return view('shops.cart', compact('wears'));
        }


        return redirect("login");
    }
    public function addtocart(Request $request, $id)
    {
        if (Auth::check()) {

            $cart = cart::where([['customer_id', $request->user()->id], ['product_id', $id]])->first();
            if (isset($cart)) {
                return redirect()->back()->withSuccess('already in cart');
            } else {
                $ins = array(
                    'customer_id' => $iduser = $request->user()->id,
                    'product_id' => $id
                );
                cart::create($ins);
                return redirect()->back()->with('message', 'product added to cart');
            }
        } else {
            return redirect('login')->withSuccess('login first');
        }
    }

    public function wish()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $wears = DB::table('wishlists')
                ->join('users', 'users.id', '=', 'wishlists.customer_id')
                ->join('wears', 'wears.id', '=', 'wishlists.product_id')
                ->where('wishlists.customer_id', 'LIKE', '%' . $user_id . '%')
                ->select('wears.*')->get();

            return view('shops.wishlist', compact('wears'));
        }

        return redirect("login")->withSuccess('Great! You have Successfully Registered Now logIn');
    }
    public function addtowishlist(Request $request, $id)
    {
        if (Auth::check()) {

            $wish = wishlist::where([['customer_id', $request->user()->id], ['product_id', $id]])->first();
            if (isset($wish)) {
                return redirect()->back()->withSuccess('already in wishlist');
            } else {
                $ins = array(
                    'customer_id' => $iduser = $request->user()->id,
                    'product_id' => $id
                );
                wishlist::create($ins);
                return redirect()->back()->with('message', 'product added to wishlist');
            }
        } else {
            return redirect('login')->withSuccess('login first');
        }
    }
    public function deletefromwishlist($id)
    {
        $user_id = Auth::id();
        $wish = wishlist::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
        //echo("Deleted Successfully");
        return redirect()->back()->withSuccess('Deleted Successfully');
    }
    public function deletefromcart($id)
    {
        $user_id = Auth::id();
        $wish = cart::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
        return redirect()->back()->withSuccess('Deleted Successfully');
    }

    public function add(Request $request,$id)
    {


        // $cart = cart::where([ ['product_id']])->first();

        // $product_id = Auth::id();

        // if (Auth::check()) {
        //     $cart = cart::where([['customer_id', $request->user()->id], ['product_id', $id]])->first();


        // // $cart = cart::where([['product_id', $product_id]])->firstorfail();
        // $cart->quantity = $request['quantity'];
        // $cart->save();
        //     return redirect("cart");



        // }
        $user_id = Auth::id();
        $cart = cart::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail();
        $cart->quantity = $request['quantity'];
        $cart->subtotal=$request['quantity']*$request['price'];
        $cart->save();


        return redirect()->back()->withSuccess('Updated Successfully');
    }
    public function searchIndex()
    {
        $keyword = request('search-input');
        $wears = Wears::where('product_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->orWhere('price', 'LIKE', '%' . $keyword . '%')
            ->orWhere('event', 'LIKE', '%' . $keyword . '%')
            ->get();
        return view('shops.search', compact('wears'));
    }
}
