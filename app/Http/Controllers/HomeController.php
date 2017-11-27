<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Cornford\Googlmapper\Mapper;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $html = Categorie::renderAsHtml();
        return view('home',compact('html'));
    }
}
