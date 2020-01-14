@extends('app')
@section('css')
  <link href="{{ URL::asset('assets/font/font.css') }}" rel='stylesheet' type='text/css' />
  <link href="{{ URL::asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' media="screen"/>
@endsection

@section('content')
<!-- <div class="container d-flex justify-content-center align-items-center mb-3 mt-3 bg-white">
    <img src="{{URL::asset('images/principal/espe.png')}}" >
</div> -->

<<<<<<< Updated upstream
<div class="container mt-3 bg-white custom-font">
    <div class="row pt-4">
        <div class="col-12 col-sm-6">
            <h2 class="title">Noticias</h2>
            <div class="row">
                @foreach ($noticias as $noticia)
                <div class="col-4 pb-3">
                    <div class="card">
                        <img src="{{$noticia -> NOT_IMAGEN}}" class="card-img-top" alt="...">
                        <div class="card-body p-2">
                            <p class="card-text"><small class="text-muted">{{ $noticia -> EMP_CODIGO }}</small></p>
                            <h6 class="card-title">{{$noticia -> NOT_TITULO}}</h6>
                            <p class="card-text text-truncate m-0">
                                {{$noticia -> NOT_DESCRIPCION}}
                            </p>
                            @if(Auth::check())
                            <a class="text-danger card-link" href="{{url('home/noticiadetail/'.$noticia->NOT_CODIGO.'')}}">Leer más</a>
                            @else
                            <a class="text-danger card-link" href="{{url('/noticiadetail/'.$noticia->NOT_CODIGO.'')}}">Leer más</a>
                            @endif
                            <!-- <p class="card-text"><small class="text-muted">Actualizada hace 3 mins</small></p> -->
                            <p class="card-text"><small class="text-muted">{{$noticia -> NOT_FECHA_INICIO}}</small></p>
                        </div>
                    </div>
=======
<div class="container container-main bg-white">
    <div class="content_area">
        <div class="col-sm-6">
            <div class="left_coloum floatleft">
                <div class="single_left_coloum_wrapper">
                    <h2 class="title">Noticias</h2>
                    @forelse($noticias as $noticia)
                    <div class="single_left_coloum floatleft">
                        <img class="noticia" src="{{$noticia -> NOT_IMAGEN}}"/>
                        <h3>{{$noticia -> NOT_TITULO}}</h3>
                        <p>{{$noticia -> NOT_DESCRIPCION}}</p>
                        
                        @if(Auth::check())
                            <a class="readmore" href="{{url('home/noticiadetail/'.$noticia->NOT_CODIGO.'')}}">leer mas</a>    
                        @else
                            <a class="readmore" href="{{url('/noticiadetail/'.$noticia->NOT_CODIGO.'')}}">leer mas</a>
                        @endif
                    </div>    
                    @empty

                    @endforelse  
>>>>>>> Stashed changes
                </div>
                @endforeach  
            </div>
        </div>
<<<<<<< Updated upstream
=======
        
        <div class="col-sm-6">
            <div class="left_coloum floatright">
                <div class="single_left_coloum_wrapper">
                    <h2 class="title">Objetos Recuperados En El Laboratorio</h2>
                    @forelse($objetos as $objeto)
                    <div class="single_left_coloum floatright">
                        <img class="noticia" src="{{$objeto ->  OBR_IMAGEN}}"/>
                        <h3>{{$objeto -> OBR_NOMBRE}}</h3>
                        <p>{{$objeto -> OBR_DESCRIPCION}}</p>
                        
                    </div>    
                    @empty
>>>>>>> Stashed changes

        <div class="col-12 col-sm-6">
            <h2 class="title">Objetos Recuperados En El Laboratorio</h2>
            <div class="row">
                @foreach($objetos as $objeto)
                <div class="col-4 pb-3">
                    <div class="card">
                        <img src="{{$objeto -> OBR_IMAGEN}}" class="card-img-top" alt="...">
                        <div class="card-body p-2">
                            <p class="card-text"><small class="text-muted">{{ $objeto -> EMP_CODIGO }}</small></p>
                            <h6 class="card-title">{{$objeto -> OBR_NOMBRE}}</h6>
                            <p class="card-text">{{$objeto -> OBR_DESCRIPCION}}</p>
                            <p class="card-text"><small class="text-muted">Actualizada hace 3 mins</small></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection