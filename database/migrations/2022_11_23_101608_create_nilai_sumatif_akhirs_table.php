<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSumatifAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_sumatif_akhir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id');
            $table->foreignId('class_group_id');
            $table->integer('nilai_pts');
            $table->integer('nilai_pas');
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
        Schema::dropIfExists('nilai_sumatif_akhir');
    }
}
