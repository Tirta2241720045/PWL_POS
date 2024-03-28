<?php

use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use Monolog\Level;

Route::get('/', function(){
    return  view('welcome');
});

Route::resource('m_user',POSController::class);
Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class,'index']);
Route::get('/user/tambah', [UserController::class,'tambah']);
Route::post('/user/tambah_simpan', [UserController::class,'tambah_simpan']);
Route::post('/level/tambah_simpan', [LevelController::class,'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class,'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class,'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class,'hapus']); 
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('update');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('edit');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('destroy');

Route::get('/formUser', function () {
    return view('formUser');
});

Route::get('/formLevel', function () {
    return view('formLevel');
});
Route::get('/hello', function () {
    return view('hello', ['name' => 'Andi']);
    });

Route::get('/hello', function () {
    return view('blog.hello', ['name' => 'Andi']);
    });
        
Use Illuminate\Support\Facades\View;
return View::make('hello', ['name' => 'Andi']);
    
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


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
