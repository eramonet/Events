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
        Schema::create('inquery_replies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("inquery_id")->unsigned();
            $table->foreign('inquery_id')->references('id')->on('inqueries')->onDelete('cascade');
            $table->text('reply');
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
        Schema::dropIfExists('inquery_replies');
    }
};