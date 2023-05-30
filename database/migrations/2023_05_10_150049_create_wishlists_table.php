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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id")->nullable();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger("hall_id")->nullable();
            $table->foreign('hall_id')->references('id')->on('halls')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text("user_id") ;
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
        Schema::dropIfExists('wishlists');
    }
};
