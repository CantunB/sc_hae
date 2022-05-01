<html>
<head>
    <title> {{$order->detail->order_folio ?? 'Orden de Compra'}} </title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #FFFFFF;
            color: black;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 3cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #FFFFFF;
            color: black;
            text-align: center;
            line-height: 30px;
        }
        #watermark {
            position: fixed;
            opacity: 0.3;

            /**
                Establece una posición en la página para tu imagen
                Esto debería centrarlo verticalmente
            **/
            bottom:   5cm;
            left:     0.5cm;

            /** Cambiar las dimensiones de la imagen **/
            width:    20cm;
            height:   20cm;

            /** Tu marca de agua debe estar detrás de cada contenido **/
            z-index:  -1000;
        }
        .linea {
            border-top: 1px solid rgb(0, 0, 0);
            height: 2px;
            max-width: 200px;
            padding: 0;
            margin: 50px auto 0 auto;
        }

        .centrado{
            text-align: center;
        }
    </style>
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  --}}

</head>
<body>
    <div id="watermark">
        <img src="{{ public_path('assets/images/logo_ayuntamiento.png') }}" height="100%" width="100%" />
    </div>
<header>
    <table style="border-collapse: collapse; width: 100%; height: 67px;">
        <tbody>
            <tr>
                <td style="width: 24%; text-align: center;border:none">
                    <div class="col">
                        <img src="{{ public_path('assets/images/logo_ayuntamiento.png') }}" width="100" height="100" class="rounded mx-auto d-block" alt="Ayuntamiento_image">
                    </div>
                </td>
                <td style="width: 51.2681%; text-align: center;border:none">
                    <div class="col-6">
                        <h2>H. Ayuntamiento de Escárcega 2022 </h2>
                    </div>
                </td>
                <td style="width: 24%; text-align: center;border:none ">
                    <div class="col">
                        <img src="{{ public_path('assets/images/logo_escarcega.png') }}" width="100" height="100" class="rounded mx-auto d-block" alt="Escarcega_image">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</header>

<main>
    <div class="container">
        <table style="width: 100%; font-size: x-small;">
            <tbody>
                <tr style="height: 2px;border:none">
                    <td style="width: 50%; height: 1px; border:none"></td>
                    <td style="width: 50%; height: 1px; border: none">
                        <div class="container">
                            <div class="row">
                                <p>
                                    <strong>
                                        ORDEN DE COMPRA No.<br>
                                    </strong>
                                    {{ $order->detail->order_folio ?? 'sin orden'}}
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    <strong>
                                        FECHA DE ELEBORACION:<br>
                                    </strong>
                                    {{Carbon\Carbon::parse($order->detail->created_at)->format('d/m/Y') ?? 'sin orden'}}

                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="border-collapse: collapse; width: 100%; height: 26px; font-size: x-small">
            <tbody>
                <tr style="height: 16px; border:none">
                    <td style="width: 100%; height: 26px; font-size: 8px; border:none">
                        <div class="container">
                            <p  style="text-align: start">
                                <strong>CON FUNDAMENTO EN EL NUMERAL 39, 41, 43, 45 Y DEMÁS RELATIVOS APLICABLES DE LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y PRESTACIÓN <br>
                                    DE SERVICIOS RELACIONADOS CON BIENES MUEBLES DEL ESTADO DE CAMPECHE Y UNA VEZ DETERMINADO LA MEJOR PROPUESTA MEDIANTE EL ANÁLISIS <br>
                                    DE PRECIO No. &nbsp;&nbsp; ___________________ &nbsp;&nbsp;  SE FORMALIZA EL PEDIDO A TRAVEZ DE LA SIGUIENTE ORDEN DE COMPRA No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $order->detail->requisition->folio ?? 'sin orden'}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; font-size: x-small;border:none">
            <tbody>
            <tr>
                <td style="width: 60%; border:none">
                    <div class="container">
                        <div class="col-md-12" >
                            <p style="text-align: start">
                                <strong> Proveedor: </strong>
                                        {{ $order->detail->provider->name ?? 'sin orden'}}
                                    <br>
                                <strong> Coordinacion: </strong>
                                        {{ $order->coordination->name ?? 'sin orden'}}
                                    <br>
                                <strong> Departamento: </strong>
                                        {{ $order->department->name ?? 'sin orden'}}
                                    <br>
                                <strong> Facturar a:  </strong>
                                    Honorable Ayuntamiento de Escarcega.
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>RFC: </strong>
                                    HMDOAS23123
                                    <br>
                                <strong> Domicilio: </strong>Centro, C.P. 24350
                            </p>
                        </div>
                    </div>
                </td>
                <td style="width: 40%; border:none">
                    <div class="container">
                        <div class="col-md-12" >
                            <p style="text-align: start">
                                <strong> RFC: </strong>
                                        Qualitas
                                    <br>
                                <strong> Unidad Administrativa: </strong>
                                        CAF
                                    <br>
                                <strong> No. De Requisicion: </strong>
                                        TI
                                    <br>
                                    <br>
                                    <br>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <table style="width: 100%; height: 122px;" border="1">
            <thead>
                <tr>
                    <th style="text-align: center; width: 5% "> <i>Part.</i></th>
                    <th style="text-align: center; width: 5%  "><i>Cant.</i></th>
                    <th style="text-align: center; width: 15%"><i>Unidad</i></th>
                    <th style="text-align: center; width: 42%" ><i>Concepto</i></th>
                    <th style="text-align: center; width: 15%"><i>Costo Uni.</i></th>
                    <th style="text-align: center; width: 13%"><i>Importe</i></th>
                </tr>
            </thead>
            <tbody>
            @foreach($materials as $key => $material)
                <tbody>
                <tr>
                    <td style="font-size: 10px; text-align: center ">{{$material->material->departure}}</td>
                    <td style="font-size: 10px; text-align: center ">{{$material->material->quantity}}</td>
                    <td style="font-size: 10px; text-align: center ">{{$material->material->unit}}</td>
                    <td style="font-size: 10px; text-align: start ">{{$material->material->concept}}
                        @if($loop->last)
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                            <table style="width: 100%;">
                                <td class="noBorder" style="text-align:center">
                                    SON: (  $ {{$material->material->total_order}} PESOS 00/100 M.N.)
                                </td>
                            </table>
                        @endif
                    </td>
                    <td style="font-size: 7px; text-align: center ">{{$material->material->unit_cost}}
                        @if($loop->last)
                            <br><br><br><br><br><br>
                            <TABLE style="width: 100%;">
                                <tr style="text-align:center">
                                    <td style=" border: inset 0pt">
                                        <div class="row justify-content-start">
                                            <div class="col-md-6">
                                                Desc:
                                            </div>
                                            <div class="col-md-6" style="text-align: right;">
                                                {{$material->material->p_disc}}%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="text-align:center">
                                    <td style=" border: inset 0pt">Sub-total</td>
                                </tr>
                                <tr style="text-align:center">
                                    <td style=" border: inset 0pt">
                                        I.V.A.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;border: inset 0pt">
                                        Total
                                    </td>
                                </tr>
                            </TABLE>
                        @endif
                    </td>
                    <td style="font-size: 7px; text-align: center ">{{$material->material->cost_quantity}}
                        @if($loop->last)
                            <br><br><br><br><br><br><br><br><br>
                            <TABLE border="0" style="width: 100%;">
                                <tr class="sinBorde">
                                    <td style=" border: inset 0pt">$ {{$material->material->subtotal}}</td>
                                </tr>
                                <tr>
                                    <td style=" border: inset 0pt">
                                        $ {{$material->material->iva}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" border: inset 0pt">
                                        $ {{$material->material->total_order}}
                                    </td>
                                </tr>
                            </TABLE>
                        @endif
                    </td>
                </tr>
                </tbody>
            @endforeach
            </table>
        <table style="width: 100%; height: 18px; font-size: x-small ;border:none">
            <tbody>
                <tr style="height: 18px;">
                    <td style="width: 50%; height: 18px; border:none">
                        <div class="container">
                            <p>
                                <strong>
                                    A) TIEMPO DE ENTREGA DEL BIEN O SERVICIO: <br>
                                </strong>
                                <strong>
                                    B) MATERIAL EN EXISTENCIA:<br>
                                </strong>
                                <strong>
                                    C) FORMA DE PAGO: <br>
                                </strong>
                                <strong>
                                    D) VIGENCIA DEL(0S) PRECIO(S):<br>
                                </strong>
                                <strong>
                                    E) OTRAS: <br><br>
                                </strong>
                                <label>
                                    <strong>
                                        Programa: <br>
                                    </strong>
                                    <strong>
                                        Aplicacion:<br>
                                    </strong>
                                    <strong>
                                        Vehículo <br>
                                    </strong>
                                </label>
                            </p>
                        </div>
                    </td>
                    <td style="width: 50%; height: 18px;font-size: x-small;border:none">
                        <div class="container">
                            <p>
                                <strong>
                                    {{$purchaseorder->purchasorder->feauture->delivery_time ?? 'N/A'}} <br>
                                </strong>
                                <strong>
                                    {{$purchaseorder->purchasorder->feauture->existence ?? 'N/A'}} <br>
                                </strong>
                                <strong>
                                    {{$purchaseorder->purchasorder->feauture->payment_method ?? 'N/A'}} <br>
                                </strong>
                                <strong>
                                    {{$purchaseorder->purchasorder->feauture->price_term ?? 'N/A'}} <br>
                                </strong>
                                <strong>
                                    {{$purchaseorder->purchasorder->feauture->other ?? 'N/A'}} <br><br>
                                </strong>
                                {{-- </p>
                                <p style="font-size: 7px;"> --}}
                                <label>
                                    <strong>
                                        {{$purchaseorder->purchasorder->feauture->program ?? 'N/A'}} <br>
                                    </strong>
                                    <strong>
                                        {{$purchaseorder->purchasorder->feauture->application ?? 'N/A'}}<br>
                                    </strong>
                                    <strong>
                                        {{$purchaseorder->purchasorder->feauture->vehicle ?? 'N/A'}} <br>
                                    </strong>
                                </label>
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; height: 18px; font-size: x-small;border:none">
            <tbody>
                <tr style="height: 18px; border:none; font-size: 10px">
                    <td style="width: 100%; height: 18px; border:none">
                        <div class="container">
                            <p>
                                <strong>
                                L.B.A.: Almacen &nbsp;&nbsp;&nbsp;&nbsp; Calle 33 No. 140, int. 1, entre 50 y 56, Col.
                                Pretolera. C.P. 24180. Cd. Del Carmen, Camp.
                                </strong>
                                <br>
                                {{--  @if($purchaseorder->purchasorder->type === 'OC2')  --}}
                                <strong>
                                    DADO LO ANTERIOR, SE DEBERÁ DE IGUAL MANERA ELABORAR CONTRATO POR ESCRITO DE CONFORMIDAD CON LOS NUMERALES 39, 49 Y RELATIVOS APLICACBLES DE LA LEY DE
                                    ADQUISICIONES, ARRENDAMIENTOS Y PRESTACIÓN DE SERVICIO RELACIONADOS CON BIENES MUEBLES DEL ESTADO DE CAMPECHE. <br><br>
                                </strong>
                            {{--  @endif  --}}
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<footer>
    <div class="container">
        <table style="width: 100%; height: 1px; margin-bottom: 10px font-size: x-small;border:none">
            <tbody>
                <tr>
                    <td style="width: 33.3333%;border:none">
                        <div class="col">
                            <div class="centrado">
                                <strong>Vo.Bo</strong>
                                <div class="linea"></div>
                                <p>Titular de</p>
                            </div>
                        </div>
                    </td>
                    <td style="width: 33.3333%;border:none">
                        <div class="col">
                            <div class="col">
                                <div class="centrado">
                                    <strong>Reviso</strong>
                                    <div class="linea"></div>
                                    <p>Titular de </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="width: 33.3333%;border:none">
                        <div class="col">
                            <div class="col">
                                <div class="centrado">
                                    <strong>Autorizo</strong>
                                    <div class="linea"></div>
                                    <p>Director General</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="border-collapse: collapse; width: 100%; margin-top: 10px ;border:none" >
            <tbody>
                <tr>
                    <td style="width: 100%;">
                        <p>
                        Nota: Esta Orden de Compra no será válida si presenta tachaduras, enmendaduras o borraduras y si no presenta nombre y firma de recibido correspondiente.<br>
                        ANEXOS: Requisición, 1 Cotización. <br>
                        Original: Contabilidad   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Copias: Proveedor, Compras y Almacén.
                    </p></td>
                </tr>
            </tbody>
        </table>
    </div>
</footer>
</body>
</html>
