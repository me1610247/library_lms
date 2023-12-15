<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // category is the function that refer to the relationship in model 
        $products=Product::with('category')->paginate(5);
        return view('admin.pages.books.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.pages.books.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:3|max:20|string',
            'price'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]);
        $data=$request->all();
        if($request->hasFile('image')){
            $extension_path='public/images/products';
            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('image')->storeAs($extension_path,$image_name);
            $data['image']=$image_name;
        }
        Product::create($data);
        session()->flash('message',$data['title'].' Successfully Created');
        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product)
    {
        $categories=Category::all();
        $product=Product::find($product);
        return view('admin.pages.books.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product)
    {
        $data=$request->all();
        $product=Product::find($product);
        $product->title=$data['title'];
        $product->price=$data['price'];
        $product->description=$data['description'];
        $product->category_id=$data['category_id'];
        $product->save();
        session()->flash('message',$data['title'].' Successfully Updated');
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::find($product);
        if ($product) {
            $title = $product->title; // Fetching title before deletion
            $product->delete();
            session()->flash('message', $title . ' Successfully Deleted');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Book not found!');
        }
    }
    
   

}
