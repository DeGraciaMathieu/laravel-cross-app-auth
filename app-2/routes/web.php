<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    session()->put('app-2', 'app-2');
    dd(session()->all());
});
