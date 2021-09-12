<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Stories;
use App\Model\Home;

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
      $result = Home::first();

        return view('front.home.home',['stories'=>$stories,'home'=>$result]);
    }
}
