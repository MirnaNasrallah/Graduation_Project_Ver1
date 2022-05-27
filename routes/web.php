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
use App\Http\Controllers\PremiumUserController;
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

//---------------------------------------- ADMIN LOGIN AND CRUD ----------------------------//
Route::get('adminLogin',[AdminLoginController::class, 'adminLogin'])->name('adminLogin');
Route::post('adminPostLogin',[AdminLoginController::class, 'adminPostLogin'])->name('adminPostLogin');
Route::get('AdminDashboard', [AdminLoginController::class, 'AdminDashboard'])->name('AdminDashboard');

Route::get('wearsAdmin',[AdminCRUDController::class,'index'])->name('admin.wearsAdmin');
Route::get('createWear',[AdminCRUDController::class, 'createWear'])->name('createWear');
Route::post('storeWear',[AdminCRUDController::class,'storeWear'])->name('storeWear');
Route::get('editWear/{id}',[AdminCRUDController::class, 'editWear'])->name('editWear');
Route::put('updateWear/{id}',[AdminCRUDController::class, 'updateWear'])->name('updateWear');
Route::get('destroyWear/{id}',[AdminCRUDController::class,'destroyWear'])->name('destroyWear');


//-----------TECH---------------//
Route::get('admin.techAdmin', [AdminCRUDController::class, 'indexTech'])->name('admin.techAdmin');
Route::get('createTech', [AdminCRUDController::class, 'createTech'])->name('createTech');
Route::post('storeTech', [AdminCRUDController::class, 'storeTech'])->name('storeTech');
Route::get('editTech/{id}', [AdminCRUDController::class, 'editTech'])->name('editTech');
Route::put('updateTech/{id}', [AdminCRUDController::class, 'updateTech'])->name('updateTech');
Route::get('destroyTech/{id}', [AdminCRUDController::class, 'destroyTech'])->name('destroyTech');

//------------DRUG---------------//
Route::get('admin.drugAdmin', [AdminCRUDController::class, 'indexDrug'])->name('admin.drugAdmin');
Route::get('createDrug', [AdminCRUDController::class, 'createDrug'])->name('createDrug');
Route::post('storeDrug', [AdminCRUDController::class, 'storeDrug'])->name('storeDrug');
Route::get('editDrug/{id}', [AdminCRUDController::class, 'editDrug'])->name('editDrug');
Route::put('updateDrug/{id}', [AdminCRUDController::class, 'updateDrug'])->name('updateDrug');
Route::get('destroyDrug/{id}', [AdminCRUDController::class, 'destroyDrug'])->name('destroyDrug');

//------------BOOK---------------//
Route::get('admin.booksAdmin', [AdminCRUDController::class, 'indexBook'])->name('admin.booksAdmin');
Route::get('createBook', [AdminCRUDController::class, 'createBook'])->name('createBook');
Route::post('storeBook', [AdminCRUDController::class, 'storeBook'])->name('storeBook');
Route::get('editBook/{id}', [AdminCRUDController::class, 'editBook'])->name('editBook');
Route::put('updateBook/{id}', [AdminCRUDController::class, 'updateBook'])->name('updateBook');
Route::get('destroyBook/{id}', [AdminCRUDController::class, 'destroyBook'])->name('destroyBook');

//------------FOOD---------------//
Route::get('admin.foodAdmin', [AdminCRUDController::class, 'indexFood'])->name('admin.foodAdmin');
Route::get('createFood', [AdminCRUDController::class, 'createFood'])->name('createFood');
Route::post('storeFood', [AdminCRUDController::class, 'storeFood'])->name('storeFood');
Route::get('editFood/{id}', [AdminCRUDController::class, 'editFood'])->name('editFood');
Route::put('updateFood/{id}', [AdminCRUDController::class, 'updateFood'])->name('updateFood');
Route::get('destroyFood/{id}', [AdminCRUDController::class, 'destroyFood'])->name('destroyFood');

//-----------------------------------USER-------------------------------//

Route::get('userProfileNew', [HomeController::class, 'info'])->name('userProfileNew');
Route::post('userProfileNew', [HomeController::class, 'update'])->name('user.update');
Route::post('imageupload',  [HomeController::class, 'uploadImage'])->name('imageupload');




//------------------------------SHOPS ROUTES---------------------------//
Route::get('/search', [shopsController::class, 'searchIndex'])->name('search');
Route::get('wears',[wearsController::class, 'viewWears'])->name('wears');
// Route::get('checkout/{id}/{type}/{quantity}', [shopsController::class, 'ProceedToCheckout'])->name('checkout');
// Route::get('coupon', [wearsController::class, 'Coupon'])->name('coupon');


//-------------------------------WEARS NORMAL FILTERS---------------------------//

Route::get('/Womencoats',[wearsController::class,'womenShopCoats'])->name('womenShopCoats');
Route::get('/WomenJackets',[wearsController::class,'womenShopJackets'])->name('womenShopJackets');
Route::get('/WomenDresses',[wearsController::class,'womenShopDresses'])->name('womenShopDresses');
Route::get('/WomenShirts',[wearsController::class,'womenShopShirts'])->name('womenShopShirts');
Route::get('/WomenTshirts',[wearsController::class,'womenShopTshirts'])->name('womenShopTshirts');
Route::get('/WomenJeans',[wearsController::class,'womenShopJeans'])->name('womenShopJeans');
Route::get('/WomenBags',[wearsController::class,'womenShopBags'])->name('womenShopBags');
Route::get('/WomenAccessories',[wearsController::class,'womenShopAccessories'])->name('womenShopAccessories');
Route::get('/WomenShoes',[wearsController::class,'womenShopShoes'])->name('womenShopShoes');

Route::get('/Mencoats',[wearsController::class,'menShopCoats'])->name('menShopCoats');
Route::get('/MenJackets',[wearsController::class,'menShopJackets'])->name('menShopJackets');
Route::get('/MenShirts',[wearsController::class,'menShopShirts'])->name('menShopShirts');
Route::get('/MenTshirts',[wearsController::class,'menShopTshirts'])->name('menShopTshirts');
Route::get('/MenJeans',[wearsController::class,'menShopJeans'])->name('menShopJeans');
Route::get('/menBags',[wearsController::class,'menShopBags'])->name('menShopBags');
Route::get('/menAccessories',[wearsController::class,'menShopAccessories'])->name('menShopAccessories');
Route::get('/menShoes',[wearsController::class,'menShopShoes'])->name('menShopShoes');

Route::get('/Kidscoats',[wearsController::class,'kidsShopCoats'])->name('kidsShopCoats');
Route::get('/KidsJackets',[wearsController::class,'kidsShopJackets'])->name('kidsShopJackets');
Route::get('/KidsDresses',[wearsController::class,'kidsShopDresses'])->name('kidsShopDresses');
Route::get('/KidsShirts',[wearsController::class,'kidsShopShirts'])->name('kidsShopShirts');
Route::get('/KidsTshirts',[wearsController::class,'kidsShopTshirts'])->name('kidsShopTshirts');
Route::get('/KidsJeans',[wearsController::class,'kidsShopJeans'])->name('kidsShopJeans');
Route::get('/kidsBags',[wearsController::class,'kidsShopBags'])->name('kidsShopBags');
Route::get('/kidsAccessories',[wearsController::class,'kidsShopAccessories'])->name('kidsShopAccessories');
Route::get('/kidsShoes',[wearsController::class,'kidsShopShoes'])->name('kidsShopShoes');

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
Route::get('/auth3', [booksController::class, 'shopAuth3'])->name('shopAuth3');

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
Route::get('/desserts', [foodieController::class, 'shopDesserts'])->name('shopDesserts');
Route::get('/snacks', [foodieController::class, 'shopSnacks'])->name('shopSnacks');
Route::get('/veggies', [foodieController::class, 'shopVeggies'])->name('shopVeggies');
Route::get('/fruits', [foodieController::class, 'shopFruits'])->name('shopFruits');
Route::get('/dressings', [foodieController::class, 'shopDressings'])->name('shopDressings');
Route::get('/lowCal', [foodieController::class, 'shopLowCal'])->name('shopLowCal');
Route::get('/midCal', [foodieController::class, 'shopMidCal'])->name('shopMidCal');
Route::get('/highCal', [foodieController::class, 'shopHighCal'])->name('shopHighCal');
Route::get('/priceLimitFoodie',[foodieController::class,'priceLimitFoodie'])->name('priceLimitFoodie');
//----------------------------CART-----------------------------//


Route::get('cart', [shopsController::class, 'Cart'])->name('cart');
Route::get('wishlist', [shopsController::class, 'wishlist'])->name('wishlist');

Route::get('/addtoCart/{id}/{price}/{type}', [shopsController::class, 'addtocart'])->name('addtoCart');
Route::get('/addtowishlist/{id}/{price}/{type}', [shopsController::class, 'addtowishlist'])->name('addtowishlist');

Route::get('/deletefromcart/{id}', [shopsController::class, 'deletefromcart'])->name('deletefromcart');
Route::get('/deletefromwishlist/{id}', [shopsController::class, 'deletefromwishlist'])->name('deletefromwishlist');

Route::post('/updateqty/{id}', [shopsController::class, 'QtyUpdate'])->name('QtyUpdate');


// Route::get('cartFood', [shopsController::class, 'FoodCart'])->name('cartFood');
// Route::get('/addtocartFood/{id}', [shopsController::class, 'addtocartFood'])->name('addtocartFood');
// Route::post('/updateqtyFood/{id}', [shopsController::class, 'addFood'])->name('FoodQty.update');
// Route::get('/deletefromcartFood/{id}', [shopsController::class, 'deletefromcartFood'])->name('deletefromcartFood');



// Route::get('cartWears', [shopsController::class, 'WearsCart'])->name('cartWears');
// Route::get('/addtocartWears/{id}', [shopsController::class, 'addtocartWears'])->name('addtocartWears');
// Route::post('/updateqtyWears/{id}', [shopsController::class, 'addWears'])->name('WearsQty.update');
// Route::get('/deletefromcartWears/{id}', [shopsController::class, 'deletefromcartWears'])->name('deletefromcartWears');



// Route::get('cartBook', [shopsController::class, 'BookCart'])->name('cartBook');
// Route::get('/addtocartBook/{id}/{price}', [shopsController::class, 'addtocartBook'])->name('addtocartBook');
// Route::post('/updateqtyBook/{id}', [shopsController::class, 'addBook'])->name('BookQty.update');
// Route::get('/deletefromcartBook/{id}', [shopsController::class, 'deletefromcartBook'])->name('deletefromcartBook');



// Route::get('cartDrug', [shopsController::class, 'DrugCart'])->name('cartDrug');
// Route::get('/addtocartDrug/{id}', [shopsController::class, 'addtocartDrug'])->name('addtocartDrug');
// Route::post('/updateqtyDrug/{id}', [shopsController::class, 'addDrug'])->name('DrugQty.update');
// Route::get('/deletefromcartDrug/{id}', [shopsController::class, 'deletefromcartDrug'])->name('deletefromcartDrug');






// Route::post('/updateqty/{id}', [shopsController::class, 'add'])->name('cartQty.update');
// Route::get('/deletefromcart/{id}', [shopsController::class, 'deletefromcart'])->name('deletefromcart');
//--------------------------WISHLIST----------------------------//
// Route::get('wishlist', [shopsController::class, 'wishlist'])->name('wishlist');
// Route::get('wishlistFood', [shopsController::class, 'wishFood'])->name('wishlistFood');
// Route::get('wishlistDrug', [shopsController::class, 'wishDrug'])->name('wishlistDrug');

// Route::get('wishlistTech', [shopsController::class, 'wishTech'])->name('wishlistTech');

// Route::get('wishlistBook', [shopsController::class, 'wishBook'])->name('wishlistBook');

// Route::get('wishlistWears', [shopsController::class, 'wishWears'])->name('wishlistWears');


// Route::get('/addtowishlistFood/{name}', [shopsController::class, 'addtowishlistFood'])->name('addtowishlistFood');
// Route::get('/deletefromwishlistFood/{name}', [shopsController::class, 'deletefromwishlistFood'])->name('deletefromwishlistFood');

// Route::get('/addtowishlistDrug/{name}', [shopsController::class, 'addtowishlistDrug'])->name('addtowishlistDrug');
// Route::get('/deletefromwishlistDrug/{name}', [shopsController::class, 'deletefromwishlistDrug'])->name('deletefromwishlistDrug');

// Route::get('/addtowishlistTech/{name}', [shopsController::class, 'addtowishlistTech'])->name('addtowishlistTech');
// Route::get('/deletefromwishlistTech/{name}', [shopsController::class, 'deletefromwishlistTech'])->name('deletefromwishlistTech');

// Route::get('/addtowishlistWears/{name}', [shopsController::class, 'addtowishlistWears'])->name('addtowishlistWears');
// Route::get('/deletefromwishlistWears/{name}', [shopsController::class, 'deletefromwishlistWears'])->name('deletefromwishlistWears');

// Route::get('/addtowishlistBook/{name}', [shopsController::class, 'addtowishlistBook'])->name('addtowishlistBook');
// Route::get('/deletefromwishlistBook/{name}', [shopsController::class, 'deletefromwishlistBook'])->name('deletefromwishlistBook');

//----------------------------PREMIUM USER-----------------------------//
Route::get('/viewPremiumProfile',[PremiumUserController::class, 'viewProfile'])->name('viewPremiumProfile');
Route::get('/PremiumProfile',[PremiumUserController::class, 'upgrade'])->name('upgrade');
Route::get('/userProfile',[PremiumUserController::class, 'downgrade'])->name('downgrade');
//----------------------------------WEARS PREMIUM-------------------------//
Route::get('/EventClassy',[wearsController::class,'EventClassy'])->name('EventClassy');
Route::get('/EventFormal',[wearsController::class,'EventFormal'])->name('EventFormal');
Route::get('/EventCasual',[wearsController::class,'EventCasual'])->name('EventCasual');
Route::get('/EventParty',[wearsController::class,'EventParty'])->name('EventParty');
