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
            $table->enum('status',['success','cancelled'])->default('success');
            $table->date('date');
            $table->time('time_from');
            $table->time('time_to');
            $table->foreignId('packge_id')->constrained('packages')->restrictOnDelete();
            $table->foreignId('hall_id')->constrained('halls')->restrictOnDelete();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('vendor_id')->constrained('admins')->restrictOnDelete();
            $table->double('total');
            $table->integer('extra_guest')->nullable();
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
