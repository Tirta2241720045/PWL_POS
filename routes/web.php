<?php

use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return  view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);


// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\SalesController;
    

// Route::get('/', [HomeController::class, 'index']);

// Route::prefix('category')->group(function () {
//     Route::get('/food-beverage', [ProductController::class, 'showFoodBeverage']);
//     Route::get('/beauty-health', [ProductController::class, 'showBeautyHealth']);
//     Route::get('/home-care', [ProductController::class, 'showHomeCare']);
//     Route::get('/baby-kid', [ProductController::class, 'showBabyKid']);
// });

// Route::get('/user/{id}/name/{name}', [UserController::class, 'showProfile']);

// Route::get('/sales', [SalesController::class, 'showPOS']);
    // Route::middleware(['first', 'second'])->group(function () { Route::get('/', function () {
    //     // Uses first & second middleware...
    //     });
        
    //     Route::get('/user/profile', function () {
    //     // Uses first & second middleware...
    //     });
    //     });
        
    //     Route::domain('{account}.example.com')->group(function () { Route::get('user/{id}', function ($account, $id) {
    //     //
    //     });
    //     });
        
    //     Route::middleware('auth')->group(function () { Route::get('/user', [UserController::class, 'index']); Route::get('/post', [PostController::class, 'index']); Route::get('/event', [EventController::class, 'index']);
        
    //     });

    // Route::prefix('admin')->group(function () { Route::get('/user', [UserController::class, 'index']); Route::get('/post', [PostController::class, 'index']); Route::get('/event', [EventController::class, 'index']);

    // });
    
    // Route::redirect('/here', '/there');
    
    // Route::view('/welcome', 'welcome'); Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
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

// Route::get('/', function () {
//     return view('welcome');
// });

