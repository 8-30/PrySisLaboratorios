@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Control Laboratorio'))

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
    <div class="row">
        <br>
        <div class="col">
            <br>
            <form action="{{url('control/filtroCampus')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="radio" name="campus" value="1"> Campus Centro
                <input type="radio" name="campus" value="2"> Campus Belisario Quevedo
                <button  type="submit" class="btn btn-primary mb-2">Aplicar Filtro</button>
            </form>
            
        </div>
        <div class="col"><br>[{{Auth::user()->name}}]</div>
    </div>
    <span class="counter pull-right"></span>
    <table class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th scope="col">HORA ENTRADA</th>
                <th scope="col">HORA SALIDA</th>
                <th scope="col">SALA</th>
                <th scope="col">MATERIA</th>
                <th scope="col" colspan="4">GUIA</th>
            </tr>
        </thead>
        @foreach ($controles as $control)
        <tbody>
            @if($control -> CON_REG_FIRMA_ENTRADA == null or $control -> CON_LAB_ABRE == null or $control -> CON_REG_FIRMA_SALIDA == null or $control -> CON_LAB_CIERRA == null)
            <td scope="row">{{$control -> CON_HORA_ENTRADA}}</td>
            <td scope="row">{{$control -> CON_HORA_SALIDA}}</td>
            <td scope="row">{{$control -> laboratorio->LAB_NOMBRE}}</td>
            <td scope="row">{{$control -> materia->MAT_NOMBRE}} {{$control -> materia->MAT_NRC}}({{$control -> docente->DOC_MIESPE}})</td>
                <td >
                    <form action="{{url('control/updateD')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="CON_CODIGO" value="{{ $control->CON_CODIGO }}">
                        <input type="hidden" name="docente">
                        @if($control -> CON_REG_FIRMA_ENTRADA == null)
                            <button  type="submit" class="btn btn-success mb-2">Entrar</button>
                            

                        @endif
                        @if($control -> CON_REG_FIRMA_ENTRADA != null and $control -> CON_REG_FIRMA_SALIDA == null)
                            <button  type="submit" class="btn btn-danger mb-2">Salir</button>
                        @endif
                    </form>
                </td>
                    
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
                <td>
                    <form action="{{url('control/updateL')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="CON_CODIGO" value="{{ $control->CON_CODIGO }}">
                        <input type="hidden" name="laboratorista">
                        @if($control -> CON_LAB_ABRE == null)
                            <button  type="submit" class="btn btn-success mb-2">Entrar</button>
                        @endif
                        @if($control -> CON_LAB_ABRE != null and $control -> CON_LAB_CIERRA == null)
                            <button  type="submit" class="btn btn-danger mb-2">Cerrar</button>
                        @endif
                    </form>
                    
                </td>
                <td>
                    <form action="{{url('control/nota')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="CON_CODIGO" value="{{ $control->CON_CODIGO }}">
                       
                         <button  type="submit" class="btn btn-light"><span class="oi oi-pencil"></span></button>
                         
                    </form>
                </td>
            @endif
        </tbody>
        @endforeach 
</table>

<script>
    function cambia(src){
        src = "";
        src ="{{URL::asset('images/consola/salir.png')}}";
        return src;
    }
    function cambia2(src){
        src = "";
        src ="{{URL::asset('images/consola/cerrar.png')}}";
        return src;
    }
</script>

<!-- BOTONES DE NAVEGACION -->
<!-- <div class="clearfix">
    <ul class="pagination">
        <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
    </ul> -->
</div>
@endsection