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
    Schema::create('chain_diners', function (Blueprint $table) {
      $table->id();

      $table->string('cd_no', 20); //項目編號cd001,cd前綴
      $table->string('cd_name', 50); //餐飲店名稱
      $table->string('cd_type', 50); //餐飲店類型
      $table->text('cd_remark')->nullable();

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
    Schema::dropIfExists('chain_diners');
  }
};