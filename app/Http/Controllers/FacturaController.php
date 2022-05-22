<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Productos;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\db;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

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
        //Creamos una factura solo con los datos del request
        //dd($request);
        $factura = new Factura;
        $factura->concepto = $request->concepto;
        $factura->averia_id = $request->averia_id;
        $factura->cliente_id = $request->cliente_id;
        $factura->fecha_Creacion = date('Y-m-d');
        $factura->save();
        //seleccionamos el id de la ultima factura que acabos de guardar
        $productos = $request->ArrayProductosId;
        $unidades = $request->ArrayUnidades;
        // //dd($productos);
        $Factura_id = Factura::max("id");
        //dd($Factura_id);

        for ($i = 0; $i < count($productos); $i++) {
            $precioDelProducto = Productos::select('precio')->where('id', $productos[$i])->first();
            $unidadesDelProducto = $unidades[$i];
            //dd($unidadesDelProducto);
            $query = "INSERT INTO item_prods(precio,unidades,factura_id,producto_id) VALUES ($precioDelProducto->precio,$unidadesDelProducto,$Factura_id,$productos[$i])";
            //dd($query);
            $results = DB::insert($query);

            //dd($Ultimafactura);
        }
        $query = "select SUM(precio) as Total ,ROUND(SUM(precio/1.21),2) as SUBTOTAL from productos where id IN(select producto_id FROM `item_prods` WHERE factura_id=$Factura_id)";
        $ObtenerTotalYSubtotalParaFactura = DB::select($query);
        $TotalYSubtotalParaFactura = $ObtenerTotalYSubtotalParaFactura[0];
        $query = "UPDATE facturas SET subtotal = '$TotalYSubtotalParaFactura->Total', total = '$TotalYSubtotalParaFactura->SUBTOTAL', pagado = 'NO' WHERE id = $Factura_id";
        $FinCreacionFactura = DB::update($query);
        //$pdf = $this->Generar_pdf($Factura_id); 
        $cliente = Cliente::find($request->cliente_id);
        $EmailCliente = $cliente->email;
        $Factura = Factura::find($Factura_id);
        $TodosProductosEnFactura = DB::select("select * from productos where id IN(select producto_id FROM `item_prods` WHERE factura_id=" . $Factura->id . ")");
        $pdf = PDF::loadView('layouts.PDFplantilla', compact('Factura', 'TodosProductosEnFactura'));
        $data = [];
        Mail::send('email.email', $data, function ($message) use ($pdf) {
            $message->from('delgadogarridoalejandro@gmail.com')
                ->to('alex-96recre@hotmail.com')
                ->subject('Factura de la Avería')
                ->attachData($pdf->output(), "TalleresCruz.pdf");
        });
        return redirect()->route('Facturas.index')->with('success', 'Se ha Actualizado Correctamente');
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
        $Factura = Factura::find($id)->first();

        $Factura->delete();
        return redirect()->route('Facturas.index')
            ->with('success', 'La Factura ha sido Eliminada con Exito');
    }
    public function pagadaFactura($id)
    {

        $Factura = Factura::find($id)->first();
        $Factura->pagado = "SI";
        $Factura->save();
        return redirect()->route('Facturas.index')
            ->with('success', 'La Factura ha sido Eliminada con Exito');
    }



    /**
     * Generar_pdf
     *
     * @param  mixed $id
     * @return void
     */
    public function Generar_pdf($id)
    {
        $Factura = Factura::find($id);
        $TodosProductosEnFactura = DB::select("select * from productos where id IN(select producto_id FROM `item_prods` WHERE factura_id=" . $Factura->id . ")");
        //dd($TodosProductosEnFactura);
        $pdf = PDF::loadView('layouts.PDFplantilla', compact('Factura', 'TodosProductosEnFactura'));
        return $pdf->stream('Factura.pdf');
    }


    /**
     * listarAveriasParaNuevaFactura
     *
     * @param  mixed $id
     * @return void
     */
    public function listarAveriasParaNuevaFactura($id)
    {
        // DEBO RECIBIR EL ID DEL VEHICULO,ENCONTRAR EL VEHICULO Y CON EL MISMO ID QUE HE RECIBIDO ENCONTRAR EL CLIENTE
        //select * from vehiculos where 'id'=6

        $vehiculo = Vehiculo::where('id', $id)->first();
        //dd($vehiculo);


        $cliente = Cliente::where('id', $vehiculo->cliente_id)->first();
        $TodasAverias = DB::select(
            "SELECT * from averias
            where id not in
            (select averia_id
            from facturas) and cliente_id=$cliente->id and vehiculo_id=$vehiculo->id"
        );
        $options = "";
        foreach ($TodasAverias as $averia) {

            $options .= "<option value='" . $averia->id . "'>" . $averia->nombre . "</option>";
        }
        if (empty($options)) {
            $options = "<option value='p'>Ninguna Sin Facturar</option>";
        }
        return $options;

        //dd($TodasAverias);
    }
}
