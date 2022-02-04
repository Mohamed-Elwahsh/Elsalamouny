<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration {

	public function up()
	{
		Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
			$table->string('photo')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->timestamps();
        });

		Schema::create('news_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255);
			$table->string('short_desc', 255);
			$table->text('desc');
			$table->integer('news_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['news_id', 'locale']);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('news');
	}
}