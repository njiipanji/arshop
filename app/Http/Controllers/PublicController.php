<?php

namespace ARShop\Http\Controllers;

use Illuminate\Http\Request;
use ARShop\Product;

class PublicController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
}
