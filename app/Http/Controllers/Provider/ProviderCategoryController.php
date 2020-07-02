<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderCategoryController extends Controller
{
    public function category()
    {

        return view('provider.category.category');
    }
}
