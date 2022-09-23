<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class AllPromoController extends Controller
{
    public function index(){
        return view('tampilan.frontend.home.allPromo',[
            'title' => 'All Promo',
            'promo' => Promo::latest()->get(),
            'promos' => Promo::latest()->get()
        ]);
    }
}
