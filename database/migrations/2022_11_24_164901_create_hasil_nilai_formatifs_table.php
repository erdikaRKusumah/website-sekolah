<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilNilaiFormatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_nilai_formatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id');
            $table->foreignId('class_group_id');
            $table->integer('nilai_formatif_tertinggi');
            $table->integer('nilai_formatif_terendah');
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
        Schema::dropIfExists('hasil_nilai_formatif');
    }
}
