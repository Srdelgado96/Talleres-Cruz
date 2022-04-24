<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Productos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\db;
use Barryvdh\DomPDF\Facade\Pdf;
class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session::put('pagActual', 'Facturas');
        $TodasFacturas = Factura::all();
       
        return view('Factura.indexFacturas', compact('TodasFacturas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $TodosClientes = Cliente::all();
        $TodosProductos = Productos::all();
        return view('Factura.nuevoFactura', compact('TodosClientes', 'TodosProductos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
        //
    }

    public function pdf($id)
    {
       
        $Factura = Factura::find($id);
        $TodosProductosEnFactura = DB::select(
        "select * from productos where id IN(select producto_id FROM `item_prods` WHERE factura_id=". $id.")");

           

        $pdf = PDF::loadView('layouts.PDFplantilla', compact('Factura', 'TodosProductosEnFactura'));

        return $pdf->stream('pruebapdf.pdf');
    }

}
