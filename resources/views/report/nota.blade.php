<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
@media print {
  @page { margin: 0; size: 210mm 210mm; }
  body { margin: 0.6cm; }

}
</style>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
                <img width="100" src="{{ asset('img/logo.jpeg') }}" />
                <h2>Shoeklin</h2>
                <h3 class="pull-right">Invoice</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
                    <address>
                    <strong>Kasir:</strong><br>
                        {{ Auth::user()->name }}
                    </address>
    				<address>
    				<strong>Customer:</strong><br>
    					{{ $transaksi->pelanggan()->first()->nama_pelanggan }}<br>
    					{{ $transaksi->pelanggan()->first()->alamat_pelanggan }}<br>
    					{{ $transaksi->pelanggan()->first()->no_telepon }}<br>
                    </address>
                    <address>* Nota harap dibawa saat pengambilan</address>
    			</div>
    			<div class="col-xs-6">
    				<table class="pull-right">
                        <tr>
                            <td class="text-right"><strong>No. Order</strong></td>
                            <td style="width: 20px"></td>
                            <td>{{ $transaksi->no_transaksi }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Tgl. Transaksi</strong></td>
                            <td style="width: 20px"></td>
                            <td>{{ Carbon::create($transaksi->tanggal_masuk)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Tgl. Ambil</strong></td>
                            <td style="width: 20px"></td>
                            <td>{{ Carbon::create($transaksi->tanggal_selesai)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Tipe Pengambilan</strong></td>
                            <td style="width: 20px"></td>
                            <td>{{ ucfirst($transaksi->tipe_pengambilan) }}</td>
                        </tr>
                        <tr>
                                <td class="text-right"><strong>Status</strong></td>
                                <td style="width: 20px"></td>
                                <td>{{ $transaksi->status_pengiriman == "SUDAH DIKIRIM" ? "LUNAS" : $transaksi->status_pengiriman }}</td>
                            </tr>
                    </table>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Ringkasan pesanan</strong></h3>
    			</div>
    			<div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td><strong>Jenis Pelayanan</strong></td>
                                <td class="text-center"><strong>Tipe Sepatu</strong></td>
                                <td class="text-center"><strong>Jumlah</strong></td>
                                <td class="text-right"><strong>Total Harga</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @foreach ($arr as $data)
                            <tr>
                                <td>{{ $data->pelayanan()->first()->nama_pelayanan }}</td>
                                <td class="text-center">{{ $data->tipesepatu()->first()->tipe_sepatu }}</td>
                                <td class="text-center">{{ $data->jumlah_sepatu }}</td>
                                <td class="text-right harga" >{{ $data->jumlah_sepatu * $data->pelayanan()->first()->harga_pelayanan }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right harga">{{ $data->harga_total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div style="margin-left: 30; margin-top: 30">
                        Hormat Kami,
                        <br><br><br><br><br>
                        {{ Auth::user()->name }}
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="pull-right" style="margin-right: 30; margin-top: 30;">
                        <br><br><br><br><br>
                        {{ $transaksi->pelanggan()->first()->nama_pelanggan }}<br>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let harga = $('.harga').length;
        for(i = 0; i < harga; i++) {
            let data = $('.harga')[i]
            let val = $(data).html()
            $(data).html(formatRupiah(val))
        }
        window.print()
        window.onafterprint = function(){
            window.close()
        }

    })
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
