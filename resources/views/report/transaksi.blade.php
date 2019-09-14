<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Report - Transaksi</title>
  <style>
        * {
            padding: 0;
            margin: 0;
            border: 0;
            outline: none;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        h1, h2, h3 {
            color: rgba(0,0,0,0.84);
            line-height: 1.5;
        }
        h4 {
            line-height: 1.5;
            color: rgba(0,0,0,0.84);
            font-size: 14pt;
            margin: 15px 0;
        }

        p {
            line-height: 1.5;
            color: rgba(0,0,0,0.64);
            font-size: 10pt;
        }

        .place-image {
            position: relative;
            width: 100%;
            padding-top: 15px;
            /* display: flex; */
        }
        .place-image .image {
            position: relative;
            display: inline-block;
            width: 250px;
            border-radius: 10px;
            margin: 15px;
        }

        table {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 30px;
            border: 1px rgba(0,0,0,0.1) solid;
            font-size: 10pt;
        }
        table thead {
            position: relative;
            width: 100%;
            margin-top: 30px;
            background-color: #f3f3f3;
            color: rgba(0,0,0,0.64);
            border: 1px rgba(0,0,0,0.1) solid;
            font-size: 10pt;
        }
        table thead tr {
            position: relative;
            margin-top: 30px;
            border: 1px rgba(0,0,0,0.1) solid;
        }
        table thead tr th {
            position: relative;
            padding: 15px;
            margin-top: 30px;
            font-size: 10pt;
            font-weight: 600;
            text-transform: collapse;
            text-align: left;
            border: 1px rgba(0,0,0,0.1) solid;
        }
        table tbody {
            position: relative;
            margin-top: 30px;
            font-size: 10pt;
        }
        table tbody tr:hover {
            background-color: #f5f5f5;
        }

        table tbody tr td {
            position: relative;
            padding: 15px;
            font-size: 10pt;
            font-weight: 500;
            color: rgba(0,0,0,0.84);
            border: 1px rgba(0,0,0,0.1) solid;
        }


        table {
            font-family: Verdana;
            font-size: 14px;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            padding: 10px;
            text-align: left;
            margin: 0;
        }

        tbody tr:nth-child(2n){
            background-color: #eee;
        }

        th {
            position: sticky;
            top: 0;
            background-color: #333;
            color: white;
        }

        ul {
            position: relative;
            line-height: 1.5;
        }
        ul li {
            position: relative;
            width: 90%;
            margin: auto;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .card {
            position: relative;
            width: 80%;
            margin: auto;
        }

        .card-header {
            position: relative;
            width: 50%;
            margin: 15px -2px;
            display: inline-block;
            vertical-align: top;
        }
        .logo {
            position: relative;
            top: 15px;
        }

        .card-body {
            margin: 15px 0;
        }

        .next-page {
            page-break-after: always;
        }

    </style>
</head>
    <body class="container">
        <div class="card-body next-page">
            <div style="text-align: right; margin-right: 30px;">
                <div>
                    <?php $image_path = '/img/logo-small.png'; ?>
                    <img
                        src="{{ public_path() . $image_path }}"
                        style="width=180px; height=180px; margin-left: 10px;" />
                </div>
                <h2>Shoeklin Care & Treatment</h2>
                <p>Jalan Jatisampay No. 142 Majalengka Wetan Kab. Majalengka - Jawa Barat</p>
                <br>
                <h3>Laporan Transaksi</h3>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Transaksi</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Jenis Pelayanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tipe Sepatu</th>
                        <th>Total Harga</th>
                        <th>Status Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 0; $total_trx = 0; @endphp
                    @foreach ($transaksi as $trx)
                    @php $index += 1; $total_trx += $trx->harga_total; @endphp
                    <tr>
                        <td>{{ $index }}</td>
                        <td>{{ $trx->no_transaksi }}</td>
                        <td>{{ $trx->tanggal_masuk }}</td>
                        <td>{{ $trx->tanggal_selesai }}</td>
                        <td>{{ $trx->nama_pelayanan }}</td>
                        <td>{{ $trx->nama_pelanggan }}</td>
                        <td>{{ $trx->tipe_sepatu }}</td>
                        <td>{{ Rupiah::getRupiah($trx->harga_total) }}</td>
                        <td>{{ $trx->status_pengiriman }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="8" align="right">Total Transaksi</td>
                        <td>{{ count($transaksi) . ' Transaksi' }}</td>
                    </tr>
                    <tr>
                        <td colspan="8" align="right">Total Pendapatan</td>
                        <td>{{ Rupiah::getRupiah($total_trx) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
