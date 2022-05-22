<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Models\Rol;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session::put('pagActual', 'Empleados');
        $TodosEmpleados = User::all();
        $todosPermiso = Rol::all();
        return view('Empleado.indexEmpleado', compact('TodosEmpleados', 'todosPermiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todosPermiso = Rol::all();
        return view('Empleado.nuevoEmpleado', compact('todosPermiso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User = new User();
        $User->nombre = $request->nombre;
        $User->rol_id = $request->permiso_id;
        $User->telefono = $request->telefono;
        $User->email = $request->email;
        $User->password = bcrypt("123");
        $User->save();
        return redirect()->route('Empleados.index')
            ->with('success', 'el Empleado ha sido creado con Éxito');
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
        // echo "pepe";
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

        $User = User::find($id)->first();
        //dd($User);
        $User->delete();
        return redirect()->route('Empleados.index')
            ->with('success', 'El Empleado ha sido Eliminado con éxito');
    }

    public function PruebAupdate(Request $request)
    {

        $User = User::find($request->id);
        $User->nombre = $request->nombre;
        $User->telefono = $request->telefono;
        $User->email = $request->email;
        $User->rol_id = $request->rol_id;

        $User->save();
        return redirect()->route('Empleados.index')->with('success', 'Se ha Actualizado Correctamente');
    }

    public function esAdministrador(): bool
    {
        return $this->rol_id == 1;
    }
    public function esOperario(): bool
    {
        return $this->rol_id == 2;
    }
}
