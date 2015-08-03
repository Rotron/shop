<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    public function up()
    {
        Schema::create('products', function(Blueprint $table)
        {
            $table->engine = 'MYISAM';
            $table->increments('id');
            $table->string('name');
            $table->integer('stock');
            $table->decimal('price', 7, 2);
            $table->string('link')->unique();
            $table->string('description', 1000);
            $table->text('content');
            $table->string('images', 100);
            $table->string('meta_title');
            $table->string('meta_description', 500);
            $table->string('meta_keywords', 500);
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT search(name, content)');
    }

    public function down()
    {
        Schema::table('products', function($table) {
            $table->dropIndex('search');
        });
        Schema::dropIfExists('products');
    }

}
