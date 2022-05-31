<?php

use App\Models\User;
use App\Notifications\EmailNotifications;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/send-notification',function(){
//    $user = User::find(1);
    $users = User::all();
    foreach ($users as $user){
        $user->notify(new EmailNotifications($user->name,$user->email));
    }
    return redirect()->back();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
