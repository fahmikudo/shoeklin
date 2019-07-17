<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pelayanan');
            $table->dateTime('tanggal_masuk');
            $table->dateTime('tanggal_selesai');
            $table->string('tipe_sepatu');
            $table->integer('jumlah_sepatu');
            $table->integer('harga_total');
            $table->integer('id_pelangan');
            $table->integer('id_pelayanan');
            $table->integer('id_pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
