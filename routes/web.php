<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing.landing')->name('home');
Route::view('/order/create', 'order.create')->name('order.create');
Route::view('/animal/add', 'animal.create')->name('animal.create');
Route::view('/animal/list', 'list.animal-list')->name('animal.list');
Route::view('/order/list', 'list.order-list')->name('order.list');
Route::view('/animal/edit', 'edit.edit-animal')->name('animal.edit');
Route::view('/order/edit', 'edit.edit-order')->name('order.edit');
Route::view('/animal/detail', 'detail.detail-animal')->name('animal.detail');
Route::view('/order/detail', 'detail.detail-order')->name('order.detail');
Route::view('/order/verify', 'verify.verify-order')->name('order.verify');
Route::view('/order/payment', 'confirm.payment')->name('order.payment');
Route::view('/order/finish', 'confirm.success')->name('order.finish');
Route::view('/order/cancel', 'confirm.cancel')->name('order.cancel');
