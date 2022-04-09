<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Averia;
use App\Models\Estados;
use Illuminate\Support\Facades\Session;
class AveriaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        session::put('pagActual', 'Averia');
        $TodasAverias = Averia::all();
        return view('Averias.indexAverias', compact('TodasAverias'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Averias.nuevaAveria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session::put('pagActual', 'Modificar Averia');
        $Averia = Averia::find($id);
        $todoEstados = Estados::all();
        return view('Averias.modificarAverias', compact('Averia', 'todoEstados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $averia = Averia::find($id)->first();

        $averia->delete();
        return redirect()->route('Averias.indexAverias')
        ->with('success', 'La Averiía ha sido creado con exito');
    
    }
}
