<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDepartmentsTable.
 */
class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('shortname');
            $table->string('name');
            $table->integer('parent')->unsigned()->nullable();
            $table->integer('location_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('department_family', function (Blueprint $table) {
            $table->integer('department_id')->unsigned();
            $table->integer('family_id')->unsigned();

            $table->unique(['department_id', 'family_id']);
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('department_head', function (Blueprint $table) {
            $table->integer('department_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('main')->default(false);
            $table->timestamps();
            $table->unique(['department_id', 'user_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
        Schema::dropIfExists('department_family');
        Schema::dropIfExists('department_head');
    }
}
