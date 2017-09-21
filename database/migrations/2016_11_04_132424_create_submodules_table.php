<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSubmodulesTable.
 *
 */
class CreateSubmodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submodules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('shortname');
            $table->string('name');
            $table->string('description');
            $table->string('state')->default('pending');
            $table->unsignedTinyInteger('order')->nullable();
            $table->integer('module_id')->unsigned()->nullable();
            $table->integer('type')->unsigned()->default(1);
            $table->date('total_hours')->nullable();
            $table->date('week_hours')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('submodule_types')->onDelete('cascade');


            $table->timestamps();
        });

        Schema::create('classroom_submodule', function (Blueprint $table) {
            $table->integer('classroom_id')->unsigned();
            $table->integer('submodule_id')->unsigned();
            $table->timestamps();
            $table->unique(['classroom_id', 'submodule_id']);
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('submodule_id')->references('id')->on('submodules')->onDelete('cascade');
        });

        Schema::create('speciality_submodule', function (Blueprint $table) {
            $table->integer('speciality_id')->unsigned();
            $table->integer('submodule_id')->unsigned();
            $table->timestamps();
            $table->unique(['speciality_id', 'submodule_id']);
            $table->foreign('submodule_id')->references('id')->on('submodules')
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
        Schema::dropIfExists('submodules');
        Schema::dropIfExists('classroom_submodule');
        Schema::dropIfExists('speciality_submodule');
    }
}
