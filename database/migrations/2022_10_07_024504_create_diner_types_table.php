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
    Schema::create('diner_types', function (Blueprint $table) {
      $table->id();

      $table->string('dt_no', 20); //項目編號dt001,cd前綴
      $table->string('dt_typename', 50); //類型名稱
      $table->text('dt_remark')->nullable();

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
    Schema::dropIfExists('diner_types');
  }
};