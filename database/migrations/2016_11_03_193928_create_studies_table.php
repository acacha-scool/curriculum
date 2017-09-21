<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudiesTable
 */
class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->integer('law_id')->unsigned();
            $table->string('state')->nullable();
            $table->integer('replaces_study_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('law_id')->references('id')->on('laws')
                ->onDelete('cascade');
            $table->foreign('replaces_study_id')->references('id')->on('studies')
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
        Schema::dropIfExists('studies');
    }
}
