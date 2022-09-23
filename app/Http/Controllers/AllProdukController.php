<?php

namespace App\Http\Controllers;

use App\Models\AllProduk;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AllProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.allProduk.allProduk',[
            'title' => 'All Produk',
            'allProduks' => AllProduk::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.allProduk.addProduk',[
            'title' => 'Add Produk',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'image' => 'required|max:1500',
            'slug' => 'required|unique:all_produks',
            'deskripsi' => 'required',
            'harga' => 'required',
            'category_id' => 'required'
        ]);

        $validateData['image'] = $request->file('image')->store('allProduk');
        $validateData['deskripsi'] = strip_tags($request->deskripsi);

        AllProduk::create($validateData);

        return redirect('/dashboard/allProduk')->with('success', 'Success Menambahkan Data');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AllProduk  $allProduk
     * @return \Illuminate\Http\Response
     */
    public function show(AllProduk $allProduk)
    {
        return view('admin.dashboard.allProduk.detailProduk',[
            'title' => 'Detail Produk',
            'produk' => $allProduk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AllProduk  $allProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(AllProduk $allProduk)
    {
        return view('admin.dashboard.allProduk.editProduk',[
            'title' => 'Edit Produk',
            'category' => Category::all(),
            'produk' => $allProduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AllProduk  $allProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllProduk $allProduk)
    {
        $rule =[
            'nama' => 'required',
            'image' => 'max:1500',
            'deskripsi' => 'required',
            'harga' => 'required',
            'category_id' => 'required'
        ];

        if($request->slug != $allProduk->slug){
            $rule['slug'] = 'required|unique:all_produks';
        }

        $validateData = $request->validate($rule);

        $validateData['deskripsi'] = strip_tags($request->deskripsi);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('allProduk');
        }

        AllProduk::where('id', $allProduk->id)->update($validateData);

        return redirect('/dashboard/allProduk')->with('successUpdate','Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AllProduk  $allProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllProduk $allProduk)
    {
        if($allProduk->image){
            Storage::delete($allProduk->image);
        }

        AllProduk::destroy($allProduk->id);

        return redirect('/dashboard/allProduk')->with('successDelete','Delete Successfully!');
    }
}

