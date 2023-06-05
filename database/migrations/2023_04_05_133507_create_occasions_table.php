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
        Schema::create('occasions', function (Blueprint $table) {
            $table->id();
            $table->string('primary_image')->nullable();
            $table->string('icon')->nullable();
            $table->string('title_ar')->unique();
            $table->string('title_en')->unique();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->cascadeOnUpdate()->nullOnDelete();
            // $table->string('rate')->default(0);
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->enum("for_what" , ["product" , "hall" , "both"]);
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
        Schema::dropIfExists('occasions');
    }
};
