<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Lorena Perez-David Esparza
 -->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Laboratorios'))

<div class="container-fluid">
    @if (session('title') && session('subtitle'))
    <div class="alert {{ session('alert') }} alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ session('title') }}</h4>
        <p>{{ session('subtitle') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col">
            <a href="{{url('laboratorio/create')}}" class="btn btn-success mb-2">Nuevo</a>
        </div>
        <div class="col"></div>
        <div class="col"></div>
    </div>

    <table class="table table-hover table-bordered results" id="ListTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CAPACIDAD</th>
                <th scope="col">CAMPUS</th>
                <th scope="col">EMPRESA</th>
                <th scope="col">ABREVIATURA</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        
        <tbody>
        @foreach ($laboratorios as $lab)
            <tr>
            <td scope="row">{{$lab -> LAB_CODIGO}}</td>
            <td scope="row">{{$lab -> LAB_NOMBRE}}</td>
            <td scope="row">{{$lab -> LAB_CAPACIDAD}}</td>
            <td scope="row">{{$lab -> campus->CAM_NOMBRE}}</td>
            <td scope="row">{{$lab -> empresa->EMP_NOMBRE}}</td>
            <td scope="row">{{$lab -> LAB_ABREVIATURA}}</td>
            <td scope="row">
                 @if ($lab->LAB_ESTADO === 1)
                    <span class="badge badge-primary">Activo</span>
                    @elseif ($lab->LAB_ESTADO === 0)
                    <span class="badge badge-danger">Inactivo</span>
                    @endif
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{url('laboratorio/'.$lab->LAB_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
                    <a href="{{url('laboratorio/'.$lab->LAB_CODIGO.'/destroy')}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
                </div>
            </td>
            </tr>
            
            @endforeach 
        </tbody>
          
</table>
<!-- BOTONES DE NAVEGACION -->
<!-- <div class="clearfix">
    <ul class="pagination">
        <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
    </ul> -->
</div>
@endsection