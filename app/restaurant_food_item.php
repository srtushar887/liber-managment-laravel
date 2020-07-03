<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant_food_item extends Model
{
    public function category()
    {
        return $this->hasOne(restaurant_sub_category::class,'id','food_item_category_id');
    }
}
