<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->unsigned();
            $table->foreignId('kelas_id')->unsigned()->nullable();
            $table->enum('registration_type', ['1', '2']);
            $table->string('nis', 18)->unique()->nullable();
            $table->string('full_name', 100);
            $table->enum('gender', ['L', 'P']);
            $table->string('birth_place', 30);
            $table->date('birth_date');
            $table->string('phone_number', 13)->unique()->nullable();
            $table->enum('religion', ['1', '2', '3', '4', '5', '6', '7']);
            $table->string('address');

            $table->string('father_name', 100);
            $table->string('mother_name', 100);
            $table->string('father_job', 100);
            $table->string('mother_job', 100);

            $table->enum('status', ['1', '2', '3']);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('students');
    }
}
