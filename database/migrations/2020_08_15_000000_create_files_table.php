<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // up method makes changes to the db - migrate db, this will run
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->references('id')->on('user');
            $table->string('fileName'); // user inputted file name
            $table->string('filePath'); // where the file is stored
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
        Schema::drop('files');
    }
}