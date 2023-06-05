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
        Schema::create('available_dates', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['active','inactive']);
            $table->foreignId('hall_id')->constrained('halls')->cascadeOnDelete();
            $table->date('available_date');

            $table->time('time_from');
            $table->time('time_to');

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
        Schema::dropIfExists('available_dates');
    }
};
