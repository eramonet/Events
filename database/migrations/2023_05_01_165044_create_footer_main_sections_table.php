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
        Schema::create('footer_main_sections', function (Blueprint $table) {
            $table->id();
            $table->text("big_title_ar");
            $table->text("big_title_en");
            $table->text("small_title_ar");
            $table->text("small_title_en");
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
        Schema::dropIfExists('footer_main_sections');
    }
};
