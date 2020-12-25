<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.home' );
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}
