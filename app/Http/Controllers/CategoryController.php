<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.category.category',[
            'title' => 'Category',
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.category.addCategory',[
            'title' => 'Tambah Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $valideData = $request->validate([
            'category' => 'required',
            'image' => 'required|max:1500',
            'slug' => 'required|unique:categories'
        ]);

        $valideData['image'] = $request->file('image')->store('category');

        Category::create($valideData);

        return redirect('/dashboard/category')->with('success','Success Add Category');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.dashboard.category.editCategory',[
            'title' => 'Edit Category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $rule = [
            'category' => 'required',
        ];

        if($request->slug != $category->slug){
            $rule['slug'] = 'required|unique:categories';
        }

        $valideData = $request->validate($rule);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $valideData['image'] = $request->file('image')->store('category');
        }

        Category::where('id', $category->id)->update($valideData);

        return redirect('/dashboard/category')->with('successUpdate','Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image){
            Storage::delete($category->image);
        }

        Category::destroy($category->id);

        return redirect('/dashboard/category')->with('successDelete','Delete Succesfully');
    }
}
