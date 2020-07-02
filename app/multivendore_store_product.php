<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multivendore_store_product extends Model
{
    public function subcats()
    {
        return $this->hasOne(multivendorstore_sub_category::class,'id','product_category');
    }
}
