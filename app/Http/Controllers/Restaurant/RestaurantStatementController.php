<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantStatementController extends Controller
{
    public function daily_statement()
    {
        return view('restaurant.statement.dailyStatement');
    }

    public function monthly_statement()
    {
        return view('restaurant.statement.monthlyStatement');
    }

    public function myearly_statement()
    {
        return view('restaurant.statement.yearlyStatement');
    }
}
