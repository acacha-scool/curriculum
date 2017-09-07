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

            $table->timestamps();
        });

        Schema::create('classroom_submodule', function (Blueprint $table) {
            $table->integer('classroom_id')->unsigned();
            $table->integer('sudmodule_id')->unsigned();
            $table->timestamps();
            $table->unique(['classroom_id', 'sudmodule_id']);
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('sudmodule_id')->references('id')->on('submodules')->onDelete('cascade');
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
    }
}
