<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    session()->put('app-1', 'app-1');
    dd(session()->all());
});
