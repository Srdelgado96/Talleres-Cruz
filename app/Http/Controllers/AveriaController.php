<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Averia;
use App\Models\Estados;
use App\Models\Cliente;
use App\User;
use App\Models\Vehiculo;
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
        $TodosClientes = Cliente::all();
        $TodosVehiculos = Vehiculo::all();
        $TodosMecanicos = User::all();
        return view('Averias.indexAverias', compact('TodasAverias','TodosClientes', 'TodosVehiculos', 'TodosMecanicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estados::all();
        $todosMecanicos = User::all();
        $todosClientes = Cliente::all();
        return view('Averias.nuevaAveria', compact('estados', 'todosMecanicos', 'todosClientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Averia = new Averia;
        $Averia->nombre = $request->nombre;
        $Averia->fecha_registro = date('Y-m-d ');

        $Averia->estado_id = $request->estado_id;
        $Averia->cliente_id = $request->cliente_id;
        $Averia->vehiculo_id = $request->vehiculo_id;
        $Averia->user_id = $request->user_id;
        //dd($Averia);
        $Averia->save();

        return redirect()->route('Averias.index')
            ->with('success', 'La Averia se ha creado con exito.');
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
        $todosMecanicos = User::all();
        $todosClientes = Cliente::all();
        return view('Averias.modificarAverias', compact('Averia', 'todoEstados'));
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
        dd($request);
        $Averia = Averia::find($request->id);
        $Averia->nombre = $request->nombre;
        $Averia->fecha_registro= $request->fecha_registro;
        $Averia->fecha_finalizacion = $request->fecha_finalizacion;
        $Averia->estado_id = $request->estado_id;
        $Averia->cliente_id = $request->cliente_id;
        $Averia->vehiculo_id = $request->vehiculo;
        $Averia->user_id = $request->user_id;
        $Averia->save();
        return redirect()->route('Averias.index')->with('success', 'Se ha Actualizado Correctamente');
    }



    public function PruebAupdate(Request $request)
    {
        
        $Averia = Averia::find($request->id);
        $Averia->nombre = $request->nombre;
        $Averia->fecha_registro = $request->fecha_registro;
        $Averia->fecha_finalizacion = $request->fecha_finalizacion;
        $Averia->estado_id = $request->estado_id;
        $Averia->cliente_id = $request->cliente_id;
        $Averia->vehiculo_id = $request->vehiculo_id;
        $Averia->user_id = $request->user_id;
        $Averia->save();
        return redirect()->route('Averias.index')->with('success', 'Se ha Actualizado Correctamente');
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
        return redirect()->route('Averias.index')
            ->with('success', 'La Avería ha sido Eliminada con Exito');
    }
    public function listarVehiculos(Request $request)
    {
        
        $id = $_GET['id'];
        $options = "";
        $query = Vehiculo::where('cliente_id', $id)->get();

        foreach ($query as $vehiculo) {

            $options .= "<option value='" . $vehiculo->id . "'>" . $vehiculo->marca . " " . $vehiculo->matricula . "</option>";
        }

        return $options;
    }

    
    public function listarVehiculosParaModificarAveria(Request $request)
    {

        $id = $_GET['id']; //id de la averia nos viene desde ajax
        $options = "";
        
        $averia = Averia::find($id)->first();
        
        $IDcliente= $averia->cliente_id;
    
        $vehiculos = Vehiculo::where('cliente_id',$IDcliente)->get();
    
        foreach ($vehiculos as $vehiculo) {

            $options .= "<option value='" . $vehiculo->id . "'>" . $vehiculo->marca . " " . $vehiculo->matricula . "</option>";
        }

        return $options;
    }
}
