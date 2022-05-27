<?php

namespace App\Http\Controllers\shops;

use App\Models\Books;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
// use App\Models\Wears;
// use App\Models\Books;
use App\Models\Cart;
use App\Models\Drugs;
use App\Models\Foodie;
use App\Models\Tech;
use App\Models\Wears;
use App\Models\Wishlist;
// use App\Models\Drugs;
// use App\Models\Foodie;
// use App\Models\Tech;
use RealRashid\SweetAlert\Facades\Alert;

// use App\Models\CartTech;
// use App\Models\CartFood;
// use App\Models\CartWears;
// use App\Models\CartDrug;
// use App\Models\CartBook;

// use App\Models\wishlistBook;
// use App\Models\wishlistFood;
// use App\Models\wishlistDrug;
// use App\Models\wishlistWears;
// use App\Models\wishlistTech;





class shopsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //----------------------------SEARCH---------------------------------------//

    // public function Coupon(Request $request)
    // {
    //     $coupon = $request->input('coupon');
    //     Alert::success('Congratulations', 'You got a 10% discount');
    //     return view('shops.cart', compact('coupon'));
    //     // return redirect()->back()->withSuccess('Congratulations', 'You got a 10% discount');

    // }

    public function searchIndex(Request $request)
    {
        $search = $request->input('search');
        $tech = Tech::query()->where('product_name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('price', 'LIKE', '%' . $search . '%')->get();
        $wears = Wears::query()->where('product_name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('price', 'LIKE', '%' . $search . '%')->orWhere('color', 'LIKE', '%' . $search . '%')->orWhere('gender', 'LIKE', '%' . $search . '%')->get();
        $books = Books::query()->where('product_name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('price', 'LIKE', '%' . $search . '%')->get();
        $drugs = Drugs::query()->where('product_name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('price', 'LIKE', '%' . $search . '%')->get();
        $food = Foodie::query()->where('product_name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('price', 'LIKE', '%' . $search . '%')->get();

        $product = $tech->merge($wears)->merge($books)->merge($drugs)->merge($food);
        return view('shops.search', compact('product'));
    }


    public function Cart()
    {

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('shops.cart', compact('cart'));
        }
        return redirect("login");
    }


    public function ProceedToCheckout($id, $type,$quantity)
    {
        // $cart = Cart::find($id);
        // $cart = Cart::where('user_id', Auth::user()->id)
        //     ->where('product_id', $id)->where('type', $type)->where('quantity', $quantity)->first();
        $cart = Cart::where('id', $id)->where('type', $type)->where('quantity', $quantity)->first();
        $product_id=$cart->product_id;
        if ($type == 'wears') {
            $product = Wears::where('id', $product_id)->first();
            if($cart->quantity > $product->quantity) {
                Alert::error('Sorry', 'This quantity exceeds the stock ');
                return redirect()->back();
            }
            else {
                $product->quantity = ($product->quantity) - $cart->quantity;
                $product->save();

                return view('shops.paypal');
            }

        } elseif ($type == 'books') {
            $product = Books::where('id', $product_id)->first();
            if ($cart->quantity > $product->quantity) {
                Alert::success('Sorry', 'This quantity exceeds the stock ');
                return redirect()->back();
            } else {
                $product->quantity = ($product->quantity) - ($cart->quantity);
                $product->save();

                return view('shops.paypal');
            }
        } elseif ($type == 'tech') {
            $product = Tech::where('id', $product_id)->first();
            if ($cart->quantity > $product->quantity) {
                Alert::success('Sorry', 'This quantity exceeds the stock ');
                return redirect()->back();
            } else {
                $product->quantity = ($product->quantity) - $cart->quantity;
                $product->save();

                return view('shops.paypal');
            }
        } elseif ($type == 'drugs') {
            $product = Drugs::where('id', $product_id)->first();
            if ($cart->quantity > $product->quantity) {
                Alert::success('Sorry', 'This quantity exceeds the stock ');
                return redirect()->back();
            } else {
                $product->quantity= ($product->quantity)- $cart->quantity;
                $product->save();

                return view('shops.paypal');
            }
        } elseif ($type == 'food') {
            $product = Foodie::where('id', $product_id)->first();
            if ($cart->quantity > $product->quantity) {
                Alert::success('Sorry', 'This quantity exceeds the stock ');
                return redirect()->back();
            } else {
                $product->quantity = ($product->quantity) - $cart->quantity;
                $product->save();

                return view('shops.paypal');
            }
            }





     }
    public function addtocart(Request $request, $id, $price, $type)
    {

        if (Auth::check()) {

            // $cart = Cart::where('user_id', Auth::user()->id)
            //     ->where('product_id', $id)->first();
            if (
                Cart::where('user_id', Auth::user()->id)
                ->where('product_id', $id)->where('type', $type)->count() == 0
            ) {
                $c = new Cart();
                if ($type == 'wears') {
                    $product = Wears::find($id);
                    $c->product_img = $product->product_img;
                    $c->price = $product->price;
                    if ($product->quantity == 0) {
                        Alert::error('Sorry', 'This Item is out of stock ');
                        return redirect()->back();
                    }
                } elseif ($type == 'books') {
                    $product = Books::find($id);
                    $c->product_img = $product->product_img;
                    $c->price = $product->price;
                    if ($product->quantity == 0) {
                        Alert::error('Sorry', 'This Item is out of stock ');
                        return redirect()->back();
                    }
                } elseif ($type == 'tech') {
                    $product = Tech::find($id);
                    $c->product_img = $product->product_img;
                    $c->price = $product->price;
                    if ($product->quantity == 0) {
                        Alert::error('Sorry', 'This Item is out of stock ');
                        return redirect()->back();
                    }
                } elseif ($type == 'drugs') {
                    $product = Drugs::find($id);
                    $c->product_img = $product->product_img;
                    $c->price = $product->price;
                    if ($product->quantity == 0) {
                        Alert::error('Sorry', 'This Item is out of stock ');
                        return redirect()->back();
                    }
                } elseif ($type == 'food') {
                    $product = Foodie::find($id);
                    $c->product_img = $product->product_img;
                    $c->price = $product->price;
                    if ($product->quantity == 0) {
                        Alert::error('Sorry', 'This Item is out of stock ');
                        return redirect()->back();
                    }
                }


                $c->user_id = Auth::user()->id;
                $c->product_id = $id;
                $c->type = $type;
                $c->save();


                $cart = Cart::where('user_id', Auth::user()->id)->get();
                Alert::success('Congrats', 'Product Added Successfully ');
                return redirect()->back();
            } else {


                Alert::error('Sorry!', 'Product Already Exists in your cart');
                return redirect()->back();
            }
        } else {
            return redirect('login')->withSuccess('login first');
        }
    }
    public function QtyUpdate(Request $request, $id)
    {

        $user_id = Auth::id();

        $cart = Cart::where([['user_id', $user_id], ['id', $id]])->firstorfail();
        $cart->quantity = $request['quantity'];
        $cart['subtotal'] = ($cart->quantity * $cart->price);
        // $cart->subtotal=$request['quantity']*$request['price'];
        $cart->save();
        return redirect()->back()->withSuccess('Updated Successfully');
    }


    public function wishlist()
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
            return view('shops.wishlist', compact('wishlist'));
        }
        return redirect("login");
    }
    public function addtowishlist(Request $request, $id, $price, $type)
    {

        if (Auth::check()) {
            if (
                Wishlist::where('user_id', Auth::user()->id)
                ->where('product_id', $id)->where('type', $type)->count() == 0
            ) {

                $wish = new Wishlist();
                if ($type == 'wears') {
                    $product = Wears::find($id);
                    $wish->product_img = $product->product_img;
                } elseif ($type == 'books') {
                    $product = Books::find($id);
                    $wish->product_img = $product->product_img;
                } elseif ($type == 'tech') {
                    $product = Tech::find($id);
                    $wish->product_img = $product->product_img;
                } elseif ($type == 'drugs') {
                    $product = Drugs::find($id);
                    $wish->product_img = $product->product_img;
                } elseif ($type == 'food') {
                    $product = Foodie::find($id);
                    $wish->product_img = $product->product_img;
                }
                $wish->user_id = Auth::user()->id;
                $wish->product_id = $id;
                $wish->type = $type;
                $wish->save();

                $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
                Alert::success('Congrats', 'Product Added Successfully ');
                return redirect()->back();
            } else {


                Alert::error('Sorry!', 'Product Already Exists in your wishlist');
                return redirect()->back();
            }
        } else {
            return redirect('login')->withSuccess('login first');
        }
    }
    public function deletefromcart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return redirect()->route('cart');
        // $user_id = Auth::id();
        // $cart = Cart::where([['user_id', $user_id], ['product_id', $id],['type',$type]])->first();
        // $cart->delete();
        // Alert::success('Success', 'Removed Successfully ');
        // return view('shops.cart', compact('cart'));

    }
    public function deletefromwishlist($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        Alert::success('Success', 'Product Deleted Successfully ');
        return redirect()->route('wishlist');
    }

    //     public function TechCart()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $tech = DB::table('cart_teches')
    //                 ->join('users', 'users.id', '=', 'cart_teches.customer_id')

    //                 ->join('tech', 'tech.id', '=', 'cart_teches.product_id')
    //                 ->where('cart_teches.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('tech.*')->get();
    //             return view('shops.TechCart', compact('tech'));
    //         }


    //         return redirect("login");
    //     }

    //     public function addtocartTech(Request $request, $id)
    //     {
    //         if (Auth::check()) {

    //             $cart = CartTech::where([['customer_id', $request->user()->id], ['product_id', $id]])->first();
    //             if (isset($cart)) {
    //                 return redirect()->back()->withSuccess('already in cart');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_id' => $id
    //                 );
    //                 CartTech::create($ins);
    //                 return redirect()->back()->with('message', 'product added to cart');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }

    //     public function addTech(Request $request, $id)
    //     {
    //         $user_id = Auth::id();
    //         $cart = CartTech::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail();
    //         $cart->quantity = $request['quantity'];
    //         // $cart->subtotal=$request['quantity']*$request['price'];
    //         $cart->save();
    //         return redirect()->back()->withSuccess('Updated Successfully');
    //     }
    //     public function deletefromcartTech($id)
    //     {
    //         $user_id = Auth::id();
    //         $wish = CartTech::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }


    //     //---------------------------------------FOODIE------------------------------//
    //     public function FoodCart()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $food = DB::table('cart_food')
    //                 ->join('users', 'users.id', '=', 'cart_food.customer_id')
    //                 ->join('food', 'food.id', '=', 'cart_food.product_id')
    //                 ->where('cart_food.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('food.*')->get();
    //             return view('shops.FoodCart', compact('food'));
    //         }


    //         return redirect("login");
    //     }

    //     public function addtocartFood(Request $request, $id)
    //     {
    //         if (Auth::check()) {

    //             $cart = CartFood::where([['customer_id', $request->user()->id], ['product_id', $id]])->first();
    //             if (isset($cart)) {
    //                 return redirect()->back()->withSuccess('already in cart');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_id' => $id
    //                 );
    //                 CartFood::create($ins);
    //                 return redirect()->back()->with('message', 'product added to cart');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function addFood(Request $request, $id)
    //     {
    //         $user_id = Auth::id();
    //         $cart = CartFood::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail();
    //         $cart->quantity = $request['quantity'];
    //         // $cart->subtotal=$request['quantity']*$request['price'];
    //         $cart->save();
    //         return redirect()->back()->withSuccess('Updated Successfully');
    //     }
    //     public function deletefromcartFood($id)
    //     {
    //         $user_id = Auth::id();
    //         $wish = CartFood::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }



    //     //----------------------------WEARS------------------------------------------------//
    //     public function WearsCart()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $wears = DB::table('cart_wears')
    //                 ->join('users', 'users.id', '=', 'cart_wears.customer_id')
    //                 ->join('wears', 'wears.id', '=', 'cart_wears.product_id')
    //                 ->where('cart_wears.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('wears.*')->get();
    //             return view('shops.WearsCart', compact('wears'));
    //         }


    //         return redirect("login");
    //     }

    //     public function addtocartWears(Request $request, $id)
    //     {
    //         if (Auth::check()) {

    //             $cart = CartWears::where([['customer_id', $request->user()->id], ['product_id', $id]])->first();
    //             if (isset($cart)) {
    //                 return redirect()->back()->withSuccess('already in cart');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_id' => $id
    //                 );
    //                 CartWears::create($ins);
    //                 return redirect()->back()->with('message', 'product added to cart');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function addWears(Request $request, $id)
    //     {
    //         $user_id = Auth::id();
    //         $cart = CartWears::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail();
    //         $cart->quantity = $request['quantity'];
    //         // $cart->subtotal=$request['quantity']*$request['price'];
    //         $cart->save();
    //         return redirect()->back()->withSuccess('Updated Successfully');
    //     }

    //     public function deletefromcartWears($id)
    //     {
    //         $user_id = Auth::id();
    //         $wish = CartWears::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }
    //     //-----------------------Drugs-----------------------------------------------------//


    //     public function DrugCart()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $drug = DB::table('cart_drugs')
    //                 ->join('users', 'users.id', '=', 'cart_drugs.customer_id')
    //                 ->join('drugs', 'drugs.id', '=', 'cart_drugs.product_id')
    //                 ->where('cart_drugs.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('drugs.*')->get();
    //             return view('shops.DrugCart', compact('drug'));
    //         }


    //         return redirect("login");
    //     }

    //     public function addtocartDrug(Request $request, $id)
    //     {
    //         if (Auth::check()) {

    //             $cart = CartDrug::where([['customer_id', $request->user()->id], ['product_id', $id]])->first();
    //             if (isset($cart)) {
    //                 return redirect()->back()->withSuccess('already in cart');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_id' => $id
    //                 );
    //                 CartDrug::create($ins);
    //                 return redirect()->back()->with('message', 'product added to cart');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function addDrug(Request $request, $id)
    //     {
    //         $user_id = Auth::id();
    //         $cart = CartDrug::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail();
    //         $cart->quantity = $request['quantity'];
    //         // $cart->subtotal=$request['quantity']*$request['price'];
    //         $cart->save();
    //         return redirect()->back()->withSuccess('Updated Successfully');
    //     }
    //     public function deletefromcartDrug($id)
    //     {
    //         $user_id = Auth::id();
    //         $wish = CartDrug::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }

    //     //----------------------------BOOKS---------------------------------------------//
    //     public function BookCart()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $book = DB::table('cart_books')
    //                 ->join('users', 'users.id', '=', 'cart_books.customer_id')
    //                 ->join('books', 'books.id', '=', 'cart_books.customer_id')

    //                 // ->join('books AS A', 'A.id', '=', 'cart_books.product_id')
    //                 // ->join('books AS B', 'B.price', '=', 'cart_books.price')
    //                 //                 ->select(DB::raw("SELECT books.id,
    //                 //       books.price
    //                 // from books
    //                 // join cart_books product_id
    //                 // on books.id=cart_books.product_id
    //                 // join books price
    //                 // on books.price=cart_books.price;"))
    //                 ->where('cart_books.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('books.*')->get();
    //             return view('shops.BookCart', compact('book'));
    //         }


    //         return redirect("login");
    //     }

    //     public function addtocartBook(Request $request, $id, $price)
    //     {
    //         if (Auth::check()) {

    //             $cart = CartBook::where([['customer_id', $request->user()->id], ['product_id', $id], ['price', $price]])->first();
    //             if (isset($cart)) {
    //                 return redirect()->back()->withSuccess('already in cart');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_id' => $id
    //                 );
    //                 CartBook::create($ins);
    //                 return redirect()->back()->with('message', 'product added to cart');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     // public function cart()
    //     // {
    //     //     return view('shops.cart');
    //     // }
    //     public function addBook(Request $request, $id)
    //     {
    //         $user_id = Auth::id();
    //         $cart = CartBook::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail();
    //         $cart->quantity = $request['quantity'];
    //         // $cart->subtotal=$request['quantity']*$request['price'];
    //         $cart->save();
    //         return redirect()->back()->withSuccess('Updated Successfully');
    //     }
    //     public function deletefromcartBook($id)
    //     {
    //         $user_id = Auth::id();
    //         $wish = CartBook::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }



    //     //------------------------------------------WISHLIST---------------------------------------//

    //     // public function gatherCart()
    //     // {
    //     //     if (Auth::check()) {
    //     //         $user_id = Auth::id();
    //     //     //     [
    //     //     //     'users'=>User::join('user_company','user_company.user_id','=','users.id')
    //     //     //    ->where('company_id',$company->id)->paginate(10),
    //     //     //    'newComers'=>User::where('role_id',2)->get(),
    //     //     //    ]

    //     //         $data = DB::table('carts')
    //     //             ->join('users', 'users.id', '=', 'carts.customer_id')
    //     //             // ->join('cart_teches', 'cart_teches.id', '=', 'wishlists.product_name')
    //     //             ->join('cart_wears', 'cart_wears.id', '=', 'carts.cart_id')
    //     //             // ->join('cart_books', 'cart_books.id', '=', 'wishlists.product_name')
    //     //             //  ->join('cart_food', 'cart_food.id', '=', 'wishlists.product_name')
    //     //             // ->join('cart_drugs', 'cart_drugs.id', '=', 'wishlists.product_name')
    //     //             ->where('carts.customer_id', 'LIKE', '%' . $user_id . '%')
    //     //             ->select('cart_wears.*')->get();

    //     //         return view('shops.cart', with(compact('data')));
    //     //     }

    //     //     return redirect("login")->withSuccess('Great! You have Successfully Registered Now logIn');
    //     // }
    //     // public function addtowishlist(Request $request, $name)
    //     // {
    //     //     if (Auth::check()) {

    //     //         $wish = wishlist::where([['customer_id', $request->user()->id], ['product_name', $name]])->first();
    //     //         if (isset($wish)) {
    //     //             return redirect()->back()->withSuccess('already in wishlist');
    //     //         } else {
    //     //             $ins = array(
    //     //                 'customer_id' => $iduser = $request->user()->id,
    //     //                 'product_name' => $name
    //     //             );
    //     //             wishlist::create($ins);
    //     //             return redirect()->back()->with('message', 'product added to wishlist');
    //     //         }
    //     //     } else {
    //     //         return redirect('login')->withSuccess('login first');
    //     //     }
    //     // }
    //     // public function deletefromwishlist($id)
    //     // {
    //     //     $user_id = Auth::id();
    //     //     $wish = wishlist::where([['customer_id', $user_id], ['product_id', $id]])->firstorfail()->delete();
    //     //     return redirect()->back()->withSuccess('Deleted Successfully');
    //     // }


    //     public function wishFood()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $data = DB::table('wishlist_food')
    //                 ->join('users', 'users.id', '=', 'wishlist_food.customer_id')
    //                 ->join('food', 'food.product_name', '=', 'wishlist_food.product_name')
    //                 ->where('wishlist_food.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('food.*')->get();

    //             return view('shops.wishlistFood', compact('data'));
    //         }

    //         return redirect("login")->withSuccess('Great! You have Successfully Registered Now logIn');
    //     }
    //     public function addtowishlistFood(Request $request, $name)
    //     {
    //         if (Auth::check()) {

    //             $wish = wishlistFood::where([['customer_id', $request->user()->id], ['product_name', $name]])->first();
    //             if (isset($wish)) {
    //                 return redirect()->back()->withSuccess('already in wishlist');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_name' => $name
    //                 );
    //                 wishlistFood::create($ins);
    //                 return redirect()->back()->with('message', 'product added to wishlist');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function deletefromwishlistFood($name)
    //     {
    //         $user_id = Auth::id();
    //         $wish = wishlistFood::where([['customer_id', $user_id], ['product_name', $name]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }


    //     public function wishDrug()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $data = DB::table('wishlist_drugs')
    //                 ->join('users', 'users.id', '=', 'wishlist_drugs.customer_id')
    //                 ->join('drugs', 'drugs.product_name', '=', 'wishlist_drugs.product_name')
    //                 ->where('wishlist_drugs.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('drugs.*')->get();

    //             return view('shops.wishlistDrug', compact('data'));
    //         }

    //         return redirect("login")->withSuccess('Great! You have Successfully Registered Now logIn');
    //     }
    //     public function addtowishlistDrug(Request $request, $name)
    //     {
    //         if (Auth::check()) {

    //             $wish = wishlistDrug::where([['customer_id', $request->user()->id], ['product_name', $name]])->first();
    //             if (isset($wish)) {
    //                 return redirect()->back()->withSuccess('already in wishlist');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_name' => $name
    //                 );
    //                 wishlistDrug::create($ins);
    //                 return redirect()->back()->with('message', 'product added to wishlist');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function deletefromwishlistDrug($name)
    //     {
    //         $user_id = Auth::id();
    //         $wish = wishlistDrug::where([['customer_id', $user_id], ['product_name', $name]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }



    //     public function wishBook()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $data = DB::table('wishlist_books')
    //                 ->join('users', 'users.id', '=', 'wishlist_books.customer_id')
    //                 ->join('books', 'books.product_name', '=', 'wishlist_books.product_name')
    //                 ->where('wishlist_books.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('books.*')->get();

    //             return view('shops.wishlistBook', compact('data'));
    //         }

    //         return redirect("login")->withSuccess('Great! You have Successfully Registered Now logIn');
    //     }
    //     public function addtowishlistBook(Request $request, $name)
    //     {
    //         if (Auth::check()) {

    //             $wish = wishlistBook::where([['customer_id', $request->user()->id], ['product_name', $name]])->first();
    //             if (isset($wish)) {
    //                 return redirect()->back()->withSuccess('already in wishlist');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_name' => $name
    //                 );
    //                 wishlistBook::create($ins);
    //                 return redirect()->back()->with('message', 'product added to wishlist');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function deletefromwishlistBook($name)
    //     {
    //         $user_id = Auth::id();
    //         $wish = wishlistBook::where([['customer_id', $user_id], ['product_name', $name]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }




    //     public function wishTech()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $data = DB::table('wishlist_teches')
    //                 ->join('users', 'users.id', '=', 'wishlist_teches.customer_id')
    //                 ->join('tech', 'tech.product_name', '=', 'wishlist_teches.product_name')
    //                 ->where('wishlist_teches.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('tech.*')->get();

    //             return view('shops.wishlistTech', compact('data'));
    //         }

    //         return redirect("login")->withSuccess('Great! You have Successfully Registered Now logIn');
    //     }
    //     public function addtowishlistTech(Request $request, $name)
    //     {
    //         if (Auth::check()) {

    //             $wish = wishlistTech::where([['customer_id', $request->user()->id], ['product_name', $name]])->first();
    //             if (isset($wish)) {
    //                 return redirect()->back()->withSuccess('already in wishlist');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_name' => $name
    //                 );
    //                 wishlistTech::create($ins);
    //                 return redirect()->back()->with('message', 'product added to wishlist');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function deletefromwishlistTech($name)
    //     {
    //         $user_id = Auth::id();
    //         $wish = wishlistTech::where([['customer_id', $user_id], ['product_name', $name]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }



    //     public function wishWears()
    //     {
    //         if (Auth::check()) {
    //             $user_id = Auth::id();
    //             $data = DB::table('wishlist_wears')
    //                 ->join('users', 'users.id', '=', 'wishlist_wears.customer_id')
    //                 ->join('wears', 'wears.product_name', '=', 'wishlist_wears.product_name')
    //                 ->where('wishlist_wears.customer_id', 'LIKE', '%' . $user_id . '%')
    //                 ->select('wears.*')->get();

    //             return view('shops.wishlistWears', compact('data'));
    //         }

    //         return redirect("login")->withSuccess('Great! You have Successfully Registered Now logIn');
    //     }
    //     public function addtowishlistWears(Request $request, $name)
    //     {
    //         if (Auth::check()) {

    //             $wish = wishlistWears::where([['customer_id', $request->user()->id], ['product_name', $name]])->first();
    //             if (isset($wish)) {
    //                 return redirect()->back()->withSuccess('already in wishlist');
    //             } else {
    //                 $ins = array(
    //                     'customer_id' => $iduser = $request->user()->id,
    //                     'product_name' => $name
    //                 );
    //                 wishlistWears::create($ins);
    //                 return redirect()->back()->with('message', 'product added to wishlist');
    //             }
    //         } else {
    //             return redirect('login')->withSuccess('login first');
    //         }
    //     }
    //     public function deletefromwishlistWears($name)
    //     {
    //         $user_id = Auth::id();
    //         $wish = wishlistWears::where([['customer_id', $user_id], ['product_name', $name]])->firstorfail()->delete();
    //         return redirect()->back()->withSuccess('Deleted Successfully');
    //     }




}
