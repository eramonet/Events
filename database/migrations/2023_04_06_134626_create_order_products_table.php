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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->integer("vendor_id");
<<<<<<< HEAD
=======
            $table->integer("order_id")->nullable();
>>>>>>> 211d721c3ef82e51a3d2067398967a033afbaa37
            $table->text("order_number");
            $table->text("product_title");
            $table->text("price");
            $table->text("product_quantity");
            $table->text('commission');
            $table->text('taxes');
            $table->enum("status" , ['new','inprogress','delivered','cancelled'])->default("new");
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
        Schema::dropIfExists('order_products');
    }
};
