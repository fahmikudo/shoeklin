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
                        <li><a href="{{ url('/transaksi/penyerahan') }}">Penyerahan</a></li>
                        <li class="active"><a href="{{ url('/transaksi/pengembalian') }}">Pengambilan</a></li>
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
                            <form action="">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Transaksi</label>
                                        <input type="text" readonly="true" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" readonly="true" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <input type="date" readonly="true" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Jenis Pelayanan</label>
                                        <select readonly="true" class="form-control">
                                            <option value="CUCI">CUCI</option>
                                            <option value="COLORINg">COLORING</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipe Sepatu</label>
                                        <input readonly="true" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Sepatu</label>
                                        <input readonly="true" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Total</label>
                                        <input readonly="true" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <input readonly="true" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </form>
                        </div>
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
                                        <tr>
                                            <td>1</td>
                                            <td>TRX-1907110001</td>
                                            <td>11-07-2019</td>
                                            <td>12-07-2019</td>
                                            <td>CUCI</td>
                                            <td>Boots</td>
                                            <td>40000</td>
                                            <td>60000</td>
                                        </tr>
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
