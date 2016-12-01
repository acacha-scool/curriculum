<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateModulesTable.
 */
class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedTinyInteger('order')->nullable();
            $table->integer('study_id')->unsigned();
            $table->timestamps();
            $table->unique(array('name', 'order','study_id'));
        });

        Schema::create('course_module', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->timestamps();
            $table->unique(['course_id', 'module_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
        Schema::dropIfExists('course_module');
    }
}
