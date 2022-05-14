<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDF Factura</title>

    <style>
        .infoempresa {
            text-align: left;

        }

        .infocliente {
            text-align: right;
            margin: 2%;
        }

        .tabladesglose {
            margin-left: 16px;
        }

        body {

            color: #000000;
            font-size: .86rem;
            font-weight: bold;

        }



        .main {
            margin-left: 320px;
        }

        .tablaDatos,
        td {
            text-align: center;
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .tablaDatos {
            width: 100%;
            margin: 2%;
        }

        tr td {
            font-size: .78rem;
            text-align: center;
            width: auto;
        }

        tr th {
            font-size: .75rem;
            text-transform: uppercase;
            text-align: center;
            width: auto;
        }



        .footer {
            text-align: center;
            font-size: .78rem;
            padding: 10px;
        }

        .tabladesglose {
            width: 50%;
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        }

        #firmaCliente {
            border: 2px solid black;
        }

    </style>

</head>

<body>
    <div>
        Fecha
        <strong>{{ Date('d/m/Y', strtotime($Factura->averia->fecha_finalizacion)) }}</strong>
        <br>
        <span> <strong>Pagado: {{ $Factura->pagado }}</strong></span>

    </div>
    <div class="infocliente"><img src="images/logotaller.png" alt="logo"
            style="width: 11rem;height: 5rem !important;"></div>

    <div class="infoempresa">
        <h3>De:</h3>
        <div>
            <strong>Talles Cruz S.L.</strong>
        </div>
        <div>Calle Muñoz de Vargas</div>
        <div>21006 Huelva, España</div>
        <div>Email: christianperez409@gmail.com</div>
        <div>Telefono : 672 118 618</div>
    </div>

    <div class="infocliente">
        <h3>Para:</h3>
        <div>
            <strong> Nombre: {{ $Factura->cliente->nombre }}</strong>
        </div>
        <div>DNI: {{ $Factura->cliente->dni }}</div>
        <div>Direccion : {{ $Factura->cliente->direccion }} </div>
        <div>Email: {{ $Factura->cliente->email }}</div>
        <div>Telefono: {{ $Factura->cliente->telefono }}</div>
    </div>


    <table class="tablaDatos">
        <thead>
            <tr>
                <th scope="col" width="2%" class="center">Codigo</th>
                <th scope="col" width="20%">Producto</th>
                <th scope="col" width="50%">Precio</th>

        </thead>
        <tbody>
            {{-- CADA PIEZA DE LA FACTURA CONSULTA BASE DATOS DESDE EL CONTROLADOR --}}
            @foreach ($TodosProductosEnFactura as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>

                    <td><strong>{{ round($producto->precio, 2) }} </strong></td>

                </tr>
            @endforeach

        </tbody>
    </table>



    <div clas="divTabalaDesglose">
        <table class="tabladesglose">
            <tbody>
                <tr>
                    <td>
                        <strong>Subtotal</strong>
                    </td>
                    <td> {{ $Factura->subtotal }} </td>
                </tr>
                <tr>
                    <td>
                        <strong>IVA (21%)</strong>
                    </td>
                    <td>{{ $Factura->subtotal }}</td>
                </tr>
                <tr>
                    <td>
                        <strong>Total</strong>
                    </td>
                    <td>
                        <strong>{{ $Factura->total }}</strong>
                    </td>

                </tr>
                {{-- <p>    total en su moneda <strong>({{$Factura->cliente->moneda}}) </strong>: {{$importeDivisa}}</p> --}}
            </tbody>
        </table>
    </div>

    <div>
        <p> Cuenta Bancaria: ES80 3187 0069 7355 7213 1620</p>
    </div>





    <div class="observaciones">
        <p>
            Las reparaciones reflejadas en la presente factura, inlcuido los gastos de mano de obra contaran

            con una garantía de 3 meses o 2000km desde la fecha de entrega de la misma. Para vehículos
            industriales seran de 15 dias o 2000km. La garantía afecta a las piezas reflejadas en esta factura
            En conformidad con lo que establece la ley Organica 15/199 de proteccion de datos, sus datos
            solo seran tratados par confeccionar esta factura y posterior archivo. <br><br>
            El cliente acepta que en caso de no abonar la totalidad de la factura, dejará el vehiculo como
            depósito
            en el taller hasta la totalidad del pago. Si el vehículo después de ser reparado permanece más de 7
            días
            en el interior, se empezará a cobrar 23.19 euros por cada día de estacionamiento en el interior del
            taller
            La empresa no se hace responsable de los objetos personales perdidos.
        </p>
    </div>
    <br> <br>
    <div class="infocliente" style="width: 30% !important;">
        <label for="firmaCliente">Firma Cliente</label>
        <br>
        <textarea name="firmaCliente" id="firmaCliente"></textarea>
    </div>





    <div class="footer container-fluid mt-3 bg-light">
        <div class="row">
            <div class="col footer-app"> Gracias Por Su Confianza· <span class="brand-name"></span>
            </div>
        </div>
    </div>
</body>

</html>
