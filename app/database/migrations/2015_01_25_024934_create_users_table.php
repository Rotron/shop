
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('users', function(Blueprint $table)
      {
          $table->increments('id');
          $table->string('firstname', 30)->nullable();
          $table->string('lastname', 30)->nullable();
          $table->string('address', 200)->nullable();
          $table->string('phone', 50)->nullable();
          $table->string('email', 200)->unique();
          $table->string('password', 64);
          $table->string('remember_token', 100)->nullable();
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
      Schema::drop('users');
  }

}