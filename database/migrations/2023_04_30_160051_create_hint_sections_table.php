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
        Schema::create('hint_sections', function (Blueprint $table) {
            $table->id();
            $table->text("small_text_en");
            $table->text("small_text_ar");
            $table->text("base_text_en");
            $table->text("base_text_ar");
            $table->text("short_description_en");
            $table->text("short_description_ar");
            $table->text("full_description_en");
            $table->text("full_description_ar");
            $table->text("video");
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
        Schema::dropIfExists('hint_sections');
    }
};
