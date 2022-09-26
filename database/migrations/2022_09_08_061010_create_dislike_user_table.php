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
        Schema::create('dislike_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dislike_id');
            $table->foreignId('user_id');
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
        Schema::table('dislike_user', function (Blueprint $table) {
            $table->dropForeign(['dislike_id']);
            $table->dropForeign(['user_id']);

        });
        Schema::dropIfExists('dislike_user');
    }
};
