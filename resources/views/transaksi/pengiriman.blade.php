@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Transaksi</h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> Transaksi
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="{{ url('/transaksi/penyerahan') }}">
                                Penyerahan
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ url('/transaksi/pengiriman') }}">
                                Pengiriman
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/transaksi/pengembalian') }}">
                                Pengambilan
                            </a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="panel-body">
                            <div class="table-responsive table-data">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Transaksi</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Jenis Pelayanan</th>
                                            <th>Tipe Sepatu</th>
                                            <th>Total Harga</th>
                                            <th>Nama Pengirim</th>
                                            <th>Status Pengiriman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 0; @endphp
                                        @foreach ($transaksi as $trx)
                                        @php $index += 1 @endphp
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $trx->no_transaksi }}</td>
                                            <td>{{ $trx->tanggal_masuk }}</td>
                                            <td>{{ $trx->tanggal_selesai }}</td>
                                            <td>{{ $trx->pelayanan()->first()->nama_pelayanan }}</td>
                                            <td>{{ $trx->tipesepatu()->first()->tipe_sepatu }}</td>
                                            <td>{{ $trx->harga_total }}</td>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>{{ $trx->status_pengiriman }}</td>
                                            <td>
                                                <a href="{{ route('pengembalian-index', ['id_delete' => $trx->id ]) }}" class="btn btn-success">Sudah dikirim</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
