<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;
use App\User;
use Activity;

class SppController extends Controller
{
    public function getIndex(){
        $data['page_title'] = 'Data Spp';
        $data['data'] = Spp::all();

        foreach ($data['data'] as $key => $row) {
        	$row->amount = 'Rp'.number_format($row->amount,2);
        	$row->total = User::where('spp_id', $row->id)->count();
        }

        return view('spp.index', $data);
    }

    public function getAdd(){
        $data['page_title'] = 'Tambah Data Spp';

        return view('spp.form', $data);
    }

    public function postAdd(Request $request){
        $request->validate([
            'period' => 'required',
            'amount' => 'required',
        ]);

        Spp::create($request->all());

        Activity::add([
            'page' => 'Tambah Data Spp',
            'description' => 'Menambahkan Spp Baru: '.$request->name
        ]);

        return redirect('admin/spp')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id){
        $data['page_title'] = 'Edit Data Spp';
        $data['data'] = Spp::find($id);

        return view('spp.form',$data);
    }

    public function postEdit($id, Request $request){
        $request->validate([
            'period' => 'required',
            'amount' => 'required',
        ]);

        Spp::findOrFail($id)->update($request->all());

        Activity::add([
            'page' => 'Edit Data Spp',
            'description' => 'Mengedit Data Spp: '.number_format($request->amount).' ~ '.$request->period
        ]);

        return redirect('admin/spp')->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Diedit'
        ]);
    }

    public function getDelete($id){
        $data = Spp::findOrFail($id);
        $name = number_format($data->amount).' ~ '.$data->period;

        $data->delete();

        Activity::add([
            'page' => 'Data Spp',
            'description' => 'Menghapus Data Spp: '.$name
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'   => 'Data Berhasil Dihapus!'
        ]);
    }
}
