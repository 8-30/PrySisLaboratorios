<!-- 
    Sistema de Gestion de Laboratorios - ESPE

    Author: Antony Andrade - Jonel Lopez
    Revisado por: Andrade - Jonel Lopez
-->


@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Actualizar Materiales Laboratorio'))

<div class="container-fluid">
    @if (session('title') && session('subtitle'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ session('title') }}</h4>
        <p>{{ session('subtitle') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form action="{{url('/materiales/laboratorio/update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="hidden" name="MATLAB_CODIGO" value="{{ $material->MATLAB_CODIGO }}">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="EMP_CODIGO">Empresa</label>
                    <select class="form-control" id="EMP_CODIGO" name="EMP_CODIGO" placeholder="Empresa" >
                     
                        <option value="{{$empresas->EMP_CODIGO}}">{{$empresas->EMP_NOMBRE}}</option>
                    
                    </select> 
                </div>
            </div>
             <div class="col">
                <div class="form-group">
                    <label for="PER_CODIGO">Periodos</label>
                    <select class="form-control" id="PER_CODIGO" name="PER_CODIGO" placeholder="Periodo" >
                        @foreach ($periodos as $per)
                        @if($per->PER_CODIGO == $material->PER_CODIGO)
                        <option value="{{$per->PER_CODIGO}}" selected="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                        @else
                        <option value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                        @endif
                        @endforeach
                    </select> 
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="LAB_CODIGO">Laboratorio</label>
                    <select class="form-control" id="LAB_CODIGO" name="LAB_CODIGO" placeholder="laboratorio" >
                        @foreach ($laboratorios as $lab)
                          @if($lab->LAB_CODIGO == $material->LAB_CODIGO)
                        <option value="{{$lab->LAB_CODIGO}}" selected="{{$lab->LAB_CODIGO}}">{{$lab->LAB_NOMBRE}}</option>
                         @else
                        <option value="{{$lab->LAB_CODIGO}}">{{$lab->LAB_NOMBRE}}</option>
                         @endif
                        @endforeach
                    </select> 
                </div>
            </div>
        </div>
       

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="MATLAB_CANTIDAD">Cantidad</label>
                    <input type="text" class="form-control" id="MATLAB_CANTIDAD" name="MATLAB_CANTIDAD" placeholder="Cantidad" value="{{$material->MATLAB_CANTIDAD}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MATLAB_DETALLE">Detalle</label>
                    <input type="text" class="form-control" id="MATLAB_DETALLE" name="MATLAB_DETALLE" placeholder="Detalle" value="{{$material->MATLAB_DETALLE}}">
                </div>
            </div>

           <div class="col">
          <div class="form-group">
                    <label for="MATLAB_OBSERVACION">Observacion</label>
                    <input type="text" class="form-control" id="MATLAB_OBSERVACION" name="MATLAB_OBSERVACION" placeholder="Detalle" value="{{$material->MATLAB_OBSERVACION}}">
            </div>
            </div>

        </div>

      
      
    

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        <a href="{{url('materiales/laboratorio')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection