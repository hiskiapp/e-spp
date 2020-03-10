<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\User;
use App\Rombel;
use Hash;

class UsersController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Profile";
    	$data['data'] = User::where('id', auth()->user()->id)->first();
    	$data['rombels'] = Rombel::all();

    	return view('users.profile.index', $data);
    }

    public function postUpdate(Request $request){
    	$data = User::findOrFail(auth()->user()->id);
    	$data->name = $request->name;
    	$data->rombels_id = $request->rombels_id;
    	$data->email = $request->email;
    	$data->gender = $request->gender;
    	$data->address = $request->address;
    	$data->telp = $request->telp;
    	$data->save();

    	return redirect()->back()->with([
    		'message_type' => 'success',
    		'message' => 'Data Berhasil Diupdate'
    	]);
    }

    public function getChangePassword(){
        $data['page_title'] = "Change Password";

        return view('users.profile.password', $data);

    }

    public function postChangePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message' => 'Password Berhasil Diupdate!'
        ]);
    }
}
