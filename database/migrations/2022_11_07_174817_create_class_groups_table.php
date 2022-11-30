<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('kelas_id');
            $table->enum('registration', ['1', '2', '3', '4', '5']);
            $table->timestamps();
        });
    }

    // Registration
        // 1 = Siswa Baru
        // 2 = Pindahan
        // 3 = Naik Kelas
        // 4 = Lanjutan Semester
        // 5 = Mengulang

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_groups');
    }
}
