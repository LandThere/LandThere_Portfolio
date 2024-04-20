<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect()->intended(route('WebsiteName.show'))->with("success");
        }
        return view('admin/login');
    }

    function register(){
        // if (Auth::check()){
        //     return redirect()->intended(route('dashboard'))->with("success");
        // }
        return view('admin/register');
    }

    function dashboard(){
        return view('admin/dashboard');
    }

    function website(){
        return view('admin/website');
    }

    function create(){  
        return view('admin/create');
    }

    function edit(){
        return('admin/edit');
    }

    function about(){
        return view('admin/about');
    }

    function timeline(){
        return view('admin/timeline');
    }

    function loginPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'image' => 'nullable'
        ]);
    
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            // Retrieve the user's image path from the database
            $imagePath = User::where('id', $user->id)->value('image');
            // Store the user's image path in the session
            session(['user_image' => $imagePath]);
            return redirect()->intended(route('WebsiteName.show'))->with("success", "Login details are valid.");
        }
        return redirect(route('login'))->with("error", "Login details are not valid.");
    }

    

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'image' => 'nullable'
        ]);

        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('register'))->with("error", "registration failed, try again.");
        }
        return redirect(route('login'))->with("success", "Registration Successful!");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
