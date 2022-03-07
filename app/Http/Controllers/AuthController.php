<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Illuminate\Events\queueable;

class AuthController extends Controller
{
    public function showformregister()
    {
        $roles = DB::table('roles')->get();
        return view('backend.auth.register', compact('roles'));
    }
    public function register(Request $request)
    {
        $data = $request->only('name', 'email', 'password', 'role_id');
        $data['password'] = Hash::make($data['password']);
        DB::table('users')->insert($data);
        return redirect()->route('showformlogin');
    }
    public function showformlogin()
    {
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view('backend.auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('index');
        }
        else{
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('showformlogin');
    }

}
