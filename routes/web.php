<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
// web.php

use App\Http\Controllers\Auth\login;

Route::get('/login', [login::class, 'showLoginForm'])->name('login');

/**
 * 'web' middleware applied to all routes
 *
 * @see \App\Providers\Route::mapWebRoutes
 */

 Livewire::setScriptRoute(function ($handle) {
    $base = request()->getBasePath();

    return Route::get($base . '/vendor/livewire/livewire/dist/livewire.min.js', $handle);
});



# this is the lien
Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('create');
});