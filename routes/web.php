<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $fiber = new Fiber(function() {
        echo 'In the Fiber'.PHP_EOL;
        echo 'Still inside'.PHP_EOL;
    });
    $fiber->start();
});
