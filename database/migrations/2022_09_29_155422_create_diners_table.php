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
    Schema::create('diners', function (Blueprint $table) {
      $table->id();

      $table->string('din_no', 30); //項目編號din_00001,din前綴 $table->string('din_', 255);
      $table->string('din_name', 50);
      $table->string('din_intr', 255)->nullable(); //餐館特色介紹
      $table->string('din_type', 50)->nullable(); //多對多
      $table->dateTime('din_openTime')->nullable();
      $table->dateTime('din_closeTime')->nullable();
      $table->string('din_addr', 100)->nullable();
      $table->string('din_holiday', 100)->nullable(); //公休時間
      $table->string('din_email', 100)->nullable();
      $table->boolean('din_takeoutOnly')->nullable(); //僅提供外帶
      //$table->enum('din_takeoutOnly', ['yes', 'no'])->nullable();
      $table->boolean('din_extraServiceFee')->nullable(); //服務費額外計??
      //$table->enum('din_extraServiceFee', ['yes', 'no'])->nullable();
      $table->string('din_serviceFee', 255)->nullable();
      $table->foreignId('user_id'); //因只對應一人，所以取資料表單數形+欄位名稱
      $table->text('din_remark01')->nullable();
      $table->text('din_remark02')->nullable();
      $table->text('din_remark03')->nullable();

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
    Schema::dropIfExists('diners');
  }
};