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
        Schema::create('cart_hall_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_hall_id')->nullable();
            $table->foreign('cart_hall_id')->references('id')->on('cart_halls')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('option_id')->references('id')->on('package_options')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('quantity');
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
        Schema::dropIfExists('cart_hall_options');
    }
};