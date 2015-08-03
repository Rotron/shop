<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->string('link')->unique();
            $table->string('title');
            $table->string('description', 500);
            $table->integer('images');
            $table->string('meta_title');
            $table->string('meta_description', 500);
            $table->string('meta_keywords', 500);
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('portfolios');
    }

}
