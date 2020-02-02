@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Guías y Solicitudes'))

<div class="container">
    <p class="h3" style="color: #ED7624">
        Materia: <span class="font-weight-normal">{{ $periodo->PER_NOMBRE }}</span>
    </p>
    <p class="h3" style="color: #ED7624">
        Docente: <span class="font-weight-normal">{{ $docente->DOC_TITULO }} {{ $docente->DOC_NOMBRES }} {{ $docente->DOC_APELLIDOS }}</span>
    </p>

    @if(!empty($materias))
        <table id="ListTable1" class="table table-hover table-bordered results">
            <thead class="thead-dark">
                <tr>
                    <th scope="row">Carrera</th>
                    <th scope="row">Nombre</th>
                    <th scope="row">NRC</th>
                    <th scope="row">Acciones</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($materias as $mat)
                    <tr>
                        <td scope="row">{{$mat -> carrera -> CAR_NOMBRE}}</td>
                        <td scope="row">{{$mat -> MAT_NOMBRE}}</td>
                        <td scope="row">{{$mat -> MAT_NRC}}</td>
                        <td>
                            <a href="{{url('guia/listarGuias/'.$mat->MAT_CODIGO)}}" class="btn btn-primary mb-2 float-cente">Guia</a>
                            <a href="{{url('solicitud/'.$mat->MAT_CODIGO.'/index')}}" class="btn btn-primary mb-2 float-center">Solicitud</a>  &nbsp
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <b>Las casillas sombreadas son horas ocasionales</b>
    <table id="horarioDocenteTable" class="table table-hover table-bordered">
        <thead style="background-color: #9CA2A0">
            <tr class="d-flex">
                <th class="col">HORA</th>
                <th class="col">LUNES</th>
                <th class="col">MARTES</th>
                <th class="col">MIERCOLES</th>
                <th class="col">JUEVES</th>
                <th class="col">VIERNES</th>
            </tr>
        </thead>
        <tbody>
            @for ($x = 1; $x <= 13; $x++)
            <tr class="d-flex">
                <td class="col">{{ $horario_docente['HOR_HORA'.$x] }}</td>
                <td class="col @if($horario_docente['HOR_LUNES'.$x.'_OPC']==1) table-dark @endif ">
                    {{ $horario_docente['HOR_LUNES'.$x] }}
                    <br>
                    {{ $horario_docente['LAB_LUNES'.$x] }}
                </td>
                <td class="col @if($horario_docente['HOR_MATES'.$x.'_OPC']==1) table-dark @endif ">
                    {{ $horario_docente['HOR_MATES'.$x] }}
                    <br>
                    {{ $horario_docente['LAB_MATES'.$x] }}
                </td>
                <td class="col @if($horario_docente['HOR_MIERCOLES'.$x.'_OPC']==1) table-dark @endif ">
                    {{ $horario_docente['HOR_MIERCOLES'.$x] }}
                    <br>
                    {{ $horario_docente['LAB_MIERCOLES'.$x] }}
                </td>
                <td class="col @if($horario_docente['HOR_JUEVES'.$x.'_OPC']==1) table-dark @endif ">
                    {{ $horario_docente['HOR_JUEVES'.$x] }}
                    <br>
                    {{ $horario_docente['LAB_JUEVES'.$x] }}
                </td>
                <td class="col @if($horario_docente['HOR_VIERNES'.$x.'_OPC']==1) table-dark @endif ">
                    {{ $horario_docente['HOR_VIERNES'.$x] }}
                    <br>
                    {{ $horario_docente['LAB_VIERNES'.$x] }}
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection

