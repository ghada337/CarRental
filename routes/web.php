<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

// Route::get('/home', function () {
// .
// })->middleware('verified');


Route::get('/', function () {
    return view('web.index');
})->name('index');

Route::get('listing', function () {
    return view('web.listing');
})->name('listing');

Route::get('testimonials', function () {
    return view('web.testimonials');
})->name('testimonials');

Route::get('blog', function () {
    return view('web.blog');
})->name('blog');

Route::get('about', function () {
    return view('web.about');
})->name('about');

Route::get('contact', function () {
    return view('web.contact');
})->name('contact');


Auth::routes(['verify' => true]);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
