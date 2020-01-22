<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Daniel Lopez, Jipson Murillo
 Revisado por: Jerson Morocho
 -->

@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Generar Control'))

<div class="container-fluid">
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">{{ session('success') }}</h4>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">{{ session('error') }}</h4>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <div class="row">
      <div class="col">
          <form action="{{url('/control')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="card border-primary mb-3">
                  <div class="card-header text-primary">Fecha</div>
                  <div class="card-body text-primary">
                    <div class="form-group">
                      @if (!session('fecha'))
                      <input type="date" class="form-control" name="CON_DIA" id="CON_DIA" value="{{$controles['fecha']}}" />
                      @else
                      <input type="date" class="form-control" name="CON_DIA" id="CON_DIA" value="{{session('fecha')}}" />
                      @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><span class="oi oi-magnifying-glass"></span> Seleccionar</button>
                  </div>
              </div>
          </form>
      </div>

      <div class="col">
        <div class="card border-info mb-3">
          <div class="card-header text-info">Opciones</div>
            <div class="card-body text-info">
              <form class="form" id="form" action="{{ url('control/generar') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" name="CON_DIA" id="CON_DIA" value="{{$controles['fecha']}}" />

                <div class="custom-control custom-switch ">
                  <input type="checkbox" class="custom-control-input" id="MAT_OCACIONAL" name="MAT_OCACIONAL">
                  <label class="custom-control-label" for="MAT_OCACIONAL">Ocasional</label>
                </div>
                <br>
                <button class="btn btn-info"><span class="oi oi-cloud-download"></span> Generar Control</button>
              </form>

              
          </div>
        </div>
      </div>
  </div>


  <br>
  <table id="ListTable" class="table table-hover table-bordered results">
    <thead>
      <tr>
        <th scope="row">MATERIA</th>
        <th scope="row">REGISTRO</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($controles as $con)
      @if($con != $controles["fecha"])
      <tr>
        <td scope="row">{{$con -> LAB_NOMBRE}}</td>
        <td scope="row">{{$con -> REGISTROS}}</td>
      </tr>

      @endif
      @endforeach

    </tbody>
  </table>

</div>
@endsection