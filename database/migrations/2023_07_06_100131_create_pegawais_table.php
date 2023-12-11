<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama');
            $table->string('foto')->nullable;
            $table->string('nik');
            $table->string('scan_kk')->nullable;
            $table->string('scan_ktp')->nullable;
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('golongan_darah');
            $table->string('alamat');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->string('no_hp');
            $table->string('kewarganegaraan');
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
        Schema::dropIfExists('pegawai');
    }
}
