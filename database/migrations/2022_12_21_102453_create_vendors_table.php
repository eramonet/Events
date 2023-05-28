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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('title_ar')->unique()->nullable();
            $table->string('title_en')->unique()->nullable();
            $table->string('slug_ar')->unique()->nullable();
            $table->string('slug_en')->unique()->nullable();
            $table->longText('summary_ar')->nullable();
            $table->longText('summary_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('keywords_ar')->nullable();
            $table->text('keywords_en')->nullable();
            $table->enum('can_add_products', [1, 0])->default(0);
            $table->enum('can_add_halls', [1, 0])->default(0);
            $table->enum('status', [1, 0])->default(1);

            $table->double('commission',8, 2);
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('image')->nullable();


            $table->integer('halls_count')->nullable();
            $table->integer('products_count')->nullable();
            $table->integer('vendor_admin')->nullable();
            $table->enum('type', ['product','hall','product_hall']);
            $table->enum('account', ['individual','company']);
            $table->integer('Tax_Number')->nullable();
            $table->integer('commercial_registration_number')->nullable();
            $table->date('Tax_Number_expiration_date')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->cascadeOnUpdate()->nullOnDelete();



            
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
        Schema::dropIfExists('vendors');
    }
};
