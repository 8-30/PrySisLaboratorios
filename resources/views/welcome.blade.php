@extends('app')
@section('css')
  <link href="{{ URL::asset('assets/font/font.css') }}" rel='stylesheet' type='text/css' />
  <link href="{{ URL::asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' media="screen"/>
  <style type="text/css">
    img.noticia{
    width: 150px; height: 150px;
    }
  </style>
@endsection

@section('content')
<!-- <div class="container d-flex justify-content-center align-items-center mb-3 mt-3 bg-white">
    <img src="{{URL::asset('images/principal/espe.png')}}" >
</div> -->

<div class="container mt-3 bg-white custom-font">
    <div class="row pt-4">
        <div class="col-12 col-sm-6">
            <h2 class="title">Noticias</h2>
            <div class="row">
                @foreach ($noticias as $noticia)
                <div class="col-6 col-md-4 pb-3">
                    <div class="card">
                        <img class="noticia" src="{{$noticia -> NOT_IMAGEN}}" class="card-img-top" alt="...">
                        <div class="card-body p-2">
                            <p class="card-text"><small class="text-muted">{{ $noticia->empresa->EMP_NOMBRE }}</small></p>
                            <h6 class="card-title">{{$noticia -> NOT_TITULO}}</h6>
                            <p class="card-text text-truncate m-0">
                                {{$noticia -> NOT_DESCRIPCION}}
                            </p>
                            <!--@if(Auth::check())
                            <a class="text-danger card-link" href="{{url('home/noticiadetail/'.$noticia->NOT_CODIGO.'')}}">Leer más</a>
                            @else
                            <a class="text-danger card-link" href="{{url('/noticiadetail/'.$noticia->NOT_CODIGO.'')}}">Leer más</a>
                            @endif -->
                            <!-- <p class="card-text"><small class="text-muted">Actualizada hace 3 mins</small></p> -->
                            <p class="card-text"><small class="text-muted">{{$noticia -> NOT_FECHA_INICIO}}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach  
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <h2 class="title">Objetos Recuperados En El Laboratorio</h2>
            <div class="row">
                @foreach($objetos as $objeto)
                <div class="col-6 col-md-4 pb-3">
                    <div class="card">
                        <img class="noticia" src="{{$objeto -> OBR_IMAGEN}}" class="card-img-top" alt="...">
                        <div class="card-body p-2">
                            <p class="card-text"><small class="text-muted">{{ $objeto ->empresa-> EMP_NOMBRE }}</small></p>
                            <h6 class="card-title">{{$objeto -> OBR_NOMBRE}}</h6>
                            <p class="card-text">{{$objeto -> OBR_DESCRIPCION}}</p>
                            <p class="card-text"><small class="text-muted">{{$objeto -> OBR_FECHA_RECEPCION}}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection