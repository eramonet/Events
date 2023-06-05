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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text("order_number");
            $table->text("customer_name");
            $table->text("customer_email");
            $table->text("customer_address");
            $table->text("customer_phone");
            $table->text("customer_promo_code_title")->nullable();
            $table->text("customer_promo_code_value")->nullable();
            $table->text("customer_promo_code_type")->nullable();
            $table->text("order_from");
            $table->text("cancelled_from")->nullable();
            $table->text("payment_type");
            $table->string("status")->default("pending");

            $table->unsignedBigInteger('country_id')->default(1);
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('city_id')->default(1);
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('region_id')->default(1);
            $table->foreign('region_id')->references('id')->on('regions')->cascadeOnUpdate()->cascadeOnDelete();


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
        Schema::dropIfExists('orders');
    }
};
