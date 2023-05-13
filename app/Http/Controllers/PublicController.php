<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function homepage()
    {
        $latestProduct = Product::where('is_accepted', true)->orderBy('created_at', 'desc')->first();
        $homepageProducts = Product::where('is_accepted', true)->take(6)->orderBy('created_at', 'desc')->get();
    
        return view('welcome', compact('latestProduct', 'homepageProducts'));
    }

    public function chiSiamo(){


        return view('noi/chiSiamo');
    }

    public function categoryShow(Category $category)
    {
        return view('products/categoryShow', compact('category'));
    }

    public function searchProducts(Request $request)
    {
        $products = Product::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('products.index', compact('products'));
    }

    public function setLanguage($leng){
        session()->put('locale', $leng);
        return redirect()->back();
    }
}
