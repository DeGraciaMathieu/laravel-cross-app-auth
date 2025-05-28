<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    session()->put('test-2', 'Hello app-2!');

    dd(session()->all());
});

Route::get('redis', function () {

    Cache::store('redis')->put('test-2', 'Hello app-2!');

    dd(
        Cache::store('redis')->get('test-1'),
        Cache::store('redis')->get('test-2')
    );
});