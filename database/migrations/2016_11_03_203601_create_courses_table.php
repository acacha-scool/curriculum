<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCoursesTable
 */
class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('state');
            $table->unsignedTinyInteger('order');
            $table->integer('cycle_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('cycle_id')->references('id')->on('cycles')
                ->onDelete('cascade');
        });

        Schema::create('course_study', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('study_id')->unsigned();
            $table->timestamps();
            $table->unique(['course_id', 'study_id']);

            $table->foreign('course_id')->references('id')->on('courses')
                ->onDelete('cascade');
            $table->foreign('study_id')->references('id')->on('studies')
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
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_study');
    }
}
