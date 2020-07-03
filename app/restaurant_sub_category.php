<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant_sub_category extends Model
{
    public function maincat()
    {
        return $this->hasOne(restaurant_category::class,'id','main_category_id');
    }
}
