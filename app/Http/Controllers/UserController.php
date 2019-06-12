<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct(){
		$this->middleware('user');
	}

    public function index(){
    	$user = auth()->user();

    	return view('user.info', compact('user'));
    }

    public function change_pin(){
    	return view('user.change_pin');
    }

    public function update_pin(Request $request){
    	$request->validate([
		    'pin' => 'required|digits_between:4,4',
		]);

    	$user = auth()->user();

    	if($request->filled('pin')) $user->pin = bcrypt($request->pin);

    	$user->save();

    	return redirect('/user/change_pin')->with('success', 'PIN updated');
    }
}
