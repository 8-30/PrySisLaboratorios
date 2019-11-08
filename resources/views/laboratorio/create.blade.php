<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Lorena Perez-David Esparza
 -->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear Laboratorio'))

<div class="container-fluid">
    
    <form action="{{url('/laboratorio/store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
            <div class="container-fluid">
                <p><h6>Los campos con <span style="color:#FF0000";>*</span> son obligatorios</h6></p>
                <div class="row" >
                    <div class="col">
                        <div class="form-group">
                            <label for="LAB_NOMBRE">Nombre<span style="color:#FF0000";>*</span></label>
                            <input type="text" class="form-control" id="LAB_NOMBRE" name="LAB_NOMBRE" placeholder="Nombre del laboratorio" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="LAB_CAPACIDAD">Capacidad<span style="color:#FF0000";>*</span></label>
                            <input type="number" class="form-control" id="LAB_CAPACIDAD" name="LAB_CAPACIDAD" min="0" max="30" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="CAM_CODIGO">Campus<span style="color:#FF0000";>*</span></label>
                            <select type="input" class="form-control" id="CAM_CODIGO" name="CAM_CODIGO" placeholder="Campus"  required>
                            @foreach ($campus as $cam)
                                    <option value="{{$cam->CAM_CODIGO}}">{{$cam->CAM_NOMBRE}}</option>
                            @endforeach
                            </select> 
                        </div>
                    </div>

                <div class="col">
                    <div class="form-group">
                        <label for="EMP_CODIGO">Empresa<span style="color:#FF0000";>*</span></label>
                        <select type="input" class="form-control" id="EMP_CODIGO" name="EMP_CODIGO" placeholder="Empresa"  required>
                            @foreach ($empresas as $emp)
                                    <option value="{{$emp->EMP_CODIGO}}">{{$emp->EMP_NOMBRE}}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
            </div>
             <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mb-2">Crear</button>
                <a href="{{url('laboratorio')}}" class="btn btn-danger mb-2">Cancelar</a>
            </div>
            
    </form>
</div>
@endsection