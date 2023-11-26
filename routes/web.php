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
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
        ],
        'populer' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->take(4)->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->orderBy('perbaikans_count', 'desc')->take(4)->get(),
        ],
    ]);
});

Route::get('search', function (Request $request) {
    $keyword = $request->input('keyword');

    return view('pages.list', [
        'heading' => 'Hasil pencarian "' . $keyword . '..."',
        'toko' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->where('nama', 'like', '%' . $keyword . '%')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->where('nama', 'like', '%' . $keyword . '%')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->where('nama', 'like', '%' . $keyword . '%')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->where('nama', 'like', '%' . $keyword . '%')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->where('nama', 'like', '%' . $keyword . '%')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->where('nama', 'like', '%' . $keyword . '%')->orderBy('perbaikans_avg_rating', 'desc')->get(),
        ],
    ]);
})->name('search');

Route::get('terbaik', function () {
    return view('pages.list', [
        'heading' => 'Service center terbaik! 🏆🤩',
        'toko' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->orderBy('perbaikans_avg_rating', 'desc')->get(),
        ],
    ]);
})->name('terbaik');

Route::get('populer', function () {
    return view('pages.list', [
        'heading' => 'Paling banyak dikunjungi!',
        'toko' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->orderBy('perbaikans_count', 'desc')->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->orderBy('perbaikans_count', 'desc')->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->orderBy('perbaikans_count', 'desc')->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->orderBy('perbaikans_count', 'desc')->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->orderBy('perbaikans_count', 'desc')->get(),
        ],
    ]);
})->name('populer');

Route::get('detail/{id}', function (string $id) {
    return view('pages.detail', [
        'toko' => App\Models\Toko::with(['user', 'perbaikans'])->find($id),
    ]);
});

Route::get('user', function () {
    return view('pages.user.index');
})->name('dashboard')->middleware(isLogin::class);

Route::get('user/perbaikan', function () {
    return view('pages.user.perbaikan');
})->name('perbaikan');
