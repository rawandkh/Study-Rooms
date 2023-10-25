<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Topic\TopicController;
use App\Models\Topic;
use Illuminate\Support\Facades\Route;

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
    // Route::get('/',[HomeController::class,'redirect']);
   Route::get('/',[RoomController::class,'index'])->name('index');
   Route::get('/create',[RoomController::class,'create'])->name('rooms.create');
   Route::get('/edit/{id}',[RoomController::class,'edit'])->name('rooms.edit');
  
   Route::put('/update/{id}',[RoomController::class,'update'])->name('rooms.update');
   Route::get('/show/{id}',[RoomController::class,'show'])->name('rooms.show');
 //  Route::get('/show_room/{id}',[TopicController::class,'show_room'])->name('rooms.show_room');
   Route::post('/store',[RoomController::class,'store'])->name('rooms.store');
   Route::get('/delete/{id}',[RoomController::class,'delete'])->name('rooms.delete_room');
 Route::delete('/destroy/{id}',[RoomController::class,'destroy'])->name('rooms.destroy');
 Route::get('/topics',[TopicController::class,'index'])->name('topics.index');
});

require __DIR__.'/auth.php';
