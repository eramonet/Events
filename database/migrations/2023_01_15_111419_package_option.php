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

            Schema::create('package_option', function (Blueprint $table) {
                $table->id();
                $table->double('price',2)->nullable();
                $table->unsignedBigInteger('package_id')->nullable();
                $table->foreign('package_id')->references('id')->on('packages')->cascadeOnUpdate()->nullOnDelete();
                $table->unsignedBigInteger('option_id')->nullable();
                $table->foreign('option_id')->references('id')->on('package_options')->cascadeOnUpdate()->nullOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_option');

    }
};
