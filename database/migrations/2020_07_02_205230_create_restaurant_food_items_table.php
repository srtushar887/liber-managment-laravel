<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_food_items', function (Blueprint $table) {
            $table->id();
            $table->integer('food_item_user_id')->nullable();
            $table->integer('food_item_category_id')->nullable();
            $table->string('food_item_name')->nullable();
            $table->string('food_item_price')->nullable();
            $table->text('food_item_image')->nullable();
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
        Schema::dropIfExists('restaurant_food_items');
    }
}
