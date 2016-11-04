<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('speciality_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('speciality_id')->unsigned();
            $table->timestamps();
            $table->unique(['user_id', 'speciality_id']);
        });

        Schema::create('speciality_studysubmodule', function (Blueprint $table) {
            $table->integer('speciality_id')->unsigned();
            $table->integer('studysubmodule_id')->unsigned();
            $table->timestamps();
            $table->unique(['speciality_id', 'studysubmodule_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialities');
        Schema::dropIfExists('speciality_user');
        Schema::dropIfExists('speciality_studysubmodule');
    }
}
