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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->bigInteger("order_id")->unsigned()->nullable();
            $table->bigInteger("code_id")->unsigned()->nullable();
            $table->string("title_ar");
            $table->bigInteger("vendor_id")->nullable();
            $table->string("title_en");
            $table->text("desc_ar");
            $table->text("desc_en");
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger("message_id")->unsigned()->nullable();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('code_id')->references('id')->on('promo_codes')->onDelete('cascade');
            // $table->foreign('vendor_id')->references('id')->on('admins')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};