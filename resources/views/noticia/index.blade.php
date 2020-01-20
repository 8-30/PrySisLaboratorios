<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Lorena Perez-David Esparza
 -->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Noticia'))

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
    <div class="row">
        <div class="col">
            <a href="{{url('noticia/create')}}" class="btn btn-success mb-2">Nuevo</a>
        </div>
        <div class="col"></div>
        <div class="col"></div>
    </div>
    <p class="h3" style="color: #ED7624">
        Noticias: <span class="font-weight-normal">{{ $empresa->EMP_NOMBRE }}</span>
    </p>
    <table class="table table-hover table-bordereds" id="ListTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TITULO</th>
                <th scope="col">FECHA INICIO</th>
                <th scope="col">FECHA FIN</th>
                <th scope="col">PERIODO</th>
                <th scope="col">EMPRESA</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        
        <tbody>
        @foreach ($noticias as $not)
            <tr>
                <td scope="row">{{$not -> NOT_CODIGO}}</td>
                <td scope="row">{{$not -> NOT_TITULO}}</td>
                <td scope="row">{{$not -> NOT_FECHA_INICIO}}</td>
                <td scope="row">{{$not -> NOT_FECHA_FIN}}</td>
                <td scope="row">{{$not -> periodo->PER_NOMBRE}}</td>
                <td scope="row">{{$not -> empresa->EMP_NOMBRE}}</td>
                <td scope="row"><img src="{{$not -> NOT_IMAGEN}}" width="100" height="100"/></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('noticia/'.$not->NOT_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
                        <a href="{{url('noticia/'.$not->NOT_CODIGO.'/destroy')}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
                    </div>
                </td>
            </tr>
            
        @endforeach 
        </tbody>
    </table>
</div>
@endsection