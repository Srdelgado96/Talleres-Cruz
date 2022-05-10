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
        dd("__construct");
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        dd("pepe");
        if (auth()->user()->esAdministrador()) {
            dd("pepe");
            return redirect('/home');
        }
        if (auth()->user()->esOperario()) {
            dd("pepe");
            return redirect()->route('Vehiculos.index');
        } else
            return redirect('/');
        //redirect()->action('ClienteController@index');
    }
}
