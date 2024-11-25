<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::view('/', 'landing');
Route::get('/',[App\Http\Controllers\FrontendController::class, 'index'])->name('frontend-index-root');


Route::get('/catalog/{alias}',[App\Http\Controllers\FrontendController::class, 'catalog'])->name('frontend-catalog-show');
Route::get('/discount-products',[App\Http\Controllers\FrontendController::class, 'discounts'])->name('frontend-discounts-show');
Route::get('/new-products',[App\Http\Controllers\FrontendController::class, 'news'])->name('frontend-news-show');
Route::get('/product/{alias}',[App\Http\Controllers\FrontendController::class, 'product'])->name('frontend-product-show');
Route::get('/cart',[App\Http\Controllers\FrontendController::class, 'cart'])->name('cart-show');
Route::view('/checkout', 'frontend.checkout')->name('checkout-show');
Route::get('/checkout-complete',[App\Http\Controllers\CheckoutController::class, 'checkoutComplete'])->name('checkout-complete');


Route::view('/404', 'frontend.pages.404')->name('pages-404');
Route::view('/par-mums', 'frontend.pages.about')->name('pages-about');
Route::view('/privatuma-politika', 'frontend.pages.privacy')->name('pages-privacy');
Route::view('/internetveikala-lietosanas-noteikumi', 'frontend.pages.rules')->name('pages-rules');
Route::view('/piegade', 'frontend.pages.delivery')->name('pages-delivery');
Route::view('/kontakti', 'frontend.pages.contacts')->name('pages-contacts');
Route::view('/profils', 'frontend.pages.profile')->name('pages-profile');


Route::get('/venipaktest',[App\Http\Controllers\HomeController::class, 'venipakTest'])->name('venipak-test');
Route::get('/dpdtest',[App\Http\Controllers\HomeController::class, 'dpdTest'])->name('dpd-test');
Route::get('/mailtest',[App\Http\Controllers\FrontendController::class, 'mailtest'])->name('mail-test');

Route::view('/mailtemp', 'frontend.pages.mailtemp');


Auth::routes([
    'verify' => true,
    'register' => true
]);



Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    $finduser = User::where('provider','google')->where('provider_id', $user->id)->first();

    if($finduser){
        Auth::login($finduser);
        return redirect()->intended('dashboard');
    }else{
        $newUser = User::updateOrCreate(['email' => $user->email],[
                'name' => $user->name,
                'provider'=> 'google',
                'provider_id'=> $user->id,
                'avatar'=> $user->avatar,
                'password'=>md5(rand(1,10000)),
            ]);
        $newUser->avatar = $user->avatar;
        $newUser->markEmailAsVerified();
        Auth::login($newUser);
        return redirect()->intended('dashboard');
    }
});



Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::match(['get', 'post'], '/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



    Route::view('/admin/slick', 'admin.slick', ['user' => Auth::user()]);
    Route::view('/admin/datatables', 'admin.datatables', ['user' => Auth::user()]);
    Route::view('/admin/test', 'admin.test', ['user' => Auth::user()]);
    Route::view('/admin/blank', 'admin.blank', ['user' => Auth::user()])->middleware('password.confirm');



    Route::get('/admin/categories/show',[App\Http\Controllers\CategoriesController::class, 'index'])->name('categories-index-root');
    Route::get('/admin/categories/show/{alias?}/{showinnactive?}',[App\Http\Controllers\CategoriesController::class, 'index'])->name('categories-index');
    Route::get('/admin/categories/showinnactive',[App\Http\Controllers\CategoriesController::class, 'showinnactive'])->name('categories-showinnactive');
    Route::get('/admin/categories/search',[App\Http\Controllers\CategoriesController::class, 'search'])->name('categories-search-product');

    Route::get('/admin/categories/attributes/{alias?}',[App\Http\Controllers\CategoriesController::class, 'attributes'])->name('attributes');
    Route::get('/admin/categories/attributes/manage/{alias}/{id?}',[App\Http\Controllers\CategoriesController::class, 'manageAttribute'])->name('attributes-manage');
    Route::post('/admin/categories/attributes/store/{id?}',[App\Http\Controllers\CategoriesController::class, 'storeAttribute'])->name('attributes-store');

    Route::get('/admin/categories/create/',[App\Http\Controllers\CategoriesController::class, 'create'])->name('categories-create-root');
    Route::get('/admin/categories/create/{alias}',[App\Http\Controllers\CategoriesController::class, 'create'])->name('categories-create');
    Route::post('/admin/categories/create/{alias}/{parent?}',[App\Http\Controllers\CategoriesController::class, 'store'])->name('categories-store');

    Route::get('/admin/categories/edit/{alias}',[App\Http\Controllers\CategoriesController::class, 'edit'])->name('categories-edit');
    Route::post('/admin/categories/update/{alias}',[App\Http\Controllers\CategoriesController::class, 'update'])->name('categories-update');
    Route::post('/admin/categories/update-sorting', [App\Http\Controllers\CategoriesController::class, 'updateSorting'])->name('categories-update-sorting');
    Route::post('/admin/attributes/update-sorting', [App\Http\Controllers\CategoriesController::class, 'updateAttributesSorting'])->name('attributes-update-sorting');




    Route::get('/admin/products/copy/{alias}',[App\Http\Controllers\ProductsController::class, 'copy'])->name('products-copy');
    Route::get('/admin/products/create/{alias}',[App\Http\Controllers\ProductsController::class, 'create'])->name('products-create');
    Route::get('/admin/products/edit/{alias}',[App\Http\Controllers\ProductsController::class, 'edit'])->name('products-edit');
    Route::get('/admin/products/gallery/{alias}',[App\Http\Controllers\ProductsController::class, 'showGallery'])->name('products-gallery');
    Route::get('/admin/products/attributes/{alias}',[App\Http\Controllers\ProductsController::class, 'showAttributes'])->name('products-attributes');
    Route::get('/admin/products/variations/{alias}',[App\Http\Controllers\ProductsController::class, 'showVariations'])->name('products-variations');
    Route::post('/admin/products/create/{alias}',[App\Http\Controllers\ProductsController::class, 'store'])->name('products-store');
    Route::post('/admin/products/update/{alias}',[App\Http\Controllers\ProductsController::class, 'store'])->name('products-update');
    Route::post('/admin/products/attributes/{alias}',[App\Http\Controllers\ProductsController::class, 'updateAttributes'])->name('attributes-update');
    Route::post('/admin/products/variations/{productID}',[App\Http\Controllers\ProductsController::class, 'updateVariationsAttributes'])->name('variations-attributes-update');
    Route::post('/upload-product-gallery', [App\Http\Controllers\ProductsController::class, 'productGalleryUpload'])->name('productGalleryUpload');



    Route::get('/orders/show',[App\Http\Controllers\OrdersController::class, 'index'])->name('orders-show');
    Route::get('/orders/show/{key}',[App\Http\Controllers\OrdersController::class, 'showOrder'])->name('show-order');


    Route::get('/clients/show',[App\Http\Controllers\ClientsController::class, 'index'])->name('clients-show');
    Route::get('/clients/show/{email}',[App\Http\Controllers\ClientsController::class, 'showClient'])->name('show-client');


    Route::get('/banners/show',[App\Http\Controllers\BannersController::class, 'index'])->name('banners-show');
    Route::get('/banners/create',[App\Http\Controllers\BannersController::class, 'createType'])->name('banners-create-type');
    Route::post('/banners/create',[App\Http\Controllers\BannersController::class, 'submitType'])->name('banners-submit-type');
    Route::get('/banners/edit/{id}',[App\Http\Controllers\BannersController::class, 'editBanner'])->name('banners-edit');



    Route::get('/discounts/show',[App\Http\Controllers\DiscountsController::class, 'index'])->name('discounts-show');
    Route::get('/discounts/create',[App\Http\Controllers\DiscountsController::class, 'createType'])->name('discounts-create-type');
    Route::post('/discounts/create',[App\Http\Controllers\DiscountsController::class, 'submitType'])->name('discounts-submit-type');
    Route::get('/discounts/edit/{id}',[App\Http\Controllers\DiscountsController::class, 'editDiscount'])->name('discounts-edit');


});

