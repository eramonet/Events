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
        Schema::create('hall_taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hall_id')->nullable();
            $table->foreign('hall_id')->references('id')->on('halls')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->foreign('tax_id')->references('id')->on('taxes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
