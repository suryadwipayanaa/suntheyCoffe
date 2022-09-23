<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('tampilan.frontend.about.about',[
            'title' => 'About',
            'produkTerbarus' => AllProduk::latest()->paginate(3)
        ]);
    }
}
