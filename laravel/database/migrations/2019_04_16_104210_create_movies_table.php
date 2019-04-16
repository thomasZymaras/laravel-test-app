<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('uid', 255)->unique()->index('uid_index');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->dateTimeTz('releaseDate');
            $table->string('posterURL', 255);
            $table->string('backdropUrl', 255);
            $table->longText('plot');
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
        Schema::dropIfExists('movies');
    }
}
