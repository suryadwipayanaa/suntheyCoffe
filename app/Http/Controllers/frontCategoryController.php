<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use App\Models\Category;
use Illuminate\Http\Request;

class frontCategoryController extends Controller
{
    public function index(){
        return view('tampilan.frontend.category.category',[
            'title' => 'Category',
            'categories' => Category::latest()->get(),
            'produkTerbarus' => AllProduk::latest()->paginate(4)
        ]);
    }
}
