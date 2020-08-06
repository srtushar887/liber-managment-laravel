<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantOrderController extends Controller
{
    public function orders()
    {
        return view('restaurant.order.allOrders');
    }
}
