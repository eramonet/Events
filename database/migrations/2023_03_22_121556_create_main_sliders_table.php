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
        Schema::create('main_sliders', function (Blueprint $table) {
            $table->id();
            $table->text("main_image") ;
            $table->text("intro_title_en");
            $table->text("intro_title_ar");
            $table->text("big_text_en");
            $table->text("big_text_ar");
            $table->text("description_en");
            $table->text("description_ar");
            $table->text("link");
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
        Schema::dropIfExists('main_sliders');
    }
};
