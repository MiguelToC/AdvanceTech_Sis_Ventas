<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index' , compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index'); 
    }
    // NO SE MUESTRA DETALLES EN CATEGORIA POR QUE SOLO HAY 2 CAMPOS QUE SON NOMBRE Y DESCRIPCION

    // public function show(Category $category)
    // {
    //     return view('admin.category.show' , compact('category'));
    // }

    public function edit(Category $category)
    {
        return view('admin.category.edit' , compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index'); 
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index'); 
    }
}
