<?php

namespace App\Http\Controllers\MultivendorStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultivendorStoreStatementController extends Controller
{
    public function daily_statement()
    {
        return view('multivendorstore.statement.dailyStatement');
    }

    public function monthly_statement()
    {
        return view('multivendorstore.statement.monthlyStatement');
    }

    public function myearly_statement()
    {
        return view('multivendorstore.statement.yearlyStatement');
    }


}
