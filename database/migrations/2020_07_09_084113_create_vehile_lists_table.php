<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehileListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehile_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_type')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->text('vehicle_image')->nullable();
            $table->text('vehicle_file')->nullable();
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
        Schema::dropIfExists('vehile_lists');
    }
}
