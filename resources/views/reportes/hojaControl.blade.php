<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Jerson Morocho
         Barrera Erick - LLamuca Andrea
 Revisado por: Jerson Morocho
 -->

@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Reporte Hoja de Control de Salas'))

<div class="container-fluid">
  <div class="card border-primary mb-3">
    <div class="card-header text-primary">Consultar</div>
    <div class="card-body text-primary">
      <form action="{{ url('reporte/hoja/control') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="CON_DIA">Fecha<span style="color:#FF0000";>*</span></label>
              @if(!empty($controles))
              <input type="date" class="form-control" name="CON_DIA" id="CON_DIA" value="{{ $controles[0]->CON_DIA }}" required/>
              @else
              <input type="date" class="form-control" name="CON_DIA" id="CON_DIA" required/>
              @endif
            </div>
          </div>

          <div class="col">
            <label for="CAM_CODIGO">Campus<span style="color:#FF0000";>*</span></label>
            <select name="CAM_CODIGO" id="CAM_CODIGO" class="form-control">
              <option disabled>Escoja un Campus...</option>
              @foreach ($campus as $camp)
              <option value="{{ $camp->CAM_CODIGO }}">{{ $camp->CAM_NOMBRE }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <br>

        <button type="submit" class="btn btn-primary mb-2"><span class="oi oi-magnifying-glass"></span>
          Consultar
        </button>
      </form>
    
      <form class="form" id="form" action="{{url('reporte/pdfcontrol')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if(!empty($controles))
        <input type="hidden" class="form-control" name="CON_DIA" id="CON_DIA" value="{{$controles[0]->CON_DIA}}" />
        <input type="hidden" class="form-control" name="CAM_CODIGO" id="CAM_CODIGO"
          value="{{$controles[0]->CAM_CODIGO}}" />
        @else
        <input type="hidden" class="form-control" name="CON_DIA" id="CON_DIA" />
        <input type="hidden" class="form-control" name="CAM_CODIGO" id="CAM_CODIGO" />
        @endif
  


   @if(!empty($controles))
        <button type="submit" class="btn btn-info mb-2"><span class="oi oi-cloud-download"></span> Exportar a PDF</button>
   @endif    
      </form>
    </div>
  </div>
  <br>
  @if(!empty($controles))
  <table id="ListTable" class="table table-hover table-bordered results">
    <thead>
      <tr>
        <th scope="row">ORD</th>
        <th scope="row">MATERIA</th>
        <th scope="row">SALA</th>
        <th scope="row">ENTRADA</th>
        <th scope="row">SALIDA</th>
        <th scope="row">DOCENTE</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($controles as $con)
      <tr>
        <td scope="row">{{$con -> ORD}}</td>
        <td scope="row">{{$con -> MAT_ABREVIATURA}} - {{$con -> MAT_NRC}}</td>
        <td scope="row">{{$con -> LAB_NOMBRE}}</td>
        <td scope="row">{{$con -> CON_HORA_ENTRADA}}</td>
        <td scope="row">{{$con -> CON_HORA_SALIDA}}</td>
        <td scope="row">{{$con -> DOC_TITULO}} {{$con -> DOC_APELLIDOS}} {{$con -> DOC_NOMBRES}}</td>
      </tr>
      @endforeach
  </table>
  @endif
</div>
@endsection