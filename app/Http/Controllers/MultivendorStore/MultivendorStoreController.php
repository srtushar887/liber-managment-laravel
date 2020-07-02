<?php

namespace App\Http\Controllers\MultivendorStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultivendorStoreController extends Controller
{
    public function index()
    {
        return view('multivendorstore.index');
    }
}
