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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->unique();
            $table->string('title_en')->unique();
            $table->integer('extra_guest_price')->nullable();
            $table->integer('number_of_tables')->nullable();
            $table->integer('number_of_guests')->nullable();
            $table->double('fake_price',2)->nullable();
            $table->double('real_price',2)->nullable();

            $table->bigInteger('views')->nullable()->default(0);
            $table->string('slug_ar')->unique();
            $table->string('slug_en')->unique();
            $table->longText('summary_ar')->nullable();
            $table->longText('summary_en')->nullable();

            $table->text('meal_description_ar')->nullable();
            $table->text('meal_description_en')->nullable();
            $table->text('lighting_description_ar')->nullable();
            $table->text('lighting_description_en')->nullable();
            $table->text('sound_description_ar')->nullable();
            $table->text('sound_description_en')->nullable();
            $table->text('plan_of_the_day_description_ar')->nullable();
            $table->text('plan_of_the_day_description_en')->nullable();
            $table->text('flowers_description_ar')->nullable();
            $table->text('flowers_description_en')->nullable();
            $table->text('decoration_description_ar')->nullable();
            $table->text('decoration_description_en')->nullable();

            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('keywords_ar')->nullable();
            $table->text('keywords_en')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',[1,0])->default(1)->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('hall_id')->nullable();
            $table->foreign('hall_id')->references('id')->on('halls')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('hall_categories')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('packages');
    }
};
