<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        $search_text=$_GET['query'];
        $products=Product::where('title','LIKE','%'.$search_text.'%')->with('category')->get();
        return view('admin.pages.books.search',compact('products')); 
    }
}
