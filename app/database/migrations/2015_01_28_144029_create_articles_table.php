<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->string('link')->unique();
            $table->string('title');
            $table->string('description', 500);
            $table->text('content');
            $table->string('meta_title');
            $table->string('meta_description', 500);
            $table->string('meta_keywords', 500);
            $table->tinyInteger('active')->default(0);
            $table->timestamp('published_at');
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
        Schema::drop('articles');
    }

}
