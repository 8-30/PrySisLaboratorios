<!-- 
    Sistema de Gestion de Laboratorios - ESPE

    Author: Antony Andrade - Jonel Lopez
    Revisado por: Juan Aquino - Jonel Lopez
-->

@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Materiales de Laboratorio'))

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
            <a href="{{url('materiales/laboratorio/create')}}" class="btn btn-success mb-2">Nuevo</a>
        </div>
        <div class="col"></div>
        <div class="col"></div>
    </div>
    <span class="counter pull-right"></span>
    <table id="ListTable" class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">PERIODO</th>
                  <th scope="col">LABORATORIO</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">DETALLE</th>
                <th scope="col">OBSERVACION</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($materiales as $material)
            <tr>
                <td scope="row">{{$material->MATLAB_CODIGO}}</td>
                <td scope="row">{{$material->periodo->PER_NOMBRE}}</td>
                <td scope="row">{{$material->laboratorio->LAB_NOMBRE}}</td>
                <td scope="row">{{$material->MATLAB_CANTIDAD}}</td>
                <td scope="row">{{$material->MATLAB_DETALLE}}</td>
                <td scope="row">{{$material->MATLAB_OBSERVACION}}</td>
                
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('materiales/laboratorio/'.$material->MATLAB_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
                        
                        <a href="{{url('materiales/laboratorio/'.$material->MATLAB_CODIGO.'/destroy')}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
                    </div>
                </td>
            </tr>
            @endforeach
         </tbody>   
    </table>
</div>
@endsection