<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAkhirRapotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_akhir_rapot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id');
            $table->foreignId('class_group_id');
            $table->integer('kkm');
            $table->integer('nilai_sumatif');
            $table->enum('predikat', ['A', 'B', 'C', 'D']);
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
        Schema::dropIfExists('nilai_akhir_rapot');
    }
}
