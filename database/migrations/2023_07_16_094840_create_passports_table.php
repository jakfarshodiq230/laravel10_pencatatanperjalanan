<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passport', function (Blueprint $table) {
            // $table->id();
            $table->string('no_passport')->primary();
            $table->string('pegawai_nip');
            $table->string('scan_passport')->nullable;
            $table->string('tgl_pembuatan');
            $table->string('tgl_berlaku');
            $table->timestamps();

            $table->foreign('pegawai_nip')->references('nip')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passport');
    }
}
