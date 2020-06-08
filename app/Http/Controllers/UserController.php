<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    //
    public function store(UserRequest $request){
        // $nama = $request->input('name');
        // $email = $request->input('email');
        // $password = $request->input('password');

        // $data = new User();
        // $data->name = $nama;
        // $data->email = $email;
        // $data->password = $password;
        // $data->save();
        $data = $request->all();
        User::create($data);
        return redirect()->back();
    }
}
