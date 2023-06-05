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
        Schema::create('hall_bookings', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['pending','success','cancelled'])->default('pending');
            $table->date('date');
            $table->time('time_from');
            $table->time('time_to');
            $table->integer('packge_id');
            $table->integer('hall_id');
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->double('total');
            $table->integer('extra_guest')->nullable();
            $table->text('promo_code_title')->nullable();
            $table->text('promo_code_value')->nullable();
            $table->text('promo_code_type')->nullable();
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
        Schema::dropIfExists('hall_bookings');
    }
};
