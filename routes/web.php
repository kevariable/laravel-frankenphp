<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return \App\Models\User::query()->get();
});