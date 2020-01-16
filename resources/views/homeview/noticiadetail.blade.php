<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Lorena Perez-David Esparza
 -->
@extends('app')
@section('content')
    
<div class="container mt-5 mb-5">
    <div align="left">
        @foreach ($empresas as $emp)
            @if($emp->EMP_CODIGO == $noticia->EMP_CODIGO)
                <h4> {{ $emp->EMP_NOMBRE }} </h4>  
            @endif
        @endforeach
        @foreach ($periodos as $per)
            @if($per->PER_CODIGO == $noticia->PER_CODIGO)
                <h6> {{ $per->PER_NOMBRE }} </h6>                                 
            @endif
        @endforeach
    </div>
    <div align="center">
         @if(isset($noticia->NOT_IMAGEN))
         <img src="{{$noticia -> NOT_IMAGEN}}" id="pic" width="200" height="200" />
         @else
         <img src="{{URL::asset('images/icons/imgicon.png')}}"  id="pic" width="100" height="100" />
         @endif   
    </div>
    <br>
    <div>
        <h1> {{$noticia->NOT_TITULO}} </h1>
    </div>
    <div align="right">
        <h5> {{ $noticia->NOT_FECHA_INICIO }} </h5>
    </div>
    <br>
    <div>
        <p align = "justify" style="font-size:160%;">  {{$noticia->NOT_DESCRIPCION}} </p>
    </div>
    <br>
</div>
@endsection
