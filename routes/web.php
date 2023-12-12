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

Route::view('/', 'landing');


Auth::routes(['verify' => true]);




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



Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], '/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



    Route::view('/admin/slick', 'admin.slick', ['user' => Auth::user()]);
    Route::view('/admin/datatables', 'admin.datatables', ['user' => Auth::user()]);
    Route::view('/admin/test', 'admin.test', ['user' => Auth::user()]);
    Route::view('/admin/blank', 'admin.blank', ['user' => Auth::user()])->middleware('password.confirm');


    Route::get('/admin/categories/show',[App\Http\Controllers\CategoriesController::class, 'index'])->name('categories-index-root');
    Route::get('/admin/categories/show/{alias}',[App\Http\Controllers\CategoriesController::class, 'index'])->name('categories-index');
    Route::get('/admin/categories/create/',[App\Http\Controllers\CategoriesController::class, 'create'])->name('categories-create-root');
    Route::get('/admin/categories/create/{alias}',[App\Http\Controllers\CategoriesController::class, 'create'])->name('categories-create');
    Route::post('/admin/categories/create/{alias}',[App\Http\Controllers\CategoriesController::class, 'store'])->name('categories-store');

    Route::get('/admin/categories/edit/{alias}',[App\Http\Controllers\CategoriesController::class, 'edit'])->name('categories-edit');
    Route::post('/admin/categories/update/{alias}',[App\Http\Controllers\CategoriesController::class, 'update'])->name('categories-update');

    Route::get('/admin/products/create/{alias}',[App\Http\Controllers\ProductsController::class, 'create'])->name('products-create');
    Route::post('/admin/products/create/{alias}',[App\Http\Controllers\ProductsController::class, 'store'])->name('products-store');


});

