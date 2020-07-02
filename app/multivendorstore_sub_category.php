<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multivendorstore_sub_category extends Model
{
    public function storecat()
    {
        return $this->hasOne(store_category::class,'id','main_category_id');
    }
}
