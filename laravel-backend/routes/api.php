<?php

use App\Models\UserData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user_data', function(){
    return UserData::all();
});

Route::post('/user_data', function(){
    request()->validate([
        'firstName' => 'required',
        'lastName' => 'required',
    ]);

    return UserData::create([
        'firstName' => request('firstName'),
        'lastName' => request('lastName'),
    ]);
});

Route::patch('/user_data/{user_data}', function(UserData $user_data){
    // $user_data = UserData::findOrFail($id); Equivalent as the line above

    request()->validate([
        'firstName' => 'required',
        'lastName' => 'required',
    ]);

    $sucess = $user_data->update([
        'firstName' => request('firstName'),
        'lastName' => request('lastName'),
    ]);

    return [
        'sucess' => $sucess
    ];
});

Route::delete('/user_data/{user_data}', function(UserData $user_data){
    $sucess = $user_data->delete();

    return [
        'sucess' => $sucess
    ];
});
