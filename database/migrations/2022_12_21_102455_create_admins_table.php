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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('gender',['male', 'female','other'])->nullable();
            $table->enum('status', [1, 0])->default(1);
            $table->string('image')->nullable();
            $table->string('password');
            $table->integer("firebase_token")->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('admin_categories')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('vendor_id')->nullable();

            //$table->unsignedBigInteger('vendor_id')->nullable();
            //$table->foreign('vendor_id')->references('id')->on('vendors')->cascadeOnUpdate()->nullOnDelete();
            $table->rememberToken();
            $table->unsignedBigInteger('added_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
