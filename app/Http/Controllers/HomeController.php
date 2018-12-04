<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::all();
        if($peoples->isEmpty() == true) {
            $peoples = null;
        }

        return view('home', compact('peoples'));
    }
}
