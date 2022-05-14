<?php

namespace App\Http\Controllers;


use App\Models\Averia;
use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function LoginCliente()
    {

        return view('AreaCliente.loginCliente');
    }


    public function areaClienteAverias()
    {
        // $email = $_GET['email'];
        // $pass = $_GET['password'];
        session::put('pagActual', 'Mis Averia');
        session::put('emailCliente', 'ana@gmail.com');
        session::put('dniCliente', '49778053G');
        $email = "ana@gmail.com";
        $dni = "49778053G";
        //$password = bcrypt($pass);

        $TodosClientes = Cliente::where('dni', $dni)->where('email', $email)->get();
        $clienteID = $TodosClientes[0]->id;
        $cliente = Cliente::find($clienteID);
        $TodasAverias = Averia::where('cliente_id', $clienteID)->orderBy('id', 'desc')->get();
        //dd($AveriasCliente);
        return view('AreaCliente.indexAreaCliente', compact('TodasAverias', 'TodosClientes', 'cliente'));
    }

    public function areaClienteFacturas()
    {
        // $email = $_GET['email'];
        // $pass = $_GET['password'];
        session::put('pagActual', 'Mis Facturas');;
        //$password = bcrypt($pass);

        $TodosClientes = Cliente::where('dni', Session('dniCliente'))->where('email', Session('emailCliente'))->get();
        $clienteID = $TodosClientes[0]->id;
        $cliente = Cliente::find($clienteID);
        $TodasFacturas = Factura::where('cliente_id', $clienteID)->orderBy('id', 'desc')->get();
        //dd($AveriasCliente);
        return view('AreaCliente.facturasCliente', compact('TodasFacturas', 'cliente'));
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
}
