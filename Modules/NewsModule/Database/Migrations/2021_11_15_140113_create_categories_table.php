<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
			// $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

		Schema::create('categories_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255);
			$table->integer('category_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}