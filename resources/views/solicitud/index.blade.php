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
        @if(!empty($solicitudes))
            @foreach ($solicitudes as $solicitud)
            <tr>
                <td scope="row">{{$solicitud->SOL_NUMERO}}</td>
                <td scope="row">{{$solicitud->SOL_FECHA_USO}}</td>
                <td scope="row">{{$solicitud->SOL_TEMA_PRACTICA}}</td>
                <td scope="row">{{$solicitud->laboratorio->LAB_NOMBRE}}</td>
                <td class="text-center" scope="row">
                    <a href="{{url('reporte/pdfSolicitud/'.$solicitud->SOL_CODIGO)}}" class="btn btn-info mb-2"><span class="oi oi-print"></span></a>
                </td>
                <td class="h3 text-center" scope="row">
                @if($solicitud->SOL_ESTADO == 1)
                    <span class="badge badge-success">Entregado</span>
                    @else
                    <span class="badge badge-danger">Pendiente</span>
                @endif
                </td>
                <td></td>
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
    </table>
</div>

@endsection()