<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('governments_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('meta_title');
            $table->string('meta_desc');
            $table->string('meta_keywords');
            $table->integer('government_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['government_id', 'locale']);
            $table->foreign('government_id')->references('id')->on('governments')->onDelete('cascade');
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
        Schema::dropIfExists('governments');
    }
}
