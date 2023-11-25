<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\isLogin;
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
        'terbaik' => [
            'semua' => App\Models\Toko::where('jenis', 'teknisi')->take(4)->get(),
            'abepura' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'abepura')->take(4)->get(),
            'heram' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'heram')->take(4)->get(),
            'jayapura-utara' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'jayapura utara')->take(4)->get(),
            'jayapura-selatan' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'jayapura selatan')->take(4)->get(),
            'muara-tami' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'muara tami')->take(4)->get(),
        ],
        'populer' => [
            'semua' => App\Models\Toko::where('jenis', 'teknisi')->take(4)->get(),
            'abepura' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'abepura')->take(4)->get(),
            'heram' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'heram')->take(4)->get(),
            'jayapura-utara' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'jayapura utara')->take(4)->get(),
            'jayapura-selatan' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'jayapura selatan')->take(4)->get(),
            'muara-tami' => App\Models\Toko::where('jenis', 'teknisi')->where('kecamatan', 'muara tami')->take(4)->get(),
        ],
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
})->name('dashboard')->middleware(isLogin::class);

Route::get('user/notifikasi', function () {
    return view('pages.user-notifikasi');
})->name('notifikasi');

Route::get('user/perbaikan', function () {
    return view('pages.user-perbaikan');
})->name('perbaikan');
