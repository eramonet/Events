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
        Schema::create('admin_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->unique()->nullable();
            $table->string('title_en')->unique()->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->enum('status', [1, 0])->default(1);
            $table->unsignedBigInteger('added_by')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('admin_categories');
    }
};
