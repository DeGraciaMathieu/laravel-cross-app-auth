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

Route::get('logout', function () {

    Auth::logout();

    dd(Auth::check(), Auth::user());
});

Route::get('authenticate', function () {

    $user = User::first();

    Auth::login($user);
});

Route::get('check', function () {
    dd(Auth::check(), Auth::user());
});