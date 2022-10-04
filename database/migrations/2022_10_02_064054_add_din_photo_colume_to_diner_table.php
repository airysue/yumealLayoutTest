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
    Schema::table('diners', function (Blueprint $table) {

      $table->string('din_photo')->after('din_url02')->nullable(); //沒給nullable() 會報錯
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('diners', function (Blueprint $table) {
      $table->dropColumn('din_photo');
    });
  }
};