<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Stories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $stories = Stories::get();

        return view('front.home.home',['stories'=>$stories]);
    }
}
