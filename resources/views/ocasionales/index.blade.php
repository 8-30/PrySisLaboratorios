 @extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Evento Ocasional'))

<div class="container-fluid">
    @if (session('title') && session('subtitle'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ session('title') }}</h4>
        <p>{{ session('subtitle') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('mensajes'))
        <div class="alert alert-warning">
            {{ session('mensajes') }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <a href="{{url('ocasionales/create')}}" class="btn btn-success mb-2">Nuevo</a>
        </div>
        <div class="col"></div>
        <div class="col"></div>
    </div>
    <table id="ListTable" class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th scope="row">ID</th>
                <th scope="row">SALA</th>
                <th scope="row">MATERIA</th>
                <th scope="row">DOCENTE</th>
                <th scope="row">DIA</th>
                <th scope="row">HORA ENTRADA</th>
                <th scope="row">HORA SALIDA </th>
                <th scope="row">NUMERO HORAS </th>
                <th scope="row">NOTA </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $eve)
            
            <tr>
                <td scope="row">{{$eve -> CON_CODIGO}}</td>
                <td scope="row">{{$eve -> laboratorio -> LAB_NOMBRE}}</td>
                <td scope="row">{{$eve -> materia -> MAT_NOMBRE}}</td>
                <td scope="row">{{$eve -> docente -> DOC_NOMBRES}} {{$eve -> docente->DOC_APELLIDOS}}</td>
                <td scope="row">{{$eve -> CON_DIA }}</td>
                <td scope="row">{{$eve -> CON_HORA_ENTRADA}}</td>
                <td scope="row">{{$eve -> CON_HORA_SALIDA}}</td>
                <td scope="row">{{$eve -> CON_NUMERO_HORAS}}</td>
                <td scope="row">{{$eve -> CON_NOTA}}</td>
            </tr>
            
        @endforeach   
        </tbody>
    </table>
</div>
@endsection
