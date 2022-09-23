<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use App\Models\Contact;
use Illuminate\Http\Request;

class frontContactController extends Controller
{
    public function index(){
        return view('tampilan.frontend.contact.contact',[
            'title' => 'Contact',
            'contacts' => Contact::latest()->paginate(1),
            'produkTerbarus' => AllProduk::latest()->paginate(3)
        ]);
    }
}
