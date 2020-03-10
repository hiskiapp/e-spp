<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rombel;
use App\User;
use Activity;

class RombelsController extends Controller
{
    public function getIndex(){
        $data['page_title'] = 'Data Rombel';
        $data['data'] = Rombel::all();

        foreach ($data['data'] as $key => $row) {
        	$row->total = User::where('rombels_id', $row->id)->count();
        }

        return view('rombels.index', $data);
    }

    public function getAdd(){
        $data['page_title'] = 'Tambah Data Rombel';

        return view('rombels.form', $data);
    }

    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required',
            'major_competency' => 'required',
        ]);

        Rombel::create($request->all());

        Activity::add([
            'page' => 'Tambah Data Rombel',
            'description' => 'Menambahkan Rombel Baru: '.$request->name
        ]);

        return redirect('admin/rombels')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id){
        $data['page_title'] = 'Edit Data Rombel';
        $data['data'] = Rombel::find($id);

        return view('rombels.form',$data);
    }

    public function postEdit($id, Request $request){
        $request->validate([
            'name' => 'required',
            'major_competency' => 'required',
        ]);

        Rombel::findOrFail($id)->update($request->all());

        Activity::add([
            'page' => 'Edit Data Rombel',
            'description' => 'Mengedit Data Rombel: '.$request->name
        ]);

        return redirect('admin/rombels')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Diedit'
        ]);
    }

    public function getDelete($id){
        $data = Rombel::findOrFail($id);
        $name = $data->name;

        $data->delete();

        Activity::add([
            'page' => 'Data Rombel',
            'description' => 'Menghapus Data Rombel: '.$name
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'Data Berhasil Dihapus!'
        ]);
    }
}
