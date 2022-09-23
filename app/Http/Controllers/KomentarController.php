<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use Illuminate\Http\Request;

class KomentarController extends Controller
{

    public function store(Request $slug){

        $validateData = $slug->validate([
            'username' => 'required',
            'namaLengkap' => 'required',
            'komentar' => 'required',
            'blogs_id' => 'required'
        ]);

        Komentar::create($validateData);
        return back()->with('success', 'Komentar Added');
      
    }
}

