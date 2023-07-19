<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Provider;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index' , compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories','providers'));
    }

    public function store(StoreProductRequest $request)
    {

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            
        }
        
        $product = Product::create($request->all()+[
            'image'=>$image_name,
        ]);

        $product->update(['code'=>$product->id]);
        return redirect()->route('products.index'); 
    }

    public function show(Product $product)
    {
        return view('admin.product.show' , compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit' , compact('product','categories','providers'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            
        }
        $product->update($request->all()+[
            'image'=>$image_name,
        ]);
        return redirect()->route('products.index'); 
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index'); 
    }
    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVED') {
            $product->update(['status'=>'DESACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVED']);
            return redirect()->back();
        }
        
    }
}
