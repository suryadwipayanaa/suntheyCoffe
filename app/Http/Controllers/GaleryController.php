<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.galery.galery',[
            'title' => 'Galery',
            'galeries' => Galery::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.galery.addGalery',[
            'title' => 'Add Galery'
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
            'slug' => 'required|unique:galeries',
            'image' => 'required|max:1500'
        ]);

        $validateData['image'] = $request->file('image')->store('galery');

        Galery::create($validateData);

        return redirect('/dashboard/galery')->with('success','Galery Success Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery)
    {
        return view('admin.dashboard.galery.detailGalery',[
            'title' => 'Detail Galery',
            'galery' => $galery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery)
    {
        return view('admin.dashboard.galery.editGalery',[
            'title' => 'Edit Galery',
            'galery' => $galery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery)
    {
        $rule = [
            'nama' => 'required',
            'image' => 'max:1500'
        ];

        if($request->slug != $galery->slug){
            $rule['slug'] = 'required|unique:galeries';
        }

        $validateData = $request->validate($rule);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('galery');
        }

        Galery::where('id', $galery->id)->update($validateData);
        return redirect('/dashboard/galery')->with('successUpdate','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galery $galery)
    {
        if($galery->image){
            Storage::delete($galery->image);
        }

        Galery::destroy($galery->id);
        return redirect('/dashboard/galery')->with('successDelete','Delete Successfully!');
    }
}
