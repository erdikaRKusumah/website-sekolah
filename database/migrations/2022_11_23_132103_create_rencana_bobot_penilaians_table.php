<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaBobotPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_bobot_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id');
            $table->integer('bobot_sumatif');
            $table->integer('bobot_pts');
            $table->integer('bobot_pas');
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
        Schema::dropIfExists('rencana_bobot_penilaian');
    }
}
