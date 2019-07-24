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
            $table->string('no_transaksi');
            $table->dateTime('tanggal_masuk');
            $table->dateTime('tanggal_selesai');
            $table->string('tipe_sepatu');
            $table->integer('jumlah_sepatu');
            $table->integer('sub_total');
            $table->integer('harga_total');
            $table->enum('status_pengiriman', [
                'BELUM DIKIRIM', 
                'SUDAH DIKIRIM'
            ])->default('BELUM DIKIRIM');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_pelayanan');
            $table->unsignedBigInteger('id_pegawai');
            $table->timestamps();

            // foreign key
            $table->foreign('id_pelanggan')
                  ->references('id')
                  ->on('pelanggan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('id_pelayanan')
                  ->references('id')
                  ->on('jenispelayanan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('id_pegawai')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
