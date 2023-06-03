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
        Schema::create('with_draw_requests', function (Blueprint $table) {
            $table->id();
            $table->integer("vendor_id");
            $table->integer("with_draw_id");
            $table->double("budget_before");
            $table->double("budget");
            $table->enum("type" , ["from_admin" , "from_vendor"])->default("from_admin");
            $table->enum("status" , ["accepted" , "rejected" , "pending"])->default("pending");
            $table->text("notes")->nullable();
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
        Schema::dropIfExists('with_draw_requests');
    }
};
