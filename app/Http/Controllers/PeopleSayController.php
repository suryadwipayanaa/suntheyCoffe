<?php

namespace App\Http\Controllers;

use App\Models\peopleSay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeopleSayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.peopleSay.peopleSay',[
            'title' => 'People Say',
            'peopleSays' => peopleSay::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *]
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.peopleSay.addPeopleSay',[
            'title' => 'People Say'
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
            'slug' => 'required|unique:people_says',
            'deskripsi' => 'required'
        ]);

        $validateData['image'] = $request->file('image')->store('peopleSay');
        $validateData['deskripsi'] = strip_tags($request->deskripsi);

        peopleSay::create($validateData);

        return redirect('/dashboard/peopleSay')->with('success','Success Insert Data');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peopleSay  $peopleSay
     * @return \Illuminate\Http\Response
     */
    public function show(peopleSay $peopleSay)
    {
        return view('admin.dashboard.peopleSay.detailPeopleSay',[
            'title' => 'Detail People Say',
            'say' => $peopleSay
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peopleSay  $peopleSay
     * @return \Illuminate\Http\Response
     */
    public function edit(peopleSay $peopleSay)
    {
        return view('admin.dashboard.peopleSay.editPeopleSay',[
            'title' => 'Edit People Say',
            'say' => $peopleSay
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\peopleSay  $peopleSay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, peopleSay $peopleSay)
    {
        $rule = [
            'nama' => 'required',
            'image' => 'max:1500',
            'deskripsi' => 'required'
        ];

        if($request->slug != $peopleSay->slug){
            $rule['slug'] = 'required|unique:people_says';
        }

        $validateData = $request->validate($rule);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('peopleSay');
        }

        peopleSay::where('id', $peopleSay->id)->update($validateData);

        return redirect('/dashboard/peopleSay')->with('successUpdate','Updated Successfully!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peopleSay  $peopleSay
     * @return \Illuminate\Http\Response
     */
    public function destroy(peopleSay $peopleSay)
    {
        if($peopleSay->image){
            Storage::delete($peopleSay->image);
           }
    
           peopleSay::destroy($peopleSay->id);
    
           return redirect('/dashboard/peopleSay')->with('successDelete','Delete Succesfully!');
    }
}
