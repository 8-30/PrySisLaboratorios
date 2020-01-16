@extends('app')
@section('content')

<div class="jumbotron">
<h2 ><pre style="color: #ED7624">Periodo:{{$periodo->PER_NOMBRE}}     Docente:{{$docente->DOC_TITULO}} {{$docente->DOC_NOMBRES}} {{$docente->DOC_APELLIDOS}}</pre></h2>
</div>
<div class="container">
    @if(!empty($materias))
        <table id="ListTable1" class="table table-hover table-bordered results">
            <thead class="thead-dark">
                <tr>
                  
                    <th style="color: #ED7624" scope="row">Carrera</th>
                    <th style="color: #ED7624" scope="row">Nombre</th>
                    <th style="color: #ED7624" scope="row">NRC</th>
                    <th style="color: #ED7624" scope="row">Acciones</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($materias as $mat)
                    <tr>       
                        <td scope="row">{{$mat -> carrera -> CAR_NOMBRE}}</td> 
                        <td scope="row">{{$mat -> MAT_NOMBRE}}</td> 
                        <td scope="row">{{$mat -> MAT_NRC}}</td>
                        
                        <td>
                            
                           Guias <a href="{{url('solicitud/'.$mat->MAT_CODIGO.'/index')}}" class="btn btn-primary mb-2 float-right"><span class="oi oi-pencil"></span></a>                           
                        </td>
                    </tr>
                @endforeach
            </tbody>   
        </table>
    @endif
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
                <td class="col">{{ $horario['HOR_HORA'.$x] }}</td>
                <td class="col opts">
                    @if ($horario['HOR_LUNES_DOC'.$x] != 0 || $horario['HOR_LUNES_DOC'.$x] != NULL)
                    {{ $horario['HOR_LUNES'.$x] }} <span class="text-{{ $horario['HOR_LUNES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_LUNES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_MATES_DOC'.$x] != 0 || $horario['HOR_MATES_DOC'.$x] != NULL)
                    {{ $horario['HOR_MATES'.$x] }} <span class="text-{{ $horario['HOR_MARTES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_MATES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_MIERCOLES_DOC'.$x] != 0 || $horario['HOR_MIERCOLES_DOC'.$x] != NULL)
                    {{ $horario['HOR_MIERCOLES'.$x] }} <span class="text-{{ $horario['HOR_MIERCOLES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_MIERCOLES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_JUEVES_DOC'.$x] != 0 || $horario['HOR_JUEVES_DOC'.$x] != NULL)
                    {{ $horario['HOR_JUEVES'.$x] }} <span class="text-{{ $horario['HOR_JUEVES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_JUEVES_DOC'.$x] }}</b>
                    @endif
                </td>
                <td class="col opts">
                    @if ($horario['HOR_VIERNES_DOC'.$x] != 0 || $horario['HOR_VIERNES_DOC'.$x] != NULL)
                    {{ $horario['HOR_VIERNES'.$x] }} <span class="text-{{ $horario['HOR_VIERNES'.$x.'_OPC'] }}"></span>
                    <br>
                    <b class="small font-weight-bold">{{ $horario['HOR_VIERNES_DOC'.$x] }}</b>
                    @endif
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>  
@endsection
