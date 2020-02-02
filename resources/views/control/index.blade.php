<!--
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Mauro Morales - Jerson Morocho
 * Revisado por: 
 *
-->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Controles'))

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
          <a href="{{url('control/create')}}" class="btn btn-success mb-2">Nuevo</a>
      </div>
      <div class="col"></div>
  </div>  
  <span class="counter pull-right"></span>
  <table id="ListTable" class="table table-hover table-bordered table-responsive results">
    <thead>
      <tr>
        <th scope="row">codigo</th> 
        <th scope="row">Fecha</th>
        <th scope="row">Registro entrada</th>
        <th scope="row">Registro Salida</th> 
        <th scope="row">Acciones</th>
      </tr>       
    </thead>
    <tbody>
    @foreach ($controles as $control)
      <tr>
        <td scope="row">{{ $control->CON_CODIGO}}</td>
        <td scope="row">{{ $control->CON_DIA }}</td>
        <td scope="row">{{ $control->CON_REG_FIRMA_ENTRADA }}</td>
        <td scope="row">{{ $control->CON_REG_FIRMA_SALIDA }}</td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('control/'.$control->CON_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
            <a href="{{url('control/'.$control->CON_CODIGO.'/destroy')}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div >
@endsection
