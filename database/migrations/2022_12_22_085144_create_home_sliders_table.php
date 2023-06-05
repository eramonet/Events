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
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->id();
            $table->text('title_ar')->nullable();
            $table->text('title_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('clicks')->default(0);
            $table->string('image')->nullable();
            $table->enum('status',[1,0])->default(1)->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('home_sliders');
    }
};
