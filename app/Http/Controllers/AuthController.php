<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\NewArrivals;
use App\Product;

class AuthController extends Controller
{

    public function test(){
        $images = Product::with(['galleries'])->where('status','new')->get();
        $restock = Product::with(['galleries'])->where('status','restock')->get();
        return view('test',['newarrivals' => $images , 'restocks' => $restock]);
    }

    public function loginpage(){
        return view('login');
    }
    public function registerpage(){
        return view('register');
    }

    public function registerprocess(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        User::create($data);

        return view('login');
    }

    public function loginprocess(Request $request){
        $data = $request->all();
        
        //check
        if(Auth::attempt(['email' => $data['email'] , 'password' => $data['password']])){
            return redirect('/');
        }
        else{
            return redirect()->back();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
