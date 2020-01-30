@extends('app')
@section('content')
  
    <style>    
        th {
            background-color: #4E4D4D;
            color: white;
        }
    </style>

    <div class="jumbotron">
        <h2>Guias por Carreras</h2>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form action="{{url('/reporte/guia/carrera')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
                    <div class="card border-primary mb-3">
                        <div class="card-header text-primary">Consultar</div>
                        <div class="card-body text-primary">
                            <span style="font-weight: 300;">Periodo</span>
                            <select class="form-control" id="PER_CODIGO" name="PER_CODIGO"  >
                                @foreach ($periodos as $per)
                                    @if($valores!=null))
                                        @if($per->PER_CODIGO==$valores->PER_CODIGO)
                                           <option value="{{$per->PER_CODIGO}}" selected="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                                        @else
                                            <option value="{{$per->PER_CODIGO}}"  >{{$per->PER_NOMBRE}}</option>
                                        @endif
                                    @else
                                        <option value="{{$per->PER_CODIGO}}"  >{{$per->PER_NOMBRE}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="card-body text-primary">
                            <span style="font-weight: 300;">Carrera</span>
                            <select class="form-control" id="CAR_CODIGO" name="CAR_CODIGO"  >
                                @foreach ($carreras as $car)
                                    @if($valores!=null))
                                        @if($car->CAR_CODIGO==$valores->CAR_CODIGO)
                                           <option value="{{$car->CAR_CODIGO}}" selected="{{$car->CAR_CODIGO}}">{{$car->CAR_NOMBRE}}</option>
                                        @else
                                            <option value="{{$car->CAR_CODIGO}}"  >{{$car->CAR_NOMBRE}}</option>
                                        @endif
                                    @else
                                        <option value="{{$car->CAR_CODIGO}}"  >{{$car->CAR_NOMBRE}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="card-body text-primary">
                            <span style="font-weight: 300;">Fecha Inicial</span>
                            @if(isset($fechaInicial))
                                <input type="date" class="form-control"   id="FECHA_INCIAL" name="FECHA_INCIAL" value="{{$fechaInicial}}"></input>   
                            @else
                                <input type="date" class="form-control"   id="FECHA_INCIAL" name="FECHA_INCIAL" ></input>   
                            @endif 
                        </div>
                        <div class="card-body text-primary">
                            <span style="font-weight: 300;">Fecha Final</span> 
                            @if(isset($fechaFinal))
                                <input required type="date" class="form-control" id="FECHA_FINAL" name="FECHA_FINAL" value="{{$fechaFinal}}" ></input>
                            @else
                                <input type="date" class="form-control" id="FECHA_FINAL" name="FECHA_FINAL" ></input>  
                            @endif 
                        </div>
                        <div class="card-body text-primary">
                        <button type="submit" class="btn btn-primary"><span class="oi oi-magnifying-glass"></span> Consultar</button>
                      
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="card border-info mb-3">
                    <div class="card-header text-info">Opciones</div>
                    <div class="card-body text-info">
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h5 class="card-title">Descargar</h5>
                        </form>
                        <br>    
                        @if ($guias != null)
                            @if(count($guias)>0)
                                <a href="{{url('reporte/carrera/pdfguia/'.$valores['PER_CODIGO'].'/'.$valores['CAR_CODIGO'].'/'.$valores['FECHA_INCIAL'].'/'.$valores['FECHA_FINAL'])}}" class="btn btn-info"><span class="oi oi-cloud-download"></span> Exportar a  PDF</a>
                             @else
                                 <button disabled class="btn btn-info"><span class="oi oi-cloud-download"></span> Exportar a PDF</button>
                            @endif
                        @else
                           <button disabled class="btn btn-info"><span class="oi oi-cloud-download"></span> Exportar a PDF</button>
                        @endif
      
                        <br>  <br>  
                    </div>
                </div>
            </div>
        </div>

        @if (session('title') && session('subtitle'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">{{ session('title') }}</h4>
                <p>{{ session('subtitle') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    @if($guias != null )
        <span class="counter pull-right"></span>
        <p id="sala">
           <span class="h4">REPORTE:
                <span style="font-weight: 300;"> GUIA POR CARRERA</span>
            </span>
            <br>
            <span class="h6" style="margin-right:150px;">PERIODO: {{$periodoActual->PER_NOMBRE}}</span>          
        </p> 
        <table id="guiaCarreraTable" class="table table-hover table-bordered table-sm" style="text-align:center;">
        @foreach ($guias as $gui)
            <thead>
                <tr class="d-flex">
                    <th class="col" >{{$gui[0]->materias->MAT_NOMBRE}} (NRC: {{$gui[0]->materias->MAT_NRC}}) - Ing. {{$gui[0]->docentes->DOC_APELLIDOS}} {{$gui[0]->docentes->DOC_NOMBRES}}</th>
                </tr>
                <tr class="d-flex">
                    <th class="col">GUIA</th>
                    <th class="col">FECHA</th>
                    <th class="col">TEMA</th>
                    <th class="col">DURACION</th>
                </tr>
            </thead>
            <tbody >
            @foreach ($gui as $guV)
                <tr class="d-flex">
                    <td class="col opts">{{$guV->GUI_NUMERO}}</td>
                    <td class="col opts">{{$guV->GUI_FECHA}}</td>
                    <td class="col opts">{{$guV->GUI_TEMA}}</td>
                    <td class="col opts">{{$guV->GUI_DURACION}}</td>
                </tr>
            @endforeach
        </tbody>  
        @endforeach     
        </table>          
    @endif
@endsection
