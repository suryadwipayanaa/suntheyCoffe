<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use App\Models\Blog;
use App\Models\Promo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.index.index',[
            'title' => 'Dashboard',
            'allProduk' => AllProduk::all(),
            'allPromo' => Promo::all(),
            'blog' => Blog::all()
        ]);
    }
}
