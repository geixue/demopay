<?php


Route::get('/', function () {
    return view('welcome');
});

Route::post('/payment','PaymentController@store');

Route::post('/payment/check','PaymentController@check');

Route::post('/notify/wechat','PaymentController@notify');
