<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Jerson Morocho
 Revisado por: Jerson Morocho
 -->

@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Reporte Materias por Carrera'))

<div class="container-fluid">
  <div class="row mb-3">
    <div class="col">
      <form action="{{url('/reporte/materia/carrera')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="card border-primary mb-3">
          <div class="card-header text-primary">Consultar</div>
          <div class="card-body text-primary">
            <select class="form-control" title="Seleccione un Periodo..." name="PER_CODIGO"
              data-live-search="true" data-width="100%">
              @foreach ($periodos as $periodo)
              @if($periodo->PER_CODIGO==$valores['PER_CODIGO'])
              <option value="{{ $periodo->PER_CODIGO }}" selected>{{ $periodo->PER_NOMBRE }}</option>
              @else
              <option value="{{$periodo->PER_CODIGO}}">{{$periodo->PER_NOMBRE}}</option>
              @endif
              @endforeach
            </select>
            <br>
            <select class="form-control" title="Seleccione una Carrera..." name="CAR_CODIGO"
              data-live-search="true" data-width="100%">
              @foreach ($carreras as $carrera)
              @if($carrera->CAR_CODIGO == $valores['CAR_CODIGO'])
              <option value="{{$carrera->CAR_CODIGO}}" selected>{{ $carrera->CAR_NOMBRE }}</option>
              @else
              <option value="{{$carrera->CAR_CODIGO}}">{{ $carrera->CAR_NOMBRE }}</option>
              @endif
              @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-primary"><span class="oi oi-magnifying-glass"></span>
              Consultar
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="col">
      <div class="card border-info mb-3">
        <div class="card-header text-info">Opciones</div>
        <div class="card-body text-info">
          <h5 class="card-title">Descargar</h5>
          <p>Descargue el reporte a su ordenador en formato PDF.</p>
          @if (isset($materias))
          <a href="{{url('reporte/pdfmateriacarrera/'.$periodox->PER_CODIGO.'/'.$carrerax->CAR_CODIGO.'')}}" class="btn btn-info"><span class="oi oi-cloud-download"></span> Exportar a  PDF</a>
          @else
          <button disabled class="btn btn-info">
            <span class="oi oi-cloud-download"></span> Exportar a PDF
          </button>
          @endif
        </div>
      </div>
    </div>
  </div>

  @if($materias != null )
  <p id="carrera">
    <span class="h6 mb-2" style="margin-right:150px;">REPORTE: &emsp;
      <span style="font-weight: 300;">MATERIAS POR CARRERAS</span>
    </span>

    <span class="h6" style="margin-right:150px;">PERIODO: &emsp;
      @foreach ($periodos as $per)
      @if($per->PER_CODIGO == $valores['PER_CODIGO'])
      <span style="font-weight: 300;">{{ $per->PER_NOMBRE }}</span>
      @endif
      @endforeach
    </span>

    <span class="h6" style="margin-right:150px;">CARRERA: &emsp;
      @foreach ($carreras as $car)
      @if($car->CAR_CODIGO == $valores['CAR_CODIGO'])
      <span style="font-weight: 300;">{{ $car->CAR_NOMBRE }}</span>
      @endif
      @endforeach
    </span>
  </p>
  <table id="materiaCarreraTable" class="table table-hover table-bordered table-sm">
    <thead>
      <tr>
        <th class="text-center">ORD</th>
        <th class="text-center">MATERIA</th>
        <th class="text-center">NRC</th>
        <th class="text-center">DOCENTE</th>
        <th class="text-center">CREDITOS</th>
        <th class="text-center">ESTUDIANTES</th>
        <th class="text-center">ABREVIATURA</th>
      </tr>
    </thead>
    <tbody>
 <input type="hidden" value="{{$cont=1}}">
@foreach ($materias as $mat )
      <tr>
        <td class="text-center">{{$cont++}}</td>
        <td>{{$mat ->MAT_NOMBRE}}</td>
        <td class="text-center">{{$mat ->MAT_NRC}}</td>
        <td>{{$mat->docente->DOC_NOMBRES.' '.$mat->docente->DOC_APELLIDOS}}</td>
        <td class="text-center">{{$mat ->MAT_CREDITOS}}</td>
        <td class="text-center">{{$mat ->MAT_NUM_EST}}</td>
        <td>{{$mat ->MAT_ABREVIATURA}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</div>
@endsection