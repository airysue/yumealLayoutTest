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
    Schema::create('food_types', function (Blueprint $table) {
      $table->id();

      $table->string('ft_no', 20); //項目編號ft001,fd前綴
      $table->string('ft_typename', 50); //類型名稱
      $table->text('ft_remark')->nullable();

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
    Schema::dropIfExists('food_types');
  }
};