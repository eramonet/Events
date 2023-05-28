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
        Schema::create('features_sections', function (Blueprint $table) {
            $table->id();
            $table->text("icon");
            $table->text("title_en");
            $table->text("title_ar");
            $table->text("description_ar");
            $table->text("description_en");
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
        Schema::dropIfExists('features_sections');
    }
};
