<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Jerson Morocho
         Barrera Erick - LLamuca Andrea
 Revisado por: Jerson Morocho
 -->

 @extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Reporte Hoja de Control de Salas'))

@if(empty($controles))
  @if($mensaje!=null)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <h4 class="alert-heading"><b>ADVERTENCIA:</b>   
          {{$mensaje}}
          </h4>
      </div>    
  @endif
@endif
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card border-primary mb-3">
        <div class="card-header text-primary">Consultar</div>
        <div class="card-body text-primary">
          <form action="{{ url('reporte/hoja/control') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="CON_DIA">Fecha<span style="color:#FF0000";>*</span></label>
                  @if(!empty($controles))
                  <input type="date" class="form-control" name="CON_DIA" id="CON_DIA" value="{{ $controles[0]->CON_DIA }}" required/>
                  @else
                  <input type="date" class="form-control" name="CON_DIA" id="CON_DIA" required/>
                  @endif
                <label for="CAM_CODIGO">Campus<span style="color:#FF0000";>*</span></label>
              
                <select name="CAM_CODIGO" id="CAM_CODIGO" class="form-control">
                  <option value="-1">Escoja un Campus...</option>
                  @foreach ($campus as $camp)
                    @if(!empty($controles))
                      @if($controles[0]->CAM_CODIGO==$camp->CAM_CODIGO)
                        <option value="{{ $camp->CAM_CODIGO }}" id="{{ $camp->CAM_CODIGO }}" selected="selected" >{{ $camp->CAM_NOMBRE }}</option>
                      @else
                        <option value="{{ $camp->CAM_CODIGO }}" id="{{ $camp->CAM_CODIGO }}" >{{ $camp->CAM_NOMBRE }}</option>
                      @endif
                    @else
                      <option value="{{ $camp->CAM_CODIGO }}" id="{{ $camp->CAM_CODIGO }}" >{{ $camp->CAM_NOMBRE }}</option>
                    @endif
                  @endforeach
                </select>
                </div>
            <br>
    
            <button type="submit" class="btn btn-primary mb-2"><span class="oi oi-magnifying-glass"></span>
              Consultar
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
        <div class="card border-info mb-3">
          <div class="card-header text-info">Opciones</div>
            <div class="card-body text-info">

            <form class="form" id="form" action="{{url('reporte/pdfcontrol')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(!empty($controles))
            <input type="hidden"  class="form-control" name="CON_DIA" id="CON_DIA" value="{{$controles[0]->CON_DIA}}" />
            <input type="hidden"  class="form-control" name="CAM_CODIGO" id="CAM_CODIGO"
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
    </div>
  </div>
  <br>

  @if(!empty($controles))
  <table id="ListOC" class="table table-hover table-bordered results">
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
        <td scope="row">{{$con -> MAT_ABREVIATURA}}</td>
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