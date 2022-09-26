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
    Schema::create('dislike_food', function (Blueprint $table) {
      $table->id();

      $table->string('df_no', 20); //項目編號df001,df前綴
      $table->string('df_name', 50);
      $table->string('df_type', 50);
      $table->text('df_remark')->nullable();

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
    Schema::dropIfExists('dislike_food');
  }
};