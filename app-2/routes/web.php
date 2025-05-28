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

Route::get('check', function () {
    dd(Auth::check(), Auth::user());
});

Route::get('/test-auth', function () {
    return view('test-auth');
});

Route::post('/test-auth/login', function () {
    Auth::loginUsingId(1); // Simule une connexion avec l'utilisateur ID 1
    return redirect('/test-auth');
});

Route::post('/test-auth/logout', function () {
    Auth::logout();
    return redirect('/test-auth');
});