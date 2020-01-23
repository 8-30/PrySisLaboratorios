<!-- 
    Sistema de Gestion de Laboratorios - ESPE

    Author: Antony Andrade - Jonel Lopez
    Revisado por: Andrade - Jonel Lopez
-->

@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear Materiales Laboratorio'))

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
    <form action="{{url('/materiales/laboratorio/store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                       
                        <option value="{{$periodos->PER_CODIGO}}">{{$periodos->PER_NOMBRE}}</option>
                    
                    </select> 
                </div>
            </div>
             <div class="col">
                <div class="form-group">
                    <label for="LAB_CODIGO">Laboratorio</label>
                    <select class="form-control" id="LAB_CODIGO" name="LAB_CODIGO" placeholder="laboratorio" >
                        @foreach ($laboratorios as $lab)
                        <option value="{{$lab->LAB_CODIGO}}">{{$lab->LAB_NOMBRE}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>
        </div>
       

        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="MATLAB_CANTIDAD">Cantidad</label>
                    <input type="text" class="form-control" id="MATLAB_CANTIDAD" name="MATLAB_CANTIDAD" placeholder="Cantidad">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MATLAB_DETALLE">Detalle</label>
                    <input type="text" class="form-control" id="MATLAB_DETALLE" name="MATLAB_DETALLE" placeholder="Detalle">
                </div>
            </div>

            <div class="col">
              <div class="form-group">
                    <label for="MATLAB_OBSERVACION">Observacion</label>
                    <input type="text" class="form-control" id="MATLAB_OBSERVACION" name="MATLAB_OBSERVACION" placeholder="Detalle">
            </div>
            </div>


        </div>

       
        

      
    

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('materiales/laboratorio')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection