<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('main_category_id')->nullable();
            $table->string('category_name')->nullable();
            $table->text('category_image')->nullable();
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
        Schema::dropIfExists('restaurant_sub_categories');
    }
}
