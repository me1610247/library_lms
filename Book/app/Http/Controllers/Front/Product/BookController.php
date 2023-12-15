<?php
namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = $category->products()->paginate(5);
        
        return view('front.pages.books.index', compact('products'));
    }
}
