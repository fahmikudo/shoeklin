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
                                            <th>Sub Total</th>
                                            <th>Total Harga</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="get-data"></tbody>
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
<script type="text/javascript">
    function getData() {
        var route = '{{ route("pengiriman-get-dikirim") }}';

        $.ajax({
            url: route,
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            var dt = '';
            for (var i = 0; i < data.length; i++) {
                dt += '\
                    <tr>\
                        <td>'+(i + 1)+'</td>\
                        <td>'+data[i].no_transaksi+'</td>\
                        <td>'+data[i].tanggal_masuk+'</td>\
                        <td>'+data[i].tanggal_selesai+'</td>\
                        <td>'+data[i].nama_pelayanan+'</td>\
                        <td>'+data[i].tipe_sepatu+'</td>\
                        <td>'+data[i].sub_total+'</td>\
                        <td>'+data[i].harga_total+'</td>\
                    </tr>';
                data[i]
            }
            $('#get-data').html(dt);
            console.log(data);
        })
        .fail(function(e) {
            console.log("error => " + e.responseJSON.message);
        })
        .always(function() {
            console.log("complete");
        });
        
    }
    $(document).ready(function() {
        getData();
    });
</script>
@endsection
