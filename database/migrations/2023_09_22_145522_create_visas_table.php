<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa', function (Blueprint $table) {
            $table->id();
            $table->string('scan_visa');
            $table->string('scan_exitpermit');
            $table->string('passport_id');
            $table->string('id_kegiatan');
            $table->string('tim_kegiatan_visa');
            $table->foreign('passport_id')->references('no_passport')->on('passport')->onUpdate('cascade')->onDelete('cascade');;
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
        Schema::dropIfExists('visa');
    }
}
