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
    Schema::create('meals', function (Blueprint $table) {
      $table->id();

      $table->string('mea_no', 30); //項目編號mea_00001,din前綴 $table->string('mea_', 255);
      $table->string('mea_name', 50);
      $table->string('mea_intr', 255)->nullable(); //餐點特色介紹
      $table->string('mea_type', 50)->nullable(); //多對多
      $table->decimal('mea_price', 5)->nullable();
      $table->string('mea_DislikeFood', 255)->nullable();
      $table->string('mea_DietGroup', 255)->nullable();
      $table->foreignId('user_id')->constrained();  //設定外來鍵寫法

      $table->string('mea_photo')->nullable();
      $table->string('mea_photo_path')->nullable(); //沒給nullable() 會報錯

      $table->string('mea_remark01')->nullable();
      $table->string('mea_remark02')->nullable();


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
    Schema::dropIfExists('meals');
  }
};