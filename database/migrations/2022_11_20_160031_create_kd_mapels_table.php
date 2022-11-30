<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKdMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kd_mapel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id');
            $table->string('class_level', 2);
            $table->enum('tipe', ['1', '2', '3']);
            $table->enum('semester', ['1', '2']);
            $table->string('kode_kd', 10);
            $table->string('kompetensi_dasar');
            $table->string('ringkasan_kompetensi', 150);
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
        Schema::dropIfExists('kd_mapel');
    }
}
