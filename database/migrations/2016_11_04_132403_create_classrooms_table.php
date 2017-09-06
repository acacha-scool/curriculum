<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('shift_id')->unsigned()->nullable();
            $table->string('location_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('classroom_submodule', function (Blueprint $table) {
            $table->integer('classroom_id')->unsigned();
            $table->integer('sudmodule_id')->unsigned();
            $table->timestamps();
            $table->unique(['classroom_id', 'sudmodule_id']);
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('sudmodule_id')->references('id')->on('submodules')->onDelete('cascade');
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
        Schema::dropIfExists('classroom_submodule');
    }
}
