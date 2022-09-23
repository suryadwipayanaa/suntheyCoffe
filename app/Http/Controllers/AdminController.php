<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $user = DB::table('users')->where('level', '=', 'admin')->get();
        return view('admin.dashboard.admin.admin',[
            'title' => 'Admin',
            'admins' => $user
        ]);
    }

    public function create(){
        return view('admin.dashboard.admin.addAdmin',[
            'title' => 'Add Admin'
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users' ,
            'password' => 'required',
            'level' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/dashboard/admin')->with('success','Successfully Added New Admin');
    }

    public function destroy($id){
        User::destroy($id);
    }
}
