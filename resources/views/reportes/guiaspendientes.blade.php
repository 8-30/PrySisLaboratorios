@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Reporte Guias Pendientes'))
<div class="container-fluid">
  <div class="card border-primary mb-3">
    <div class="card-header text-primary">Consultar</div>
    <div class="card-body text-primary">
      <form action="{{ url('reporte/guia/materia') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col">
                <div class="form-group">
                <label for="PER_CODIGO">Periodo</label>
                  <select name="PER_CODIGO" id="PER_CODIGO" >
                    <option >Seleccione Periodo...</option>
                      @foreach ($periodo as $per)
                      <option value="{{ $per->PER_CODIGO }}">{{ $per->PER_NOMBRE }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2"><span class="oi oi-magnifying-glass"></span>
          Consultar
        </button>
      </form>
    
      <form class="form" id="form" action="{{url('reporte/pdfguiapendiente')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if(!empty($controles))
        <input type="hidden" name="PER_CODIGO" id="PER_CODIGO"
          value="{{$controles[0]->PER_CODIGO}}" />
        @else
        <input type="hidden" class="form-control" name="PER_CODIGO" id="PER_CODIGO" />
        @endif

        @if(!empty($controles))
          <button type="submit" class="btn btn-info mb-2"><span class="oi oi-cloud-download"></span> Exportar a PDF</button>
        @endif    
      </form>
    </div>
  </div>
  <br>

  @if(!empty($controles))
  <table id="ListOC" class="table table-hover table-bordered results">
    <thead>
      <tr>
        <th scope="row">MATERIA</th>
        <th scope="row">FECHA</th>
        <th scope="row">HORARIO</th>
        <th scope="row">GUIA ENTREGADA</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($controles as $control)
      <tr>
        <td scope="row">{{$control -> MAT_NOMBRE}} -{{$control -> DOC_TITULO}} {{$control -> DOC_APELLIDOS}} {{$control -> DOC_NOMBRES}} </td>
        <td scope="row">{{$control -> GUI_FECHA}}</td>
        <td scope="row">{{$control -> CON_HORA_ENTRADA}} - {{$control -> CON_HORA_SALIDA}}</td> 
        <td>
            @if($control -> CON_REG_FIRMA_SALIDA != null or $control -> CON_REG_FIRMA_ENTRADA != null)
              @if($control -> CON_EXTRA == null)
                <p><span style="font-size:xx-medium";>Pendiente</span></p>
              @endif
            @endif
        <td>
      </tr>
      @endforeach
  </table>
  @endif
</div>
@endsection