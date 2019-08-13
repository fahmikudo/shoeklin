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
                        {{ Form::hidden('10kmpertama', $settings[1]->value) }}
                        {{ Form::hidden('10kmselanjutnya', $settings[2]->value) }}
                        {{ Form::open(array('id' => 'form-transaction')) }}
                            <div class="panel-body">  
                                <div class="form-group col-md-6">
                                    <label>Tanggal Masuk</label>
                                    <input 
                                        name="tanggal_masuk"
                                        readonly
                                        value="{{ date('m-d-Y') }}"
                                        type="text" 
                                        class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Keluar</label>
                                    <input 
                                        name="tanggal_keluar" 
                                        type="date" 
                                        required
                                        class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-md-12 removePadding" for="email">Pilih Pelanggan</label>
                                    <div class="col-md-8 removePadding">
                                        <div style="display: none" id="input_baru">
                                            <div class="form-group">
                                                <input type="text" placeholder="Masukan Nama" name="input_pelanggan[nama]" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                    <input type="text" placeholder="Masukan Alamat" name="input_pelanggan[alamat]" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                    <input type="text" placeholder="Masukan No Telepon" name="input_pelanggan[no_telepon]" class="form-control">
                                            </div>
                                        </div>
                                        <select
                                            required
                                            name="pilih_pelanggan"
                                            class="form-control">
                                            <option value="">Pilih Pelanggan</option>
                                            @foreach($pilih_pelanggan as $pp)
                                                <option value="{{ $pp->id }}">
                                                    {{ $pp->nama_pelanggan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button id="btnInputMember" class="btn btn-info">Input Pelanggan Baru</button>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tipe Pengambilan</label>
                                    <select
                                        required
                                        name="tipe_pengambilan"
                                        class="form-control">
                                        <option value="">Pilih Tipe Pengambilan</option>
                                        <option value="diantar">Diantar</option>
                                        <option value="diambil">Diambil sendiri</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Jarak Tujuan Pengiriman</label>
                                    <div class="input-group">
                                        <input
                                            readonly
                                            name="jarak_pengiriman" 
                                            type="text" 
                                            class="form-control">
                                        <div class="input-group-addon">km</div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Total Harga</label>
                                    <input 
                                        readonly
                                        value="0"
                                        name="total_harga" 
                                        type="text" 
                                        class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <button id="btn_tambah_sepatu" class="btn btn-default">Tambah Sepatu</button>
                                    <table class="table" id="table-cart">
                                        <thead>
                                            <tr>
                                                <th>Jenis Pelayanan</th>
                                                <th>Tipe Sepatu</th>
                                                <th>Jumlah Sepatu</th>
                                                <th>Satuan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select 
                                                        id="jenis_pelayanan"
                                                        required
                                                        name="jenis_pelayanan[]"
                                                        class="form-control">
                                                            <option value="">Pilih Jenis Pelayanan</option>
                                                        @foreach($jenis_pelayanan as $jp)
                                                            <option value="{{ $jp->id }}" data-harga="{{ $jp->harga_pelayanan }}">
                                                                {{ $jp->nama_pelayanan.' : '.$jp->harga_pelayanan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select 
                                                        id="tipe_sepatu"
                                                        required
                                                        name="tipe_sepatu[]"
                                                        class="form-control">
                                                        <option value="">Pilih Tipe Sepatu</option>
                                                        @foreach($tipe_sepatu as $ts)
                                                            <option value="{{ $ts->id }}">
                                                                {{ $ts->tipe_sepatu }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input 
                                                        required
                                                        name="jumlah_sepatu[]" 
                                                        type="number" 
                                                        id="jumlah_sepatu"
                                                        placeholder="0"
                                                        min="0" 
                                                        class="form-control" />
                                                </td>
                                                <td>
                                                Satu Pasang
                                                </td>
                                                <td>
                                                    <button id="hapus_sepatu" class="btn btn-danger">x</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        {{ Form::close() }}
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
                                            <th>Status Pengiriman </th>
                                        </tr>
                                    </thead>
                                    <tbody id="get-data"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function getData() {
        var route = '{{ route("penyerahan-get") }}';
        var routeNota = '{{ route("generate-nota") }}'
        $.ajax({
            url: route,
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            var dt = '';
            for (var i = 0; i < data.length; i++) {
                let hartot = data[i].harga_total > 0 ? data[i].harga_total : 'Gratis'
                dt += '\
                    <tr>\
                        <td>'+(i + 1)+'</td>\
                        <td><a target="_blank" href="' + routeNota + '?id=' + data[i].no_transaksi +'" style="color: blue">'+data[i].no_transaksi+'</a></td>\
                        <td>'+data[i].tanggal_masuk+'</td>\
                        <td>'+data[i].tanggal_selesai+'</td>\
                        <td>'+data[i].nama_pelayanan+'</td>\
                        <td>'+data[i].tipe_sepatu+'</td>\
                        <td>'+ hartot +'</td>\
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
        $('select[name="tipe_pengambilan"]').on("change", function(e) {
            let tipe_dipilih = $(this).val()
            let inputjp = $('input[name="jarak_pengiriman"]')
            if(tipe_dipilih == "diantar") {
                $(inputjp).removeAttr("readonly")
                $(inputjp).attr("required", true)
            } else {
                $(inputjp).removeAttr("required")
                $(inputjp).attr("readonly",true);
                $(inputjp).val('')
                hitungSemua()
            }
        })

        let input = $('#table-cart').find('tbody').html()
        $('#btn_tambah_sepatu').on('click', function(e) {
            e.preventDefault();
            $('#table-cart').find('tbody').append(input)
        })

        $(document).on('click', '#hapus_sepatu', function(e) {
            e.preventDefault();
            let parent = $(this).parent().parent();
            parent.remove();
            hitungSemua()
        })

        $(document).on('change', '#jenis_pelayanan', (e) => hitungSemua() )

        $(document).on('change', '#tipe_sepatu', (e) => hitungSemua() )

        $(document).on('input', '#jumlah_sepatu', (e) => hitungSemua() )

        $(document).on('input', 'input[name="jarak_pengiriman"]', (e) => hitungSemua() )

        pembulatan = (nilai, pembulat = 10) => {
            var hasil = (Math.ceil(parseInt(nilai))%parseInt(pembulat) == 0) ? Math.ceil(parseInt(nilai)) : Math.round((parseInt(nilai)+parseInt(pembulat)/2)/parseInt(pembulat))*parseInt(pembulat);
            return hasil;
        }

        hitungSemua = () => {
            let total_harga = $('input[name="total_harga"]')
            let semua = $('input[name="jumlah_sepatu[]"]').length;
            let total = 0;
            for (i = 0; i < semua; i++) {
                let jenpel = $('select[name="jenis_pelayanan[]"]')[i];
                jenpel = $(jenpel).val()
                jenpel = $('select[name="jenis_pelayanan[]').children()[jenpel]
                let harga = $(jenpel).attr('data-harga')

                if(typeof harga == "undefined") break;

                let jumlah = $('input[name="jumlah_sepatu[]"]')[i];
                jumlah = $(jumlah).val()
                jumlah = Number(jumlah) * Number(harga)
                total += jumlah;
            }
            
            let jarak_pengiriman = $('input[name="jarak_pengiriman"]').val()
            jarak_pengiriman = Number(jarak_pengiriman);
            let first = Number($('input[name="10kmpertama"]').val())
            let second = Number($('input[name="10kmselanjutnya"]').val()) / 10
            if(jarak_pengiriman > 0) {
                if(jarak_pengiriman <= 10) {
                    total += first
                } else {
                    total += first
                    jarak_pengiriman = jarak_pengiriman - 10;
                    total += pembulatan(jarak_pengiriman) * second;
                }
            }
            total_harga.val(total ? total : 0);
        }

        getData();

        $('#btnInputMember').on('click', function(e) {
            e.preventDefault();
            let pilpel = $('select[name="pilih_pelanggan"]')
            let inpel1 = $('input[name="input_pelanggan[nama]"]')
            let inpel2 = $('input[name="input_pelanggan[alamat]"]')
            let inpel3 = $('input[name="input_pelanggan[no_telepon]"]')
            let inbar = $('#input_baru')
            if (pilpel.css('display') == "none") {
                inpel1.val('');
                inpel2.val('');
                inpel3.val('');
                inpel1.removeAttr('required')
                inpel2.removeAttr('required')
                inpel3.removeAttr('required')
                euy = $(this).html('Input Pelanggan Baru');
                pilpel.attr('required', true)
            } else {
                pilpel.removeAttr('required')
                pilpel.val('');
                inpel1.attr('required',true)
                inpel2.attr('required',true)
                inpel3.attr('required',true)
                euy = $(this).html('Pilih Member');
            }
            pilpel.toggle();
            inbar.toggle();
        });

        $('#form-transaction').on('submit', function(event) {
            event.preventDefault();

            var fd = new FormData();
            var route = '{{ route("penyerahan-push") }}';

            $.each($('#form-transaction').serializeArray(), function(a, b) {
                let { name, value } = b
                if (name == "tanggal_keluar" && value !== "") {
                    let date = new Date(value);
                    let month = date.getMonth() + 1;
                    month = month < 10 ? '0' + month : month
                    value = month + '-' + date.getDate() + '-' + date.getFullYear()
                }
                fd.append(name, value);
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
                    $('input[name="tanggal_keluar"]').val("")
                    $('input[name="jarak_pengiriman"]').val("")
                    $('input[name="jarak_pengiriman"]').attr('readonly', true)
                    $('select[name="tipe_pengambilan"]').val("")
                    $('select[name="pilih_pelanggan"]').val("")
                    $('#table-cart').find('tbody').html('')
                    $('#table-cart').find('tbody').append(input)
                    $('input[name="input_pelanggan[nama]"]').val('');
                    $('input[name="input_pelanggan[alamat]"]').val('');
                    $('input[name="input_pelanggan[no_telepon]"]').val('');
                    hitungSemua()
                    getData();
                    swal("Informasi", "Data berhasil Disimpan!", "success");
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
