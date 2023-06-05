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
        Schema::create('latest_wedding_halls', function (Blueprint $table) {
            $table->id();
            $table->text("small_title_en");
            $table->text("small_title_ar");
            $table->text("big_title_en");
            $table->text("big_title_ar");
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
        Schema::dropIfExists('latest_wedding_halls');
    }
};
