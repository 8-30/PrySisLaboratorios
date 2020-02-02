@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Registrar Guia Anterior'))

<div class="container fluid">
    @if (session('title') && session('subtitle'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ session('title') }}</h4>
        <p>{{ session('subtitle') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
     @if(session('mensajes'))
        <div class="alert alert-warning">
            {{ session('mensajes') }}
        </div>
    @endif
    <form action="{{url('/control/Guia_Anterior')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="PER_CODIGO">Periodo</label>
                    <select type="input" id="PER_CODIGO" name="PER_CODIGO" placeholder="PERIODO">
                        <option>SELECCIONE</option>
                        @if(isset($PER_CODIGO))
                            @foreach ($periodos as $per)
                                @if($per->PER_CODIGO==$PER_CODIGO)
                                    <option value="{{$per->PER_CODIGO}}" selected="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                                @else
                                    <option value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>      
                               @endif
                            @endforeach
                        @else  
                            @foreach ($periodos as $per)
                                <option value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                            @endforeach
                        @endif
                    </select> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="MAT_CODIGO">Materia</label>
                    <select type="input"  id="MAT_CODIGO" name="MAT_CODIGO" placeholder="MATERIA">
                        <option> SELECCIONE</option>
                        @if(isset($MAT_CODIGO))
                            @foreach ($materias as $mat)
                                @if($mat->MAT_CODIGO==$MAT_CODIGO)
                                      <option value="{{$mat->MAT_CODIGO}}" selected="{{$mat->MAT_CODIGO}}">{{$mat->MAT_NOMBRE}} {{$mat->MAT_NRC}}</option>
                                @else
                                 <option value="{{$mat->MAT_CODIGO}}">{{$mat->MAT_NOMBRE}} {{$mat->MAT_NRC}}</option>
                               @endif
                               @endforeach
                        
                        @else  
                            @foreach ($materias as $mat)
                                <option value="{{$mat->MAT_CODIGO}}">{{$mat->MAT_NOMBRE}} {{$mat->MAT_NRC}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                <button  type="submit" class="btn btn-primary mb-2">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
        <span class="counter pull-right"></span>
        <table class="table table-hover table-bordered results">
            <thead>
                <tr>
                    <th scope="col">HORA ENTRADA</th>
                    <th scope="col">HORA SALIDA</th>
                    <th scope="col">SALA</th>
                    <th scope="col">MATERIA</th>
                    <th scope="col" colspan="4">GUIA ENTREGADA</th>
                </tr>
            </thead>
            @foreach ($controles as $control)
            <tbody>
                @if($control -> CON_REG_FIRMA_ENTRADA == null or $control -> CON_LAB_ABRE == null or $control -> CON_REG_FIRMA_SALIDA == null or $control -> CON_LAB_CIERRA == null)
                <td scope="row">{{$control -> CON_HORA_ENTRADA}}</td>
                <td scope="row">{{$control -> CON_HORA_SALIDA}}</td>
                <td scope="row">{{$control -> laboratorio->LAB_NOMBRE}}</td>
                <td scope="row">{{$control -> materia->MAT_NOMBRE}} {{$control -> materia->MAT_NRC}}({{$control -> docente->DOC_MIESPE}})</td>   
                    <td>
                        @if($control -> CON_REG_FIRMA_ENTRADA == null)
                            @if($control -> CON_EXTRA == null)
                                    <p><span style="font-size:xx-large";>**</span></p>
                            @endif
                            @if($control -> CON_EXTRA != null)
                                <p><span style="font-size:xx-large";>O</span></p>
                            @endif
                        @endif
                        @if($control -> CON_REG_FIRMA_ENTRADA != null and $control -> CON_REG_FIRMA_SALIDA == null and $control -> CON_EXTRA == null)
                            <form action="{{url('control/updatePorGuia')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="CON_CODIGO" value="{{ $control->CON_CODIGO }}">
                                @if($control -> CON_GUIA == null)
                                    <button  type="submit" class="btn btn-light"><span style="color:#FF0000; font-size:xx-large";>P</span></button>
                                @endif
                                @if($control -> CON_GUIA != null)
                                    <button  type="submit" class="btn btn-light"><span style="color:#00FF00; font-size:xx-large"; >E</span></button>
                                @endif
                            </form>
                        @endif
                        @if($control -> CON_REG_FIRMA_ENTRADA != null and $control -> CON_REG_FIRMA_SALIDA == null and $control -> CON_EXTRA != null)
                            <form action="{{url('control/updatePorSolicitud')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="CON_CODIGO" value="{{ $control->CON_CODIGO }}">
                                @if($control -> SOL_CODIGO == null)
                                    <button  type="submit" class="btn btn-light"><span style="color:#FF0000; font-size:xx-large";>O</span></button>
                                @endif
                                @if($control -> SOL_CODIGO != null)
                                    <button  type="submit" class="btn btn-light"><span style="color:#00FF00; font-size:xx-large"; >O</span></button>
                                @endif
                            </form>
                        @endif
                    </td>
                @endif
            </tbody>
            @endforeach 
        </table>   
    
</div>
@endsection