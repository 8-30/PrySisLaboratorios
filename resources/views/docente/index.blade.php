@extends('layouts.principal')

@section('docente')

<div class="container">
@if (session('title') && session('subtitle'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ session('title') }}</h4>
        <p>{{ session('subtitle') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <h2>Docentes</h2>
    <a href="{{url('docente/create')}}" class="btn btn-primary mb-2">Nuevo</a>
    <table id="docenteTabla" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>CEDULA</th>
                <th>MI ESPE</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>CORREO</th>
                <th>CLAVE</th>
                <th>TITULO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        @foreach ($docentes as $doc)
        <tbody>
            <td>{{$doc -> DOC_CODIGO }}</td>
            <td>{{$doc -> DOC_CEDULA}}</td>
            <td>{{$doc -> DOC_MIESPE}}</td>
            <td>{{$doc -> DOC_NOMBRES}}</td>
            <td>{{$doc -> DOC_APELLIDOS}}</td>
            <td>{{$doc -> DOC_CORREO}}</td>
            <td>{{$doc -> DOC_CLAVE}}</td>
            <td>{{$doc -> DOC_TITULO}}</td>
            <td>
                <form action="{{url('/docente/'.$doc->DOC_CODIGO.'/destroy')}}" method="POST" class="float-right">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></button>
                </form>
                <a href="{{url('docente/'.$doc->DOC_CODIGO.'/edit')}}" class="btn btn-primary mb-2 float-right"><span class="oi oi-pencil"></span></a>
                &nbsp;
            </td>
        </tbody>
        @endforeach
    </table>
</div>
@stop