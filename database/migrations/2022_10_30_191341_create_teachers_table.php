<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nip', 18)->unique()->nullable();
            $table->string('full_name', 100);
            $table->string('title', 10);
            $table->enum('gender', ['L', 'P']);
            $table->string('birth_place', 30);
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('address');
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
        Schema::dropIfExists('teachers');
    }
}
