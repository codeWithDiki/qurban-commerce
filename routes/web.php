<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing.landing')->name('home');
Route::view('/order/create', 'order.create')->name('order.create');
Route::view('/animal/add', 'animal.create')->name('animal.create');
Route::view('/animal/list', 'list.animal-list')->name('animal.list');
Route::view('/order/list', 'list.order-list')->name('order.list');
Route::view('/animal/edit', 'edit.edit-animal')->name('animal.edit');
Route::view('/order/edit', 'edit.edit-order')->name('order.edit');
