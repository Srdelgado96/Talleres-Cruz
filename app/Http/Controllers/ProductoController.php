<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Productos;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session::put('pagActual', 'Productos');
        $TodasProductos = Productos::all();
        return view('Producto.indexProductos', compact('TodasProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Producto.nuevoProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $producto= new Productos;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->save();
        return redirect()->route('Productos.index')
        ->with('success', 'El producto se ha creado con exito.');
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
        //dd($request->id." ". $request->nombre);
        $producto = Productos::find($request->id);
        //dd($producto);
        $producto->nombre=$request->nombre;
        $producto->precio = $request->precio;
        $producto->save();
        return redirect()->route('Productos.index')
        ->with('success', 'El Producto ha sido Modificado con exito');


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
        $producto = Productos::find($id);

        $producto->delete();
        return redirect()->route('Productos.index')
        ->with('success', 'El Producto ha sido Eliminado con exito');
    }
    
}
