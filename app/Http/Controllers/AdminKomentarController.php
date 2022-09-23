<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKomentarController extends Controller
{
    public function index(){
        return view('admin.dashboard.komentar.komentar',[
            'title' => 'Komentar',
            'blogs' => Blog::latest()->get()
        ]);
    }

    public function show(Blog $blog){
        $komentar = DB::table('komentars')->where('blogs_id','=',$blog->id)->get();
        return view('admin.dashboard.komentar.detailKomentar',[
            'title' => 'Komentar',
            'slug' => $blog,
            'blogs' => $komentar
        ]);
    }

    public function destroy($id){
        Komentar::destroy($id);

        return redirect()->back()->with('success','Delete Succesfully!');
    }

}
