<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showFoodBeverage()
    {
        return view('products.food-beverage');
    }

    public function showBeautyHealth()
    {
        return view('products.beauty-health');
    }

    public function showHomeCare()
    {
        return view('products.home-care');
    }

    public function showBabyKid()
    {
        return view('products.baby-kid');
    }
}

