<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Lorena Perez-David Esparza
 -->
@extends('app')
@section('content')
    
<div class="container">
    <div align="left">
    @foreach ($empresas as $emp)
        @if($emp->EMP_CODIGO == $objeto->EMP_CODIGO)
             <h4> {{ $emp->EMP_NOMBRE }} </h4>  
        @endif
    @endforeach
    @foreach ($periodos as $per)
        @if($per->PER_CODIGO == $objeto->PER_CODIGO)
            <h6> {{ $per->PER_NOMBRE }} </h6>                                 
        @endif
    @endforeach
    </div>
    <div align="center">
         @if(isset($objeto->OBR_IMAGEN))
         <img src="{{$objeto -> OBR_IMAGEN}}" id="pic" width="200" height="200" />
         @else
         <img src="{{URL::asset('images/icons/imgicon.png')}}"  id="pic" width="100" height="100" />
         @endif   
    </div>
    <div>
        <h1> Detalle Objeto #  {{$objeto -> OBR_CODIGO}} </h1>
    </div>
    <div>
        <table class="table table-hover table-bordereds" >
            <tbody>
                <tr>    
                    <th scope="col">NOMBRE</th>
                    <td scope="row">{{$objeto -> OBR_NOMBRE}}</td>
                </tr>
                <tr>    
                    <th scope="col">DESCRIPCION</th>
                    <td scope="row">{{$objeto -> OBR_DESCRIPCION}}</td>
                </tr>
                <tr>
                    <th scope="col">FECHA_RECEPCION</th>
                    <td scope="row">{{$objeto -> OBR_FECHA_RECEPCION}}</td>   
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
