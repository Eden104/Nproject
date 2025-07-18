<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('layouts.accueil');
})->name('accueil');

Route::get('/newPage', function(){
    return view('layouts.newPage');
})->name('newPage');

Route::get('/about', function (){
    return view('layouts.about');
})->name('about'); 


Route::get('/signup', function(){
    return view('layouts.signup');
})->name('signup');

Route::post('/signup',[ClientController::class, 'store'])->name('clients.store');

//inscription2(utilisateur)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//espace sécurisé
Route::get('/layouts.lay23accueil', function(){
    if (!Auth::check()) { 
        return redirect()->route('login');
    }
    return view('layouts.lay23accueil');
})->name('lay23accueil');

// shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');
Route::post('/shop/{product}/avis', [ShopController::class, 'storeReview'])
     ->name('shop.reviews.store')
     ->middleware('auth');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{article}', [BlogController::class, 'show'])->name('blog.show');

