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
                        <li class="active">
                            <a href="{{ url('/transaksi/penyerahan') }}">
                                Penyerahan
                            </a>
                        </li>
                        <li>
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
                        <form 
                            action="javascript:void(0)" 
                            id="form-transaction">
                            @csrf

                            <div class="panel-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Transaksi</label>
                                        <input 
                                            name="no_transaksi" 
                                            type="text" 
                                            
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>

                            <div class="panel-body">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input 
                                            name="tanggal_masuk" 
                                            type="date" 
                                            
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <input 
                                            name="tanggal_keluar" 
                                            type="date" 
                                            
                                            class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="email">Pilih Pegawai</label>
                                        <select 
                                            name="pilih_pegawai"
                                            class="form-control">
                                            @foreach($pilih_pegawai as $pg)
                                                <option value="{{ $pg->id }}">
                                                    {{ $pg->nama_pelanggan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="email">Pilih Pelanggan</label>
                                        <select 
                                            name="pilih_pelanggan"
                                            class="form-control">
                                            @foreach($pilih_pelanggan as $pp)
                                                <option value="{{ $pp->id }}">
                                                    {{ $pp->nama_pelanggan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Jenis Pelayanan</label>
                                        <select 
                                            name="jenis_pelayanan"
                                            class="form-control">
                                            @foreach($jenis_pelayanan as $jp)
                                                <option value="{{ $jp->id }}">
                                                    {{ $jp->nama_pelayanan.' : '.$jp->harga_pelayanan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipe Sepatu</label>
                                        <input 
                                            name="tipe_sepatu" 
                                            type="text" 
                                            
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Sepatu</label>
                                        <input 
                                            name="jumlah_sepatu" 
                                            type="number" 
                                            placeholder="0"
                                            min="0" 
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Total</label>
                                        <input 
                                            name="sub_total" 
                                            type="number" 
                                            placeholder="0"
                                            min="0" 
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <input 
                                            name="total_harga" 
                                            type="number" 
                                            placeholder="0"
                                            min="0" 
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
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
                                            <th>Status Pengiriman </th>
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
        var route = '{{ route("penyerahan-get") }}';

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
                        <td>'+data[i].status_pengiriman+'</td>\
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

        $('#form-transaction').on('submit', function(event) {
            event.preventDefault();

            var fd = new FormData();
            var route = '{{ route("penyerahan-push") }}';
            var target = event.target;

            fd.append('target', event.target);
            fd.append('no_transaksi', target[1].value);
            fd.append('tanggal_masuk', target[2].value);
            fd.append('tanggal_keluar', target[3].value);
            fd.append('pilih_pelanggan', target[4].value);
            fd.append('jenis_pelayanan', target[5].value);
            fd.append('tipe_sepatu', target[6].value);
            fd.append('jumlah_sepatu', target[7].value);
            fd.append('sub_total', target[8].value);
            fd.append('total_harga', target[9].value);

            $.each($('#form-transaction').serializeArray(), function(a, b) {
                fd.append(b.name, b.value);
            });

            $.ajax({
                url: route,
                processData: false,
                contentType: false,
                type: 'post',
                dataType: 'json',
                data: fd
            })
            .done(function(data) {
                if (data.status === 'success') {
                    // call function get
                    getData();
                } else {
                    alert(data.message);
                }
                // console.log(data);
            })
            .fail(function(e) {
                console.log("error => " + e.responseJSON.message);
            })
            .always(function() {
                console.log("complete");
            });

        });
    });
</script>
@endsection
