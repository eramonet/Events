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
        Schema::create('clients_ads', function (Blueprint $table) {
            $table->id();
            $table->integer("client_id");
            $table->text("client_type");
            $table->integer("ad_id");
            $table->text("location");
            $table->integer("views")->default(0);
            $table->integer("clicks")->default(0);
            $table->date("from");
            $table->date("to");
            $table->enum("activation" , ["yes" , "no"]);
            $table->enum("status" , ["active" , "in_active"]);
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
        Schema::dropIfExists('clients_ads');
    }
};
