<html>
<head>
    <title> {{$requisition->folio}} </title>
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
            //background-color: #2a0927;
            background-color: #FFFFFF;
            color: black;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 2cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            //background-color: #2a0927;
            color: black;
            text-align: center;
            line-height: 1px;
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
          table.table-bordered{
            border:1px solid black;
            margin-top:20px;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td {

            border-top: 0px;
            border-right: 1px solid black;
            border-bottom: 0px;
            border-left: 0px;
        }
        table.table-bordered > tfoot > tr > th{
            border:1px solid black;
        }
        td {
            padding: 5px;
            border-top: 0px;
            border-right: 0px;
            border-bottom: 1px solid black;
            border-left: 0px;
        }
    </style>
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  --}}
    {{--  <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css') }}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  --}}

</head>
<body>
    <div id="watermark">
        <img src="{{ public_path('assets/images/logo_ayuntamiento.png') }}" height="100%" width="100%" />
    </div>
<header>
    <table style="width: 100.546%; height: 70px;">
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
    <p>&nbsp;</p>
    <p style="text-align: right;">
        {{$requisition->folio}}
    </p>
    <p style="text-align: right;">
        {{Carbon\Carbon::parse($requisition->added_on)->format('d/m/Y')}}
    </p>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-6">
                <p>
                    <strong>DIRECCIÓN:  </strong>
                    {{ $requisition->management }}
                    <br>
                    <strong>COORDINACIÓN:  </strong>
                    {{$requisition->coordinations->name}}
                    <br>
                    <strong>DEPARTAMENTO:  </strong>
                    {{$requisition->departments->name}}
                    <br>
                    <strong>UNIDAD ADMINISTRATIVA:  </strong>
                    {{ $requisition->administrative_unit }}
                     <br>
                    <strong>FECHA PARA REQUERIR MATERIAL: </strong>
                         {{ Carbon\Carbon::parse($requisition->required_on)->format('d/m/Y')}}
                        <br>
                    <strong>ASUNTO:  </strong>
                    {{ $requisition->issue }}
                    <br>
                    <strong>PROGRAMA:</strong>
                  </p>
            </div>
        </div>
    </div>

    <table style="border-collapse: collapse; width: 100%; height: 90px;" border="1" class="table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">PARTIDA</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">UNIDAD</th>
                <th scope="col">CONCEPTO</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($requisition->requesteds as $req)
                <tr>
                    <td style="text-align: center;">{{$req->departure }}</td>
                    <td style="text-align: center;">{{ $req->quantity}}</td>
                    <td style="text-align: center;">{{$req->unit }}</td>
                    <td style="">{{$req->concept }}</td>
                </tr>
            @endforeach
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: center; font-size: x-small">
                        <strong>XXX ESPACIO CANCELADO XXX</strong>
                </td>
            </tr>
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            @endfor
        </tbody>
            <tfoot>
                <tr>
                <th colspan="4">
                    <label> <strong>  OBSERVACIONES: </strong>
                        {{ $requisition->remark }}
                    </label>
                </th>
                </tr>
        </tfoot>
    </table>
</main>

<footer>
    <div class="container">
        <table style="width: 99.8179%; height: 1px;">
            <tbody>
                <tr>
                    <td style="width: 33.3333%;border:none">
                        <div class="col">
                            <div class="centrado">
                                <strong>SOLICITÓ</strong>
                                <div class="linea"></div>
                                <p>Jefe del Departamento </p>
                            </div>
                        </div>
                    </td>
                    <td style="width: 33.3333%;border:none">
                        <div class="col">
                            <div class="col">
                                <div class="centrado">
                                    <strong>Vo.Bo.</strong>
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
                                    <strong>AUTORIZÓ</strong>
                                    <div class="linea"></div>
                                    <p>Director General</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</footer>
</body>
</html>
