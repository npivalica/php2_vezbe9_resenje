<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SliderImage;
use Illuminate\Http\Request;

class HomeController extends OsnovniController
{
    public function index(){
        $this->data["products"] = Product::with('categories')->take(6)->get();
        $this->data["sliderImages"] = SliderImage::all();
        return view('pages.main.home', $this->data);
    }
}
