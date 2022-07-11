<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Notifications\DatabaseNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification ;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/User',[UserController::class,'index'])->name('user');
Route::get('nofity',function(){

    $users = User::all();
    $letter = collect(['title'=>'New Policy updated','body'=>'we have new  updated over  term and policy kindly read it']);
    Notification::send($users, new DatabaseNotification($letter)); 
    echo "ok done sending to all";


});
Route::get('mark-as-read',function(){

    Auth::user()->notifications->markAsRead();
    return redirect()->back();

})->name('mark-as-read');