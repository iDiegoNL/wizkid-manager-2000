<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\LoginPassphrase;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Wizkids\CreateWizkid;
use App\Http\Livewire\Wizkids\IndexWizkids;
use App\Http\Livewire\Wizkids\ShowWizkid;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexWizkids::class)->name('home');

Route::get('/wizkids/create', CreateWizkid::class)->name('wizkids.create');

Route::get('/wizkids/{wizkidId}', ShowWizkid::class)->name('wizkids.show');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
