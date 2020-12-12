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
        //    $table->increments('id');
            $table->string('nombre_id', 30)->nullable()->primary()->unique();
            $table->string('apellidos', 50);
            $table->date('fecha_nac')->nullable();
            $table->string('ciudad', 50);
            $table->string('escuela_id', 50);
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('escuela_id')->references('nombre_id')->on('schools')->onDelete('cascade')->onUpdate('cascade');
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
