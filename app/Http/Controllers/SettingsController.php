<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Activity;

class SettingsController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Pengaturan";
    	$data['data'] = Setting::all();

    	return view('settings.index', $data);
    }

    public function getAdd(){
        $data['page_title'] = 'Tambah Pengaturan';

        return view('settings.form', $data);
    }

    public function postAdd(Request $request){
        $request->validate([
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        Setting::create($request->all());

        Activity::add([
            'page' => 'Tambah Pengaturan',
            'description' => 'Menambahkan Pengaturan Baru: '.$request->title
        ]);

        return redirect('admin/settings')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id){
        $data['page_title'] = 'Edit Pengaturan';
        $data['data'] = Setting::find($id);

        return view('settings.form',$data);
    }

    public function postEdit($id, Request $request){
        $request->validate([
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        Setting::findOrFail($id)->update($request->all());

        Activity::add([
            'page' => 'Edit Pengaturan',
            'description' => 'Mengedit Pengaturan: '.$request->title
        ]);

        return redirect('admin/settings')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Diedit'
        ]);
    }

    public function getDelete($id){
        $data = Setting::findOrFail($id);
        $name = $data->title;

        $data->delete();

        Activity::add([
            'page' => 'Data Pengaturan',
            'description' => 'Menghapus Pengaturan: '.$name
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'Data Berhasil Dihapus!'
        ]);
    }
}
