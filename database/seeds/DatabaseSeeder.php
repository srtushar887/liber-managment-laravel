<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
//        factory(\App\User::class,100)->create();
//        factory(\App\taxi_category::class,20)->create();
//        factory(\App\Rider::class,100)->create();
//        factory(\App\multivendor_food_item::class,50)->create();
//        factory(\App\multivendor_restaurent::class,50)->create();
//        factory(\App\multivendor_store::class,50)->create();
//        factory(\App\multivendor_delivery_boy::class,50)->create();
//        factory(\App\truck_category::class,50)->create();
        factory(\App\all_category::class,50)->create();
//        factory(\App\Provider::class,50)->create();
//        factory(\App\Driver::class,100)->create();
    }
}
