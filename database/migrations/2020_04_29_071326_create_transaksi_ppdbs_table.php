<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPpdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_ppdb', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->integer('user_id');
            $table->string('nama');
            $table->string('jumlah_bayar');
            $table->bigInteger('yang_harus_dibayar');
            $table->integer('bank_id');
            $table->string('bukti_pembayaran');
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
        Schema::dropIfExists('transaksi_ppdbs');
    }
}
