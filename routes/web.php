<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome'); // Render the Blade template for Svelte
})->where('any', '.*'); // Match all routes