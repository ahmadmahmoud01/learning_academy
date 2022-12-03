<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('admin.auth.login');
    }

    public function doLogin() {

        $data = request()->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string'
        ]);

        // if(!(auth()->guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))) {
            if(!(auth()->attempt(['email' => $data['email'], 'password' => $data['password']]))) {

            return back();

        }

        return redirect(route('admin.home'));
    }

    public function logout() {

        // auth()->guard('admins')->logout();
        auth()->logout();

        return redirect(route('admin.login'));
    }


}
