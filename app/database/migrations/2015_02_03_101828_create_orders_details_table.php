<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDetailsTable extends Migration {

    public function up()
    {
        Schema::create('orders_details', function(Blueprint $table)
        {
          $table->increments('id');
          $table->integer('order_id');
          $table->integer('product_id');
          $table->integer('quantity');
          $table->decimal('price', 7, 2);
          $table->timestamps();
        });
    }

    public function down()
    {
      Schema::dropIfExists('orders_details');
    }

}
