<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verify_user(){

        try {

            if(Auth::check() && Auth::user()->user_type == '0'){
                return redirect()->route('home');
            }
            if(Auth::check() && Auth::user()->user_type == '1'){
                return redirect()->route('admin.home');
            }
            if(Auth::check() && Auth::user()->user_type == '2'){
                return redirect()->route('manager.home');
            }
        } catch (\Throwable $th) {
            return redirect()->route('login');
        }

    }


    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        // dd('test admin');
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}
