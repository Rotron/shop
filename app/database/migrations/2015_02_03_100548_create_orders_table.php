<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

  public function up()
  {
    Schema::create("orders", function(Blueprint $table)
    {
      $table->increments("id");
      $table->integer("users_id");
      $table->tinyInteger('status_id');
      $table->string('comment', 1000);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('orders');
  }

}
