<?php

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


// 1. Upload names https://blog.quickadminpanel.com/how-to-import-csv-in-laravel-and-choose-matching-fields/
// 2. Display names https://codepen.io/superhussain/pen/OXmqrX
// 3. Display winners https://codepen.io/superhussain/pen/OXmqrX
// 4. Reset 

Route::view("/randomizer", "raffles.picker")->name("randomizer");