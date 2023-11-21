<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.index', [
        'toko' => App\Models\Toko::with('user')->whereHas('user', fn (Builder $query) => $query->where('role', 'teknisi'))->get(),
    ]);
});

Route::get('detail/{id}', function (string $id) {
    return view('pages.detail', [
        'toko' => App\Models\Toko::with('user')->find($id),
    ]);
});

Route::get('user', function () {
    return view('pages.user');
});
