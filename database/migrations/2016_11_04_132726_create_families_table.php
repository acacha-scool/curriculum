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

        Schema::create('family_study', function (Blueprint $table) {
            $table->integer('family_id')->unsigned();
            $table->integer('study_id')->unsigned();
            $table->timestamps();
            $table->unique(['family_id', 'study_id']);
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
        Schema::dropIfExists('family_study');
    }
}
