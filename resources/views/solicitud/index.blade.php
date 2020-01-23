@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Solicitudes'))

</div>
<div class="container-fluid">
    @if (!empty($guias_pendientes))
    <p class="h3" style="color: #ED7624">
        Materia: <span class="font-weight-normal">{{ $guias_pendientes[0] -> MAT_ABREVIATURA }}</span>
    </p>
    @endif
    @if (session('title') && session('subtitle'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">{{ session('title') }}</h4>
            <p>{{ session('subtitle') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <a href="{{ url('solicitud/create') }}" class="btn btn-success mb-2">Crear Solicitud</a>
    <a href="{{ url('guia/regresarListarGuia/'.$materia_guia[0]->DOC_CODIGO) }}" class="btn btn-danger mb-2">Regresar a Guías y Solicitudes</a>

    <table id="ListTable" class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th scope="row"># Solicitud</th>
                <th scope="row">Fecha de uso</th>
                <th scope="row">Tema</th>
                <th scope="row">Laboratorio</th>
                <th scope="row">PDF</th>
                <th scope="row">Estado</th>
                <th scope="row">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if($solicitud != null)
                <input type="hidden" value="{{$cont=1}}">
                @foreach ($solicitud as $sol)
                <tr>
                    <td scope="row">{{$cont++}}</td>
                    <td scope="row">{{$sol->SOL_FECHA_USO}}</td>
                    <td scope="row">{{$sol->SOL_TEMA_PRACTICA}}</td>
                    <td scope="row">{{$sol->laboratorio->LAB_NOMBRE}}</td>
                    <td class="text-center" scope="row">
                        <a href="{{url('reporte/pdfSolicitud/'.$sol->SOL_CODIGO)}}" class="btn btn-info mb-2"><span class="oi oi-print"></span></a>
                    </td>
                    <td class="h3 text-center" scope="row">
                    @if($sol->SOL_ESTADO == 1)
                        <span class="badge badge-success">Entregado</span>
                    @else
                        <span class="badge badge-danger">Pendiente</span>
                    @endif
                    </td>
                    <td>
                        @if($sol->SOL_ESTADO == 1)
                        @else
                        @if($cont == 2)
                            <div class="btn-group" role="group"  style="text-align: center;">
                                <a href="{{url('solicitud/'.$sol->SOL_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
                                <a href="{{url('solicitud/'.$sol->SOL_CODIGO.'/destroy')}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
                            </div>
                        @endif
                    @endif
                    </td>
                </tr>
                @endforeach
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
                @if ($guiap -> CON_EXTRA !== 1)
                @else
                    <td scope="row">{{$guiap -> CON_DIA}}</td>
                    <td scope="row">
                        <b>OCASIONAL</b>
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
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection()