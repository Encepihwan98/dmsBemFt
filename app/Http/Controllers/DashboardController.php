<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }

    public function index(){
        // dd(auth()->user()->hasRole('user'));
        return view('admin.index');
    }
}
