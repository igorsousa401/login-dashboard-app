<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function index()
    {
        return view("app.common.index");
    }
    public function products()
    {
        return view("app.common.products");
    }

    public function categories()
    {
        return view("app.common.categories");
    }

    public function brands()
    {
        return view("app.common.brands");
    }
}
