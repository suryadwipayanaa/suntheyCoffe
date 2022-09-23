<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use App\Models\Blog;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontBlogsController extends Controller
{
    public function index(){
        return view('tampilan.frontend.blogs.blogs',[
            'title' => 'Blogs',
            'produkTerbarus' => AllProduk::latest()->paginate(4),
            'blog' => Blog::latest()->get()
        ]);
    }

    public function show(Blog $slug){
        $komentar = DB::table('komentars')->where('blogs_id', '=' , $slug->id)->get();
        return view('tampilan.frontend.blogs.showBlogs',[
            'title' => 'Detail Blogs',
            'produkTerbarus' => AllProduk::latest()->paginate(4),
            'blog' => $slug,
            'komentar' => $komentar
        ]);

    }

}
