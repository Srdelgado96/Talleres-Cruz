<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Support\Facades\Session;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session::put('pagActual', 'Vehiculos');
        $Todosvehiculos = Vehiculo::all();
        $TodosClientes=Cliente::all();
        // dd($Todasclientes);
        return view('Vehiculo.indexVehiculo', compact('Todosvehiculos','TodosClientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TodosClientes = Cliente::all();
        return view('Vehiculo.nuevoVehiculo', compact('TodosClientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Vehiculo= new Vehiculo();
        $Vehiculo->marca = $request->marca;
        $Vehiculo->modelo = $request->modelo;
        $Vehiculo->matricula = $request->matricula;
        $Vehiculo->kilometros = $request->kilometros;
        $Vehiculo->cliente_id = $request->cliente_id;
        $Vehiculo->save();

        return redirect()->route('Vehiculos.index')->with('success', 'Se ha Actualizado Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Vehiculo = Vehiculo::find($request->id);
        $Vehiculo->matricula = $request->matricula;
        $Vehiculo->marca= $request->marca;
        $Vehiculo->modelo= $request->modelo;
        $Vehiculo->kilometros= $request->kilometros;
        $Vehiculo->cliente_id= $request->cliente_id;
        $Vehiculo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Vehiculo = Vehiculo::find($id)->first();

        $Vehiculo->delete();
        return redirect()->route('Vehiculos.index')
        ->with('success', 'El Vehículo ha sido Eliminado con Éxito');
    }
}
