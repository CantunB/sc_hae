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
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 5cm;
            background-color: #ffffff;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 5cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        h4 {
            color: #4f4866;
            font-weight: normal;
            font-size: 1px;
            font-family: Arial;
            text-transform: uppercase;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>REQ. NO.
    </title>
</head>
<body>
<header><br>
    <div class="container" >
        <div class="row">
            <div class="col-md-2" style="text-align: start ">
                <img src="{{ public_path('img/smapac-logo.png') }}" width="135" height="110" alt="A 200x200 image" class="img">
            </div>
            <div class="col-8 offset-2" style="text-align: center; color: #000000;">
                <strong>SISTEMA MUNICIPAL DE AGUA POTABLE Y ALCANTARILLADO DE CARMEN</strong><br>
                <strong>COORDINACIÓN ADMINISTRACIÓN Y FINANZAS</strong><br>
                <strong>UNIDAD DE RECURSOS MATERIALES</strong><br>
            </div>
            <div class="col-md-2 offset-10" style="text-align:right ">
                <img src="{{ public_path('img/carmen_logo.png') }}" width="100" height="110" alt="A 200x200 image" class="img">
            </div>
            <div class="row">
                <div class="col-12" style=" font-size:x-small; color: #000000; margin-top: 90px">
                    <br>
                    <strong>"2018, Año del Sesenta y Cinco Aniversario del Reconocimiento al Ejercicio del Derecho a Voto de las Mujeres Mexicanas"</strong>
                </div>
            </div>
        </div>

    </div>
</header>

<main>
    <div class="container col-md-10 table-responsive" style="margin-top: 200px">
        <div class="row-cols-xl-6">
                <div class="row" style="float: end">
                    <div class="col-md-4 col-md-offset-8" style="text-align:end; float: right">
                        <strong>REQ. NO. {{$compra[0]->requisition->folio}}
                        </strong>
                    </div>
                </div>
                <br>
                <div class="row" style="float: end">
                    <div class="col-4"  style="text-align:end; float: right">
                        <strong>
                            {{ Carbon\Carbon::parse($compra[0]->requisition->added_on)->format('d/m/Y')}}
                        </strong>
                    </div>
                </div>
                <br>
                <br>
                <div class="row justify-content-start">
                    <div class="col-8">
                        <label>
                            <strong>DIRECCIÓN:  </strong>{{ $compra[0]->requisition->management }}
                        </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-12">
                        <label>
                            <strong>COORDINACIÓN:  </strong>
                            {{$compra[0]->requisition->asignado[0]->user->asignado->areas->coordinations->name}}
                        </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-12">
                        <label>
                            <strong>DEPARTAMENTO:  </strong>
                            {{$compra[0]->requisition->asignado[0]->user->asignado->areas->departments->name}}
                        </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-8">
                        <label>
                            <strong>UNIDAD ADMINISTRATIVA:  </strong>
                            {{ $compra[0]->requisition->administrative_unit }}
                        </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-12">
                        <label>
                            <strong>
                                FECHA PARA REQUERIR MATERIAL:
                            </strong>
                            {{ Carbon\Carbon::parse($compra[0]->requisition->required_on)->format('d/m/Y')}}
                        </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-12">
                        <label>
                            <strong>ASUNTO:  </strong>
                            {{ $compra[0]->requisition->issue }}
                        </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-12">
                        <label>
                            <strong>PROGRAMA:</strong>
                        </label>
                    </div>
                </div>
                <div class="row col-md-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center "WIDTH="10"> <i>PARTIDA</i></th>
                            <th style="text-align: center "WIDTH="1"><i>CANTIDAD</i></th>
                            <th style="text-align: center "WIDTH="10"><i>UNIDAD</i></th>
                            <th style="text-align: center"><i>CONCEPTO</i></th>
                        </tr>
                        </thead>
                            <tbody>
                            @foreach($compra as $req)
                            <tr>
                                <td>
                                    {{$req->requested->departure }}
                                </td>
                                <td>
                                    {{$req->requested->quantity }}
                                </td>
                                <td>
                                    {{$req->requested->unit }}
                                </td>
                                <td>
                                    {{$req->requested->concept }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        <thead>
                        <th colspan="4">
                            <label> <strong>  Observaciones: </strong>
                                {{ $compra[0]->requisition->remark }}
                            </label>
                        </th>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
    </div>
</main>
{{--
<footer>
    <h6>www.styde.net</h6>
    <div class="row">
        <div class="row">
            <div class="col-md-4">
                SOLICITÓ <br>
                <label style="font-size: small">
                    ____________________<br>
                    <br>
                    Jefe del <br>

                </label>
            </div>
            <div class="col-md-4 offset-4">
                Vo.Bo. : .col-md-6
            </div>
            <div class="row-cols-md-4 offset-8">
                AUTORIZO: .col-md-6
            </div>
        </div>
    </div>
</footer>
--}}
</body>
</html>
