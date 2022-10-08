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
    Schema::table('diner_types', function (Blueprint $table) {
      $table->string('dt_sort')->after('dt_typename')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('diner_types', function (Blueprint $table) {
      $table->dropColumn('dt_sort');
    });
  }
};