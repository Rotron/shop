<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->string('title');
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
        Schema::drop('faqs');
    }

}
