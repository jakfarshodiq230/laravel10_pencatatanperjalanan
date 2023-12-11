<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaingroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maingroup', function (Blueprint $table) {
            $table->string('passport_id');
            $table->foreignId('kegiatan_id')->constrained('kegiatan')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['passport_id', 'kegiatan_id']);
            $table->string('tim_kegiatan');
            $table->timestamps();
            $table->foreign('passport_id')->references('no_passport')->on('passport')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maingroup');
    }
}
