<?php

namespace App\Http\Controllers\MultivendorStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultivendorStoretroller extends Controller
{
    public function index()
    {
        return view('multivendorstore.index');
    }
}
