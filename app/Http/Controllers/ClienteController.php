<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Session;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session::put('pagActual', 'Clientes');
        $TodosClientes = Cliente::all();
        // dd($Todasclientes);
        return view('Cliente.indexCliente', compact('TodosClientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TodosClientes = Cliente::all();
        return view('Cliente.nuevoCliente', compact('TodosClientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cliente= new Cliente();
        $Cliente->nombre = $request->nombre;
        $Cliente->dni = $request->dni;
        $Cliente->telefono = $request->telefono;
        $Cliente->email = $request->email;
        $Cliente->password = bcrypt("123");
        $Cliente->direccion = $request->direccion;
        $Cliente->save();
        return redirect()->route('Clientes.index')
        ->with('success', 'el cliente ha sido creado con Éxito');
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
        session::put('pagActual', 'Modificar Cliente');
        $Cliente = Cliente::find($id)->first();
        return view('Cliente.modificarCliente', compact('Cliente'));
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
        //dd($request->id." ". $request->nombre);
        $Cliente = Cliente::find($request->id);
        //dd($producto);
        $Cliente->nombre = $request->nombre;
        $Cliente->dni = $request->dni;
        $Cliente->telefono = $request->telefono;
        $Cliente->email = $request->email;
        $Cliente->password = bcrypt("123");
        $Cliente->direccion = $request->direccion;

        $Cliente->save();
        return redirect()->route('Clientes.index')
        ->with('success', 'El Cliente ha sido Modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $cliente = Cliente::find($id);
        //dd($cliente);
        $cliente->delete();
        return redirect()->route('Clientes.index')
        ->with('success', 'el cliente ha sido Borrado con exito');
    }



    
}
