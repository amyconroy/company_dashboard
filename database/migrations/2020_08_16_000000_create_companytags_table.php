<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// companyTags table - joining table between tags table and company table
class CreateCompanyTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyTags', function (Blueprint $table) {
            $table->integer('companyId')->references('id')->on('company');
            $table->integer('tagsId')->references('id')->on('tags');
            $table->primary(['companyId', 'tagsId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
    }
}