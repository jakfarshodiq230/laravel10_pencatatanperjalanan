<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perjalanan');
            $table->string('negara_id');
            $table->string('kota_tujuan');
            $table->string('tgl_keberangkatan');
            $table->string('tgl_pulang');
            $table->timestamps();

            $table->foreign('negara_id')->references('id_negara')->on('negara')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
