<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>
</head>
<body>
  <h1>Laporan {{ ucfirst($waktu) }}</h1>
  <table width="100%">
    <tr>
        <td valign="top"><img src="{{ (is_null($toko->gambar))? filament()->getUserAvatarUrl($toko) : $toko->gambar }}"/></td>
        <td align="right">
            <h3>{{$toko->nama}}</h3>
            @foreach ($toko->user as $user)      
            <pre>
              {{ $user->email }}
              {{ $toko->alamat }}
              Kel. {{ $toko->kelurahan }}
              Kec. {{ $toko->kecamatan }}
            </pre>
            @endforeach
        </td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Tanggal</th>
        <th>Email</th>
        <th>Detail</th>
        <th>Biaya</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <th align="left">{{ $item->created_at }}</th>
        <td>{{ $item->user->email ?? $item->email }}</td>
        <td align="right" width="30%">{{ $item->detail_kerusakan ?? $item->orderBarangs->pluck('barang','qty') }}</td>
        <td align="right">Rp {{ number_format($item->biaya ?? $item->order_barangs_sum_subtotal) }}</td>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="2"></td>
            <td align="right">Total</td>
            <td align="right" class="gray">Rp {{ number_format($total) }}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>
