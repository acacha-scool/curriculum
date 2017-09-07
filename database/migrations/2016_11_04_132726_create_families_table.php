<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFamiliesTable.
 */
class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('shortname')->unique();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('family_speciality', function (Blueprint $table) {
            $table->integer('family_id')->unsigned();
            $table->integer('speciality_id')->unsigned();

            $table->unique(['family_id', 'speciality_id']);

            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');

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
        Schema::dropIfExists('families');
        Schema::dropIfExists('family_speciality');
    }
}
