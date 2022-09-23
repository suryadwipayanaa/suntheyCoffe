<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use App\Models\Category;
use App\Models\peopleSay;
use App\Models\ProdukTerbaru;
use App\Models\Promo;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $makanan = DB::table('all_produks')->where('category_id',1)->get();
        $minuman = DB::table('all_produks')->where('category_id',2)->get();
        $dessert = DB::table('all_produks')->where('category_id',3)->get();

        $search = AllProduk::latest();

        if(request('search')){
            $search->where('nama','like','%' .request('search').'%');
        }

        return view('tampilan.frontend.home.home',[
            'title' => 'Home',
            'categories' => Category::all(),
            'produkTerbarus' => AllProduk::latest()->paginate(3),
            'promos' => Promo::latest()->paginate(1),
            'allProduk' => $search->get(),
            'peopleSay' => peopleSay::latest()->paginate('3'),
            'makanan' => $makanan,
            'minuman' => $minuman,
            'dessert' => $dessert
        ]);
    }
}
