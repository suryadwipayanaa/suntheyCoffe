<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.contact.contact',[
            'title' => 'Contact',
            'contacts' => Contact::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.contact.addContact',[
            'title' => 'Add Contact'
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
            'alamat' => 'required',
            'telp' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required',
            'linkMap' => 'required',
            'email' => 'required',
            'image' => 'required|max:1500',
            'slug' => 'required|unique:contacts'
        ]);

        $validateData['image'] = $request->file('image')->store('contact');
        Contact::create($validateData);

        return redirect('/dashboard/contact')->with('success','Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.dashboard.contact.detailContact',[
            'title' => 'Detail Contact',
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if($contact->image){
            Storage::delete($contact->image);
        }

        Contact::destroy($contact->id);
        return redirect('/dashboard/contact')->with('successDelete','Delete Successfully!');
    }
}
