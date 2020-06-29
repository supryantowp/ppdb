<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->bigInteger('nik');
            $table->string('jenis_kelamin');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('agama');
            $table->bigInteger('npwp');
            $table->string('nama_wajib_pajak');
            $table->string('kewarganegaraan');
            $table->string('status_pernikahan');
            $table->string('nama_suami_atau_istri')->nullable();

            // Kontak
            $table->bigInteger('telp_rumah');
            $table->bigInteger('telp_pribadi');
            $table->bigInteger('email');
            $table->string('nama_bank');
            $table->bigInteger('no_rekenig');
            $table->bigInteger('atas_nama');

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
        Schema::dropIfExists('gurus');
    }
}
