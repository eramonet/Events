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
        Schema::create('product_occasions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("occasion_id")->unsigned();
            $table->bigInteger("product_id")->unsigned();
            $table->timestamps();
            $table->foreign('occasion_id')->references('id')->on('occasions')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_occasions');
    }
};
