<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.promo.promo',[
            'title' => 'Promo Terbaru',
            'promos' => Promo::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.promo.addPromo',[
            'title' => 'Add Promo'
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
            'promo' => 'required',
            'image' => 'required|max:1500',
            'deskripsi' => 'required',
            'slug' => 'required|unique:promos',
        ]);

        $validateData['image'] = $request->file('image')->store('promo');
        $validateData['deskripsi'] = strip_tags($request->deskripsi);

        Promo::create($validateData);

        return redirect('/dashboard/promo')->with('success','Success Insert Data');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        return view('admin.dashboard.promo.detailPromo',[
            'title' => 'Detail Promo',
            'promo' => $promo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('admin.dashboard.promo.editPromo',[
            'title' => 'Edit Promo',
            'promo' => $promo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $rule = [
            'promo' => 'required',
            'image' => 'max:1500',
            'deskripsi' => 'required',
        ];

        if($request->slug != $promo->slug){
            $rule['slug'] = 'required|unique:promos';
        }

        $validateData = $request->validate($rule);
        $validateData['deskripsi'] = strip_tags($request->deskripsi);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('promo');
        }

        Promo::where('id', $promo->id)->update($validateData);

        return redirect('/dashboard/promo')->with('successUpdate','Success Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        if($promo->image){
            Storage::delete($promo->image);
        }

        Promo::destroy($promo->id);

        return redirect('/dashboard/promo')->with('successDelete','Delete Success');
    }
}
