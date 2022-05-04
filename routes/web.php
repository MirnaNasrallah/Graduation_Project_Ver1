<?php

use App\Http\Controllers\AdminCRUDController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\userLoginController;
use App\Http\Controllers\Auth\userRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\shops\wearsController;
use App\Http\Controllers\shops\shopsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\shops\booksController;
use App\Http\Controllers\shops\drugsController;
use App\Http\Controllers\shops\techController;
use App\Http\Controllers\shops\foodieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('welcome', [HomeController::class, 'index2'])->name('welcome');

Auth::routes();
//-------------- USER REGISTER AND LOGIN --------------------//
Route::get('register',[userRegisterController::class, 'registerOpen'])->name('user.register');
Route::post('register',[userRegisterController::class, 'register'])->name('register');
Route::get('login',[userLoginController::class, 'loginOpen'])->name('user.login');
Route::post('login',[userLoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//--------------------- ADMIN LOGIN AND CRUD ---------------//
Route::get('adminLogin',[AdminLoginController::class, 'adminLogin'])->name('adminLogin');
Route::post('adminPostLogin',[AdminLoginController::class, 'adminPostLogin'])->name('adminPostLogin');
Route::get('AdminDashboard', [AdminLoginController::class, 'AdminDashboard'])->name('AdminDashboard');
Route::get('admin.wearsAdmin',[AdminCRUDController::class,'index'])->name('admin.wearsAdmin');
Route::get('createWear',[AdminCRUDController::class, 'createWear'])->name('createWear');
Route::post('storeWear',[AdminCRUDController::class,'storeWear'])->name('storeWear');
Route::get('/edit/{id}',[AdminCRUDController::class, 'editWear'])->name('editWear');
Route::put('/updateWear/{id}',[AdminCRUDController::class, 'updateWear'])->name('updateWear');
Route::get('destroyWear/{id}',[AdminCRUDController::class,'destroyWear'])->name('destroyWear');


//-----------------------------------USER-------------------------------//

Route::get('userProfileNew', [HomeController::class, 'info'])->name('userProfileNew');
Route::post('userProfileNew', [HomeController::class, 'update'])->name('user.update');
Route::post('imageupload',  [HomeController::class, 'uploadImage'])->name('imageupload');




//------------------------------SHOPS ROUTES---------------------------//

Route::get('/search', [shopsController::class, 'searchIndex'])->name('search');
Route::get('wears',[wearsController::class, 'viewWears'])->name('wears');

//-------------------------------WEARS NORMAL FILTERS---------------------------//

Route::get('/Womencoats',[wearsController::class,'womenShopCoats'])->name('womenShopCoats');
Route::get('/WomenJackets',[wearsController::class,'womenShopJackets'])->name('womenShopJackets');
Route::get('/WomenDresses',[wearsController::class,'womenShopDresses'])->name('womenShopDresses');
Route::get('/WomenShirts',[wearsController::class,'womenShopShirts'])->name('womenShopShirts');
Route::get('/WomenTshirts',[wearsController::class,'womenShopTshirts'])->name('womenShopTshirts');
Route::get('/WomenJeans',[wearsController::class,'womenShopJeans'])->name('womenShopJeans');

Route::get('/Mencoats',[wearsController::class,'menShopCoats'])->name('menShopCoats');
Route::get('/MenJackets',[wearsController::class,'menShopJackets'])->name('menShopJackets');
Route::get('/MenShirts',[wearsController::class,'menShopShirts'])->name('menShopShirts');
Route::get('/MenTshirts',[wearsController::class,'menShopTshirts'])->name('menShopTshirts');
Route::get('/MenJeans',[wearsController::class,'menShopJeans'])->name('menShopJeans');

Route::get('/Kidscoats',[wearsController::class,'kidsShopCoats'])->name('kidsShopCoats');
Route::get('/KidsJackets',[wearsController::class,'kidsShopJackets'])->name('kidsShopJackets');
Route::get('/KidsDresses',[wearsController::class,'kidsShopDresses'])->name('kidsShopDresses');
Route::get('/KidsShirts',[wearsController::class,'kidsShopShirts'])->name('kidsShopShirts');
Route::get('/KidsTshirts',[wearsController::class,'kidsShopTshirts'])->name('kidsShopTshirts');
Route::get('/KidsJeans',[wearsController::class,'kidsShopJeans'])->name('kidsShopJeans');

Route::get('/priceLimitWears',[wearsController::class,'priceLimitWears'])->name('priceLimitWears');
Route::get('/sortPrice',[wearsController::class,'sortPrice'])->name('sortPrice');

Route::get('/xs',[wearsController::class,'shopXS'])->name('shopXS');
Route::get('/s',[wearsController::class,'shopS'])->name('shopS');
Route::get('/m',[wearsController::class,'shopM'])->name('shopM');
Route::get('/l',[wearsController::class,'shopL'])->name('shopL');
Route::get('/xl',[wearsController::class,'shopXL'])->name('shopXL');
Route::get('/xxl',[wearsController::class,'shopXXL'])->name('shopXXL');

//-----------------------------------BOOKS-----------------------------------------------//
Route::get('books', [booksController::class, 'viewBooks'])->name('books');
Route::get('/auth1', [booksController::class, 'shopAuth1'])->name('shopAuth1');
Route::get('/auth2', [booksController::class, 'shopAuth2'])->name('shopAuth2');
Route::get('/auth3', [booksController::class, 'shopAuth1'])->name('shopAuth3');

Route::get('/novel', [booksController::class, 'shopNovel'])->name('shopNovel');
Route::get('/kids', [booksController::class, 'shopkidBooks'])->name('shopkidBooks');
Route::get('/Educational', [booksController::class, 'shopEdu'])->name('shopEdu');
Route::get('/History', [booksController::class, 'shopHistory'])->name('shopHistory');

Route::get('/priceLimitBooks',[booksController::class,'priceLimitBooks'])->name('priceLimitBooks');
//-----------------------------------DRUGS-----------------------------------------------//
Route::get('drugs', [drugsController::class, 'viewDrugs'])->name('drugs');
Route::get('/Medicine', [drugsController::class, 'shopMedicine'])->name('shopMedicine');
Route::get('/HairCare', [drugsController::class, 'shopHairCare'])->name('shopHairCare');
Route::get('/SkinCare', [drugsController::class, 'shopSkinCare'])->name('shopSkinCare');
Route::get('/Devices', [drugsController::class, 'shopDevices'])->name('shopDevices');
Route::get('/Sanitizers', [drugsController::class, 'shopSanitizers'])->name('shopSanitizers');

Route::get('/priceLimitDrugs',[drugsController::class,'priceLimitDrugs'])->name('priceLimitDrugs');
//-----------------------------------TECH-----------------------------------------------//
Route::get('tech', [techController::class, 'viewTech'])->name('tech');
Route::get('/Mobiles', [techController::class, 'shopMobiles'])->name('shopMobiles');
Route::get('/LapTops', [techController::class, 'shopLaptops'])->name('shopLaptops');
Route::get('/Tablets', [techController::class, 'shopTablets'])->name('shopTablets');
Route::get('/Chargers', [techController::class, 'shopChargers'])->name('shopChargers');
Route::get('/Accessories', [techController::class, 'shopAccessories'])->name('shopAccessories');

Route::get('/priceLimitTech',[techController::class,'priceLimitTech'])->name('priceLimitTech');
//-----------------------------------FOODIE-----------------------------------------------//
Route::get('foodie', [foodieController::class, 'viewFoodie'])->name('foodie');
Route::get('/priceLimitFoodie',[foodieController::class,'priceLimitFoodie'])->name('priceLimitFoodie');
//----------------------------CART-----------------------------//
Route::get('cart',[shopsController::class, 'Wearscart'])->name('cart');
Route::get('/addtocart/{id}', [shopsController::class, 'addtocart'])->name('addtocart');
Route::post('/updateqty/{id}', [shopsController::class, 'add'])->name('cartQty.update');

Route::get('cartTech',[shopsController::class, 'cartTech'])->name('cartTech');
Route::get('/addtocartTech/{id}', [shopsController::class, 'addtocartTech'])->name('addtocartTech');
Route::get('/deletefromcart/{id}', [shopsController::class, 'deletefromcart'])->name('deletefromcart');
//--------------------------WISHLIST----------------------------//
Route::get('/wishlist', [shopsController::class, 'wish'])->name('wishlist');
Route::get('/addtowishlist/{id}', [shopsController::class, 'addtowishlist'])->name('addtowishlist');
Route::get('/deletefromwishlist/{id}', [shopsController::class, 'deletefromwishlist'])->name('deletefromwishlist');
