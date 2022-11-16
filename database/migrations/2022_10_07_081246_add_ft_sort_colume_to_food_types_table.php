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
    Schema::table('food_types', function (Blueprint $table) {
      $table->string('ft_sort')->after('ft_typename')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('food_types', function (Blueprint $table) {
      $table->dropColumn('ft_sort');
    });
  }
};