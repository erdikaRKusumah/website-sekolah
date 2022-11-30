<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaPenilaianSumatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_penilaian_sumatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id');
            $table->foreignId('kd_mapel_id');
            $table->string('kode_penilaian', 4);
            $table->enum('teknik_penilaian', ['1', '2', '3']);
            $table->integer('bobot_teknik_penilaian');
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
        Schema::dropIfExists('rencana_penilaian_sumatif');
    }
}
