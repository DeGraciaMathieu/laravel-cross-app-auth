<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    session()->put('test-1', 'Hello app-1!');

    dd(session()->all());

});

Route::get('redis', function () {

    Cache::store('redis')->put('test-1', 'Hello app-1!');

    dd(
        Cache::store('redis')->get('test-1'),
        Cache::store('redis')->get('test-2')
    );
});
