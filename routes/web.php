<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
        'toko' => App\Models\Toko::where('jenis', 'teknisi')->get(),
    ]);
});

Route::get('detail/{id}', function (string $id) {
    return view('pages.detail', [
        'toko' => App\Models\Toko::with('user')->find($id),
    ]);
});

Route::post('search', function (Request $request) {
    return view('pages.search', [
        'toko' => App\Models\Toko::where('jenis', 'teknisi')->where('nama', 'like', '%' . $request->input('keyword') . '%')->get(),
        'keyword' => $request->input('keyword')
    ]);
})->name('search');

Route::get('user', function () {
    return view('pages.user-dashboard');
})->name('dashboard');

Route::get('user/notifikasi', function () {
    return view('pages.user-notifikasi');
})->name('notifikasi');

Route::get('user/perbaikan', function () {
    return view('pages.user-perbaikan');
})->name('perbaikan');
