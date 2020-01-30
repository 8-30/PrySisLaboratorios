@extends('app')
@section('content')

<style>    
    th {
      background-color: #4E4D4D;
      color: white;
    }
</style>
  
<div class="jumbotron">
    <h2>Uso y Guias Entregadas por Docente</h2>
</div>

<div class="container">
    <div class="row">
        <div class="col">
    <form action="{{url('/reporte/guia/docente')}}" method="POST">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
    

         <div class="form-group">
            <label for="PER_CODIGO">Periodo</label>
            <select class="form-control" id="PER_CODIGO" name="PER_CODIGO"  >
               @foreach ($periodos as $per)
                @if($per->PER_CODIGO==$valores['PER_CODIGO'])
                   <option value="{{$per->PER_CODIGO}}" selected="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                 @else
                 <option value="{{$per->PER_CODIGO}}"  >{{$per->PER_NOMBRE}}</option>
                 @endif
               
               @endforeach
            </select> 
        </div>
         <div class="form-group">
            <label for="DOC_CODIGO">Docente</label>


            <select class="form-control" id="DOC_CODIGO" name="DOC_CODIGO"  >
              @foreach ($docentes as $doc)
               @if($doc->DOC_CODIGO==$valores['DOC_CODIGO'])
                  <option value="{{$doc->DOC_CODIGO}}" selected="{{$doc->DOC_CODIGO}}">{{$doc->DOC_APELLIDOS}} {{$doc->DOC_NOMBRES}}</option>
                @else
                <option value="{{$doc->DOC_CODIGO}}"  >{{$doc->DOC_APELLIDOS}} {{$doc->DOC_NOMBRES}}</option>
                @endif
              
              @endforeach
           </select> 
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Actualizar Reporte</button>
       
    </form>
  </div>
  <div class="col">
      <div class="card border-info mb-3">
        <div class="card-header text-info">Opciones</div>
        <div class="card-body text-info">
          <h5 class="card-title">Descargar</h5>
          <p>Descargue el reporte a su ordenador en formato PDF.</p>
          @if (isset($materias))
          <a href="{{url('reporte/pdfusoguiaentregada')}}" class="btn btn-info"><span class="oi oi-cloud-download"></span> Exportar a  PDF</a>
          @else
          <button disabled class="btn btn-info">
            <span class="oi oi-cloud-download"></span> Exportar a PDF
          </button>
          @endif
        </div>
      </div>
    </div>
  </div>

<br>

@if(!empty($controles))

  <table id="ListOC" class="table table-hover table-bordered results">
    <thead>
      <tr>
        <th scope="row">MATERIA</th>
        <th scope="row">DOCENTE</th>
        <th scope="row">ENTRADA</th>
        <th scope="row">SALIDA</th>
        <th scope="row">GUIA ENTREGADA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($materias as $mat)
            <td scope="row">{{$mat -> MAT_NOMBRE}}</td>
            <td scope="row">{{$mat -> docente->DOC_NOMBRES}}</td>
        @endforeach
        <td scope="row">P</td>
        <td scope="row">P</td>
      </tr>

  </table>
  @endif


</div>
@endsection