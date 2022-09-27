<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('diet_behaviors', function (Blueprint $table) {
      $table->id();

      $table->string('db_no', 20); //項目編號db001,db前綴
      $table->string('db_name', 50);
      $table->string('db_type', 50);
      $table->text('db_remark')->nullable();


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
    Schema::dropIfExists('diet_behaviors');
  }
};