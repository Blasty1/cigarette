<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $is_first_time=\App\Stock::where('id_industry',\Auth::user()->id_industry)->first() ? True : False;

        return view('home',[
            'is_first' => $is_first_time
        ]);
    }
}
