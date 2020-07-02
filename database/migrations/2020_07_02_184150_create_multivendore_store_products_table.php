<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultivendoreStoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multivendore_store_products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('product_category')->nullable();
            $table->string('product_old_price')->nullable();
            $table->string('product_new_price')->nullable();
            $table->text('product_sort_des')->nullable();
            $table->text('product_long_des')->nullable();
            $table->text('product_main_image')->nullable();
            $table->text('product_image_one')->nullable();
            $table->text('product_image_two')->nullable();
            $table->text('product_image_three')->nullable();
            $table->text('product_image_four')->nullable();
            $table->integer('product_status')->nullable();
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
        Schema::dropIfExists('multivendore_store_products');
    }
}
