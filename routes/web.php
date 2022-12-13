<?php

use App\Http\Controllers\ProfileController;
use App\Notifications\TgNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;




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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/tg',function (){
    Notification::send(auth()->user(), new TgNotification());
    return redirect()->back();
});
require __DIR__.'/auth.php';


//\Illuminate\Support\Facades\Notification::route('telegram','5392648086')->notify(new \App\Notifications\TgNotification());
