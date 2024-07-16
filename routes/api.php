<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', function(Request $request){

    $validate_data = $request->validate([
        'name'  =>  'required|string|max:255',
        'email' =>  'required|email|unique:users,email',
        'password'  =>  'required|min:8'
    ]);

    if(User::create($validate_data)){
        return response()->json([
            'message'   => 'User created successfully'
        ]);
    } else {
        return response()->json([
            'error' =>  'Error'
        ]);
    }

});