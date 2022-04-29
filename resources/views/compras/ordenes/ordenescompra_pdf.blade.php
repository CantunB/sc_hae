<html>
<head>
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
            top: 2.5cm;
            left: 0cm;
            right: 0cm;
            height: 3.5cm;
            background-color: #ffffff;
            color: black;
            text-align: center;
            line-height: 20px;
            font-size: x-small;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4.5cm;
            background-color: #ffffff;
            color: black;
            text-align: center;
            font-size: x-small;
        }
        h4 {
            color: #4f4866;
            font-weight: normal;
            font-size: 1px;
            font-family: Arial;
            text-transform: uppercase;
            font-size: x-small;
        }
        .noBorder {
            border:none !important;
        }
        .sinBorde td {border: 0; border-bottom:1px solid #000}
    </style>
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
        .tg .tg-7btt{border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
        .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
        .tg .tg-fymr{border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
        @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
</head>
<body>
<header><br>
    <div class="container" >
        <div class="row justify-content-start " style="font-size: x-small; text-align:center">
            <div class="col-md-2">
                <img src="{{ public_path('img/smapac-logo.png') }}" width="100" height="50" alt="A 200x200 image" class="img">
            </div>
            <div class=" row justify-content-start d-inline-blocks col-md-8 offset-2" style="font-size: x-small;float-left" >
                <p style="font-size: 10px; text-align: center">
                    <strong>
                        SISTEMA MUNICIPAL DE AGUA POTABLE Y ALCANTARILLADO DE CARMEN <br>
                        Coordinación de Administración y Finanzas<br>
                    </strong>

                    Unidad de Recursos Materiales<br>
                    "2020, Año de Leona Vicario, Benemerita Madre de la Patria"<br>
                </p>
            </div>
            <div class="col-md-8 offset-4" style="float-left" >
                <div class="col-md-4 offset-8" style="float-left">
                    <img src="{{ public_path('img/carmen_logo.png') }}" width="50" height="70" alt="A 200x200 image" class="img"><br>
                </div>
                <div class="col-md-8 offset-7" style="float-left; font-size: 8px">
                    <label style="font-size: 8px">
                        FORMATO SMAPAC-CAF/OC1-2021.V.1
                    </label>
                </div>
            </div>
        </div>

    </div>
</header>

<main>
    <div class="container col-md-10 table-responsive" style="margin-top: 225px">
        <div class="row justify-content-start d-inline-blocks" style="font-size: x-small">
            <div class="col-md-6 offset-6" style="float-left" >
                <p style="font-size: 9px ">
                    <strong>
                        ORDEN DE COMPRA No.<br>
                    </strong>
                    <strong>
                        FECHA DE ELEBORACION:<br>
                    </strong>
                </p>
            </div>
            <div class="col-md-12">
                <div class="col-md-6 offset-9" style="float-left">
                    <p style="font-size: 9px ">
                        <strong>{{$purchaseorder->purchasorder->detail->order_folio}}</strong><br>
                        <strong>{{Carbon\Carbon::parse($purchaseorder->purchasorder->detail->created_at)->locale('es')->translatedFormat('j \\d\\e F \\d\\e Y')}}</strong><br>
                    </p>
                </div>
                <div class="row col-md-12">
                    <p  style="font-size: 7px; text-align: start">
                        <strong>CON FUNDAMENTO EN EL NUMERAL 39, 41, 43, 45 Y DEMÁS RELATIVOS APLICABLES DE LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y PRESTACIÓN <br>
                            DE SERVICIOS RELACIONADOS CON BIENES MUEBLES DEL ESTADO DE CAMPECHE Y UNA VEZ DETERMINADO LA MEJOR PROPUESTA MEDIANTE EL ANÁLISIS <br>
                            DE PRECIO No. &nbsp;&nbsp; {{$purchaseorder->purchasorder->detail->analysis_folio}} &nbsp;&nbsp;  SE FORMALIZA EL PEDIDO A TRAVEZ DE LA SIGUIENTE ORDEN DE COMPRA No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$purchaseorder->purchasorder->detail->order_folio}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                    </p>
                </div>
                <div class=" row justify-content-start d-inline-blocks" style="font-size: x-small;text-align: start">
                    <div class="col-md-12" >
                        <p style="font-size: 7px; text-align: start">
                            <strong>
                                Proveedor: <br>
                            </strong>
                            <strong>
                                Coordinacion: <br>
                            </strong>
                            <strong>
                                Departamento: <br>
                            </strong>
                            <strong>
                                Facturar a: Sistema Municipal de Agua Potable y Alcantarillado de Carmen. &nbsp;&nbsp;&nbsp;&nbsp;RFC:SMA860206225 <br>
                            </strong>
                            <strong>
                                Domicilio: Calle 33 No. 144, int. 1, entre 50 y 56, Col. Pretolera. C.P. 24180
                            </strong>
                        </p>
                    </div>
                    <div class="col-md-4 offset-1" style="float-left">
                        <p style="font-size: 7px;text-align: start">
                            <strong>
                                {{$purchaseorder->purchasorder->detail->provider->name}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->detail->coordination}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->detail->department}} <br>
                            </strong>
                        </p>
                    </div>
                    <div class="col-md-4 offset-4" style="float-left">
                        <p style="font-size: 7px;text-align: start">
                            <strong>
                                &nbsp;&nbsp;&nbsp;R.F.C.: <br>
                            </strong>
                            <strong>
                                &nbsp;&nbsp;&nbsp;Unidad Administrativa: <br>
                            </strong>
                            <strong>
                                &nbsp;&nbsp;&nbsp;No. De Requisicion: <br>
                            </strong>
                        </p>
                    </div>
                    <div class="col-md-4 offset-6" style="float-left">
                        <p style="font-size: 7px;text-align: start">
                            <strong>
                                {{$purchaseorder->purchasorder->detail->provider->rfc}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->detail->unit_administrative}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->detail->requisition->folio ?? 'N/A'}}
                            </strong>
                        </p>
                    </div>
                </div>
                <div class="col-md-12 table-sm" style="position:absolute; top:160px; left:10">
                    <table class="table table-bordered"  style="width:100%;">
                        <thead>
                        <tr>
                            <th style="font-size:7px ;text-align: center; width: 5% "> <i>Part.</i></th>
                            <th style="font-size:7px ;text-align: center; width: 5%  "><i>Cant.</i></th>
                            <th style="font-size:7px ;text-align: center; width: 15%"><i>Unidad</i></th>
                            <th style="font-size:7px ;text-align: center; width: 42%" ><i>Concepto</i></th>
                            <th style="font-size:7px ;text-align: center; width: 15%"><i>Costo Uni.</i></th>
                            <th style="font-size:7px ;text-align: center; width: 13%"><i>Importe</i></th>
                        </tr>
                        </thead>
                        @foreach($materials as $key => $material)
                            <tbody>
                            <tr>
                                <td style="font-size: 7px; text-align: center ">{{$material->material->departure}}</td>
                                <td style="font-size: 7px; text-align: center ">{{$material->material->quantity}}</td>
                                <td style="font-size: 7px; text-align: center ">{{$material->material->unit}}</td>
                                <td style="font-size: 7px; text-align: start ">{{$material->material->concept}}
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
                </div>

                <div class="row justify-content-start" style="font-size: x-small;position: absolute; margin-bottom:25px">
                    <div class="col-md-12">
                        <p style="font-size: 7px ">
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
                            <label style="font-size: 7px;">
                                <strong>
                                    Programa: <br>
                                </strong>
                                <strong>
                                    Aplicacion:<br>
                                </strong>
                                <strong>
                                    Vehículo <br>
                                </strong>
                                <strong>
                                    L.B.A.: Almacen del SMAPAC &nbsp;&nbsp;&nbsp;&nbsp; Calle 33 No. 140, int. 1, entre 50 y 56, Col.
                                    Pretolera. C.P. 24180. Cd. Del Carmen, Camp. <br>
                                </strong>
                                @if($purchaseorder->purchasorder->type === 'OC2')

                                    <strong>
                                        DADO LO ANTERIOR, SE DEBERÁ DE IGUAL MANERA ELABORAR CONTRATO POR ESCRITO DE CONFORMIDAD CON LOS NUMERALES 39, 49 Y RELATIVOS APLICACBLES DE LA LEY DE
                                        ADQUISICIONES, ARRENDAMIENTOS Y PRESTACIÓN DE SERVICIO RELACIONADOS CON BIENES MUEBLES DEL ESTADO DE CAMPECHE. <br><br>
                                    </strong>
                                @endif
                            </label>
                        </p>
                    </div>
                    <div class="col-md-6 offset-4" style="float-left">
                        <p style="font-size: 7px;">
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->delivery_time}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->existence}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->payment_method}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->price_term}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->other}} <br>
                            </strong>
                            {{-- </p>
                            <p style="font-size: 7px;"> --}}
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->program}} <br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->application}}<br>
                            </strong>
                            <strong>
                                {{$purchaseorder->purchasorder->feauture->vehicle}} <br>
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>

    <div class="row justify-content-start " style="font-size: x-small;">
        <div class="col-md-12 offset-1" style="font-size: x-small;">
            <div class="col-md-4" style="font-size: x-small; text-align:center;">
                <p style="font-size: 7px ">
                    <strong>
                        Vo.Bo<br><br>
                    </strong>
                    ________________________________<br>
                    <strong>
                        {{ $coordinador }}<br>
                        Titular de la Coordinación de Administración y Finanzas
                    </strong>
                </p>
                </p>
            </div>
            <div class=" row justify-content-start d-inline-blocks">
                <div class="col-md-12" style="font-size: x-small; text-align: start">
                    <p style="font-size: 7px ">
                        <br><br>
                    </p>
                    <p style="font-size: 7px ">
                        Nota: Esta Orden de Compra no será válida si presenta tachaduras, enmendaduras o borraduras y si no presenta nombre y firma de recibido correspondiente.<br>
                        ANEXOS: Requisición, 1 Cotización. <br>
                        Original: Contabilidad   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Copias: Proveedor, Compras y Almacén.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 offset-4" style="font-size: x-small;" >
            <p style="font-size: 7px ">
                <br><br>
                <strong>
                    Revisó<br><br>
                </strong>
                ________________________________<br>
                <strong>
                    {{ $titular }}<br>
                    Titular de la Unidad de Recursos Materiales
                </strong>
            </p>
        </div>
        <div class="col-md-4 offset-7 " style="font-size: x-small;">
            <p style="font-size: 7px ">
                <strong>
                    Autorizó<br><br>
                </strong>
                ________________________________<br>
                <strong>
                    {{$director}}<br>
                    Director General
                </strong>
            </p>
            <div class=" row justify-content-start d-inline-blocks">
            </div>
        </div>

    </div>

</footer>
</body>
</html>
