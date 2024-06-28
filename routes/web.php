<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('/blog', 'blog')->name('blog');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('register');

    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login');

    Route::get('/profile', 'profile')->name('profile')->middleware('auth');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});


Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function(){

    Route::controller(AdminController::class)->group(function(){
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('users', 'all_users')->name('users')->middleware('admin');
    });

    Route::controller(PostController::class)->group(function(){
        Route::get('posts', 'all_posts')->name('posts')->middleware('admin');
    });

});


Route::controller(CustomerController::class)->prefix('customer')->as('customer.')->group( function(){
    Route::get('register', 'register')->name('register')->middleware('customerguest');
    Route::post('register', 'store')->name('register');

    Route::get('login', 'login')->name('login')->middleware('customerguest');
    Route::post('login', 'authenticate')->name('login');

    Route::get('profile', 'profile')->name('profile')->middleware('customer');
    Route::post('logout', 'logout')->name('logout');
});


Route::get('encrypted_value', function(){
    $password = 123456;
    $encrypted_password = Crypt::encryptString($password);
    return $encrypted_password;
});

Route::get('decrypted_value', function(){
    $encrypted_password = 'eyJpdiI6IjN5NzFSTTRGTExtSlc4RHZxbWlUcWc9PSIsInZhbHVlIjoiOVBuTkRqdHZPcHVFZkxyNzBYeUFlUT09IiwibWFjIjoiMTk4Y2ExNTAyYTQ2N2RiZTI0ZTljOTVjOGFjNWRlYzNhNjM3M2VlNjcwZmUyMDRhNDg4OTZiMTNhNjczNzgxMiIsInRhZyI6IiJ9';
    $decrypted_password = Crypt::decryptString($encrypted_password);
    return $decrypted_password;
});