<?php

namespace App\Http\Controllers\MultivendorStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultivendorStoreOrderController extends Controller
{
    public function orders()
    {
        return view('multivendorstore.order.orderList');
    }
}
