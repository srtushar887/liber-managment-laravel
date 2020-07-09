<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taxi_sub_category extends Model
{
    public function maincat()
    {
        return $this->hasOne(taxi_category::class,'id','main_category_id');
    }
}
