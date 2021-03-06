<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSpecialitiesTable.
 */
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
            $table->integer('code')->unique();
            $table->string('shortname');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('family_id')->unsigned()->nullable();

            $table->foreign('family_id')->references('id')->on('families')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('speciality_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('speciality_id')->unsigned();
            $table->timestamps();
            $table->unique(['user_id', 'speciality_id']);

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('speciality_id')->references('id')->on('specialities')
                ->onDelete('cascade');
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
    }
}
