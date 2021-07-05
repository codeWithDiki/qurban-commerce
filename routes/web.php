<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/order/create', 'order.create')->name('order.create');
Route::view('/animal/add', 'animal.create')->name('animal.create');
