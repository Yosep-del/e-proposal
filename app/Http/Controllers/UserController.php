<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login()
    {
        request()->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if(Auth::attempt(["email" => request("email"),"password" => request("password")]))
        {
            return redirect("/success");
        }
        echo "fail";
    }
    public function register()
    {
        return view("register");
    }
    public function register_handle()
    {
        #validation
        request()->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $data = [
            "name" => request("name"),
            "password" => bcrypt(request("password")),
            "email" => request("email"),
        ];

        User::create($data);

        return redirect("/login.blade");
    }

    public function success()
    {
        echo "Hello!." . Auth::user()->name;
    }

    public function landing()
    {
        return view("/landing");
    }

    public function lpjpage(){
        return view("/lpj");
    }
}
