<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\isLogin;
use App\Models\Order;
use App\Models\Perbaikan;
use App\Models\PerbaikanDetail;
use App\Models\Toko;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    // dd(Perbaikan::find());
    return view('pages.index', [
        'terbaik' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->verified()->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->verified()->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->verified()->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->verified()->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->verified()->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->orderBy('perbaikans_avg_rating', 'desc')->take(4)->get(),
        ],
        'populer' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->verified()->take(4)->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->verified()->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->verified()->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->verified()->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->verified()->orderBy('perbaikans_count', 'desc')->take(4)->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->verified()->orderBy('perbaikans_count', 'desc')->take(4)->get(),
        ],
    ]);
});

Route::get('search', function (Request $request) {
    $keyword = $request->input('keyword');

    return view('pages.list', [
        'heading' => 'Hasil pencarian "' . $keyword . '..."',
        'toko' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->where('nama', 'like', '%' . $keyword . '%')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->where('nama', 'like', '%' . $keyword . '%')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->where('nama', 'like', '%' . $keyword . '%')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->where('nama', 'like', '%' . $keyword . '%')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->where('nama', 'like', '%' . $keyword . '%')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->where('nama', 'like', '%' . $keyword . '%')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
        ],
    ]);
})->name('search');

Route::get('terbaik', function () {
    return view('pages.list', [
        'heading' => 'Service center terbaik! 🏆🤩',
        'toko' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->verified()->orderBy('perbaikans_avg_rating', 'desc')->get(),
        ],
    ]);
})->name('terbaik');

Route::get('populer', function () {
    return view('pages.list', [
        'heading' => 'Paling banyak dikunjungi!',
        'toko' => [
            'semua' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->where('jenis', 'teknisi')->get(),
            'abepura' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('abepura')->verified()->orderBy('perbaikans_count', 'desc')->get(),
            'heram' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('heram')->verified()->orderBy('perbaikans_count', 'desc')->get(),
            'jayapura-utara' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura utara')->verified()->orderBy('perbaikans_count', 'desc')->get(),
            'jayapura-selatan' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('jayapura selatan')->verified()->orderBy('perbaikans_count', 'desc')->get(),
            'muara-tami' => App\Models\Toko::withAvg('perbaikans', 'rating')->withCount('perbaikans')->kecamatan('muara tami')->verified()->orderBy('perbaikans_count', 'desc')->get(),
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

Route::get('print/{jenis}/{id}/{waktu}', function ($jenis, $id, $waktu) {

    if ($jenis == 'order') {
        $data = Order::withSum('orderBarangs', 'subtotal')->with('user')->where('toko_id', $id);
        $total = $data->get()->sum('order_barangs_sum_subtotal');
    } else if ($jenis == 'perbaikan') {
        $data = Perbaikan::with('user')->where('toko_id', $id);
        $total = PerbaikanDetail::whereHas('perbaikan', fn (Builder $query) => $query->where('toko_id', $id)->where('setuju',true))->sum('total');
    } else
        abort(404);

    $toko = Toko::with('user')->find($id);

    if ($waktu == 'harian')
        $data->whereDate('created_at', date('Y-m-d'));
    if ($waktu == 'bulanan')
        $data->whereMonth('created_at', date('m'));
    if ($waktu == 'tahunan')
        $data->whereYear('created_at', date('Y'));

    $pdf = Pdf::loadView('print', [
        'data' => $data->get(),
        'total' => $total,
        'toko' => $toko,
        'waktu' => $waktu,
    ]);

    return $pdf->stream();
})->name('print');
