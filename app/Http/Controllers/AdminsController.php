<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Admin;
use Activity;
use Hash;

class AdminsController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Data Admin";
    	$data['data'] = Admin::all();

    	return view('admins.index', $data);
    }

    public function getAdd(){
        $data['page_title'] = 'Tambah Data Admin';

        return view('admins.form', $data);
    }

    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = New Admin;
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        Activity::add([
            'page' => 'Tambah Data Admin',
            'description' => 'Menambahkan Admin Baru: '.$request->name
        ]);

        return redirect('admin/data')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id){
        $data['page_title'] = 'Edit Data Admin';
        $data['data'] = Admin::find($id);

        return view('admins.form',$data);
    }

    public function postEdit($id, Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
        ]);

        $data = Admin::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->password != NULL) {
            $data->password = Hash::make($request->password);
        }

        $data->save();

        Admin::findOrFail($id)->update($request->all());

        Activity::add([
            'page' => 'Edit Data Admin',
            'description' => 'Mengedit Admin: '.$request->name
        ]);

        return redirect('admin/data')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Diedit'
        ]);
    }

    public function getDelete($id){
        $data = Admin::findOrFail($id);
        $name = $data->name;

        $data->delete();

        Activity::add([
            'page' => 'Data Admin',
            'description' => 'Menghapus Admin: '.$name
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'Data Berhasil Dihapus!'
        ]);
    }

    public function getChangePassword(){
        $data['page_title'] = "Change Password";

        return view('admins.password', $data);

    }

    public function postChangePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Admin::find(auth('admin')->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message' => 'Password Berhasil Diupdate!'
        ]);
    }
}
