<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\VerifyLoginTokenController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Wizkids\CreateWizkid;
use App\Http\Livewire\Wizkids\EditWizkid;
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

Route::get('/wizkids/{wizkidId}/edit', EditWizkid::class)->name('wizkids.edit');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('verify-login/{token}', VerifyLoginTokenController::class)->name('verify-login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::middleware('auth')->group(function () {
    Route::match(['get', 'post'], 'logout', LogoutController::class)
        ->middleware('auth')
        ->name('logout');
});
