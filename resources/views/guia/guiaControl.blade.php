@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Guías'))

<div class="container-fluid">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="h4 alert-heading">
            <b>ADVERTENCIA:</b> Existen {{ $pendientes }} Guías Pendiente de Entregar y {{ $por_crear }} Guias Pendientes por Crear.
            <br>
            - Por favor, revise el detalle al final de esta pantalla
        </p>
    </div>

    @if (session('title') && session('subtitle'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">{{ session('title') }}</h4>
            <p>{{ session('subtitle') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (!empty($guias_pendientes))
    <p class="h3" style="color: #ED7624">
        Materia: <span class="font-weight-normal">{{ $guias_pendientes[0] -> MAT_ABREVIATURA }}</span>
    </p>
    @endif

    <a href="{{url('guia/crearGuiaIndex')}}" class="btn btn-success mb-2">Crear Guías</a>
    <a href="{{url('guia/regresarListarGuia/'.$materia_guia[0]->DOC_CODIGO)}}" class="btn btn-danger mb-2 float-center">Regresar a Guías y Solicitudes</a>

    <table id="ListTable" class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th scope="row">Guías Número</th>
                <th scope="row">Fecha</th>
                <th scope="row">Tema</th>
                <th scope="row">Laboratorio</th>
                <th scope="row">PDF</th>
                <th scope="row">Estado</th>
                <th scope="row">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($guias_terminadas))
            @for ($i=sizeof($guias_terminadas)-1;$i>=0;$i--)
            <tr>
                <td scope="row">{{$guias_terminadas[$i] -> GUI_NUMERO}}</td>
                <td scope="row">{{$guias_terminadas[$i] -> GUI_FECHA}}</td>
                <td scope="row">{{$guias_terminadas[$i] -> GUI_TEMA}}</td>
                <td scope="row">{{$guias_terminadas[$i] -> LAB_NOMBRE}}</td>
                <td class="text-center" scope="row">
                    <a href="{{url('guia/pdfGuia/'.$guias_terminadas[$i]->GUI_CODIGO)}}" class="btn btn-info mb-2"><span class="oi oi-print"></span></a>
                </td>
                <td class="h3 text-center" scope="row">
                @if($guias_terminadas[$i]->GUI_REGISTRADO == 1)
                    <span class="badge badge-success">Entregada</span>
                @else
                    <span class="badge badge-danger">Pendiente</span>
                @endif
                </td>
                <td scope="row">
                <!-- {{ $valido = 0 }} -->
                @for ($j=$i+1;$j<=sizeof($guias_terminadas)-1;$j++)
                    @if($guias_terminadas[$j]->GUI_REGISTRADO == 1)
                        <!-- {{ $valido = 0 }} -->
                    @else
                        <!-- {{ $valido = 1 }} -->
                        <!-- {{ $j = sizeof($guias_terminadas) }} -->
                    @endif
                @endfor

                @if($valido == 0)
                    <div class="btn-group" role="group">
                        <a href="{{url('guia/'.$guias_terminadas[sizeof($guias_terminadas)-1]->GUI_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
                        <a href="{{url('guia/'.$guias_terminadas[sizeof($guias_terminadas)-1]->GUI_CODIGO.'/destroy')}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
                    </div>
                @else
                @endif
                </td>
                </tr>
            @endfor
        @endif
        </tbody>
    </table>

    <br><hr><br>

    <h2 class="pb-3">Detalle de Asignación y uso de Laboratorio</h2>
    <table id="ListTable2" class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th scope="row">Fecha</th>
                <th scope="row">Tipo</th>
                <th scope="row">Horas Asignadas</th>
                <th scope="row">Hora de entrada</th>
                <th scope="row">Hora de salida</th>
                <th scope="row">Guia entregada</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($guias_pendientes as $guiap)
            <tr>
                <td scope="row">{{$guiap -> CON_DIA}}</td>
                <td scope="row">
                    @if ($guiap -> CON_EXTRA !== 1)
                        HORARIO
                    @else
                        <b>OCASIONAL</b>
                    @endif
                </td>
                <td scope="row">{{$guiap -> CON_NUMERO_HORAS}}</td>
                <td scope="row">{{$guiap -> CON_HORA_ENTRADA}}</td>
                <td scope="row">{{$guiap -> CON_HORA_SALIDA}}</td>
                <td scope="row" class="h3 text-center">
                @if($guiap ->CON_EXTRA == 1  || $guiap->CON_REG_FIRMA_ENTRADA == null)
                    ****
                @else
                    @if ($guiap -> CON_GUIA !== 1)
                        <span class="badge badge-danger">Pendiente</span>
                    @else
                        <span class="badge badge-success">Entregada</span>
                    @endif
                @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection