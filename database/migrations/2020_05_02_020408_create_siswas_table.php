<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis_lokal');
            $table->bigInteger('nomor_induk');
            $table->bigInteger('nisn');
            $table->string('nama_siswa');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat_siswa');
            $table->bigInteger('no_telepon');
            $table->string('foto_siswa');
            $table->string('hobi');
            $table->integer('id_kelas');

            $table->bigInteger('no_kk');
            $table->bigInteger('nik_ayah');
            $table->string('nama_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->bigInteger('no_telepon_ayah');

            $table->bigInteger('nik_ibu');
            $table->string('nama_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->bigInteger('no_telepon_ibu');

            $table->bigInteger('nik_wali')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->bigInteger('no_telepon_wali')->nullable();

            $table->string('npsn_sekolah');
            $table->string('asal_sekolah');
            $table->string('alamat_sekolah');
            $table->string('no_skhun');

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
        Schema::dropIfExists('siswas');
    }
}
