<!--
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Mauro Morales - Jerson Morocho
 * Revisado por: 
 *
-->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Guias'))

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
          <a href="{{url('guia/create')}}" class="btn btn-success mb-2">Nuevo</a>
      </div>
      <div class="col"></div>
  </div>  
  <span class="counter pull-right"></span>
  <table id="ListTable" class="table table-hover table-bordered table-responsive results">
    <thead>
      <tr>
        <th scope="row">Periodo</th> 
        <th scope="row">Numero guia</th> 
        <th scope="row">fecha</th> 
        <th scope="row">Tema</th> 
        <th scope="row">Duracion</th>
        <th scope="row">Actividades</th>
        <th scope="row">Resultados</th>
        <th scope="row">Coordinador</th>
        <th scope="row">Acciones</th>
      </tr>       
    </thead>
    <tbody>
    @foreach ($guias as $guia)
      <tr>
        <td scope="row">{{ $guia->PER_CODIGO}}</td>
        <td scope="row">{{ $guia->GUI_NUMERO }}</td>
        <td scope="row">{{ $guia->GUI_FECHA }}</td>
        <td scope="row">{{ $guia->GUI_TEMA }}</td>
        <td scope="row">{{ $guia->GUI_DURACION }}</td>
        <td scope="row">{{ $guia->GUI_ACTIVIDADES }}</td>
        <td scope="row">{{ $guia->GUI_RESULTADOS }}</td>
        <td scope="row">{{ $guia->GUI_COORDINADOR }}</td> 
        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('guia/'.$guia->GUI_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
            <a href="{{url('guia/'.$guia->GUI_CODIGO.'/destroy')}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div >
@endsection
