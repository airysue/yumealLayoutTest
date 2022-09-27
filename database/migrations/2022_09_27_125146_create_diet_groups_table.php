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
    Schema::create('diet_groups', function (Blueprint $table) {
      $table->id();

      $table->string('dg_no', 20); //項目編號dg001,dg前綴
      $table->string('dg_name', 50);
      $table->string('dg_type', 50);
      $table->text('dg_remark')->nullable();

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
    Schema::dropIfExists('diet_groups');
  }
};