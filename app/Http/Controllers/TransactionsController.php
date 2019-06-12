<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
	public function __construct(){
		$this->middleware('user');
	}

    public function index(){
    	$transactions = auth()->user()->transactions;

    	return view('transactions.index', compact('transactions'));
    }

    public function withdraw(){
    	return view('transactions.withdraw');
    }

    public function store(Request $request){
    	$request->validate([
		    'amount' => 'required|amount|numeric|min:200|max:40000',
		]);

    	$user = auth()->user();
    	$amount = $request->amount;

    	if($amount > $user->balance){
    		return response('You dont have money on your account to complete your request', 406);
    	}

    	$user->balance = $user->balance - $amount;
	    	if($user->save()){

	    	$user->transactions()->create([
	    		'amount' => $amount
	    	]);
    	}

    	return response('Success', 200);
    }
}
