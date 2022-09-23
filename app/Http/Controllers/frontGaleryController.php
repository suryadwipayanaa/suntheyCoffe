<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use App\Models\Galery;

class frontGaleryController extends Controller
{
   public function index(){
    return view('tampilan.frontend.galery.galery',[
        'title' => 'Galery',
        'galery' => Galery::latest()->get(),
        'produkTerbarus' => AllProduk::latest()->paginate(3)
    ]);
   }
}
