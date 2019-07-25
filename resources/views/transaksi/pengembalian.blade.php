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
                        <li>
                            <a href="{{ url('/transaksi/pengiriman') }}">
                                Pengiriman
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ url('/transaksi/pengembalian') }}">
                                Pengambilan
                            </a>
                        </li>
                    </ul>
                    <br>
                    <div class="panel-body top-operation">
                        <div class="col-lg-5 search-head-outer">
                            <form class="form-inline" role="form" method="GET">
                                <div class="input-group search-head">
                                    <input type="text" class="form-control input-sm" name="keyword" placeholder="Masukkan Nomor Transaksi">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                            <th>Sub Total</th>
                                            <th>Total Harga</th>
                                            <th class="text-right"></th>
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
                                            <td>{{ $trx->nama_pelayanan }}</td>
                                            <td>{{ $trx->tipe_sepatu }}</td>
                                            <td>{{ $trx->sub_total }}</td>
                                            <td>{{ $trx->harga_total }}</td>
                                            <td>{{ $trx->status_pengiriman }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
