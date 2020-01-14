<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Lorena Perez-David Esparza
 -->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Actualizar Laboratorio'))
    
<div class="container-fluid">
    <form action="{{url('/laboratorio/update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="LAB_CODIGO" value="{{ $laboratorio->LAB_CODIGO }}">

        <div class="container-fluid">
            <p><h6>Los campos con <span style="color:#FF0000";>*</span> son obligatorios</h6></p>
            <div class="row">
                <div class="col">
                <div class="form-group">
                    <label for="LAB_NOMBRE">Nombre<span style="color:#FF0000";>*</span></label>
                    <input type="input" class="form-control" id="LAB_NOMBRE" name="LAB_NOMBRE" placeholder="Nombre del laboratorio" value="{{ $laboratorio->LAB_NOMBRE }}" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="LAB_CAPACIDAD">Capacidad<span style="color:#FF0000";>*</span></label>
                    <input type="input" class="form-control" id="LAB_CAPACIDAD" name="LAB_CAPACIDAD" value="{{ $laboratorio->LAB_CAPACIDAD }}" required>
                </div>
            </div>
            </div>
            <div class="row" >
                    <div class="col">
                        <div class="form-group">
                            <label for="LAB_ABREVIATURA">Abreviatura<span style="color:#FF0000";>*</span></label>
                            <input type="text" class="form-control" id="LAB_ABREVIATURA" name="LAB_ABREVIATURA" value="{{ $laboratorio->LAB_ABREVIATURA }}"  required>
                        </div>
                    </div>
                    
                    <div class="col" style="display: flex;align-items: center;">
                        <div class="custom-control custom-switch">
                            @if ($laboratorio->LAB_ESTADO === 0)
                            <input type="checkbox" class="custom-control-input" id="LAB_ESTADO" name="LAB_ESTADO">
                            @elseif ($laboratorio->LAB_ESTADO === 1)
                            <input type="checkbox" class="custom-control-input" id="LAB_ESTADO" name="LAB_ESTADO" checked>
                            @endif
                            <label class="custom-control-label" for="LAB_ESTADO">Estado<span style="color:#FF0000";>*</span></label>
                        </div>
                    </div>
                </div>
              <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="CAM_CODIGO">Campus<span style="color:#FF0000";>*</span></label>
                    <select type="input" class="form-control" id="CAM_CODIGO" name="CAM_CODIGO"  >
                        @foreach ($campus as $cam)
                            @if($cam->CAM_CODIGO==$laboratorio->CAM_CODIGO)
                                <option value="{{$cam->CAM_CODIGO}}" selected="{{$cam->CAM_CODIGO}}">{{$cam->CAM_NOMBRE}}</option>
                            @else
                                <option value="{{$cam->CAM_CODIGO}}"  >{{$cam->CAM_NOMBRE}}</option>
                            @endif
                        @endforeach
                    </select> 
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="EMP_CODIGO">Empresa<span style="color:#FF0000";>*</span></label>
                    <select type="input" class="form-control" id="EMP_CODIGO" name="EMP_CODIGO"  >
                        @foreach ($empresas as $emp)
                            @if($emp->EMP_CODIGO==$laboratorio->EMP_CODIGO)
                                <option value="{{$emp->EMP_CODIGO}}" selected="{{$emp->EMP_CODIGO}}">{{$emp->EMP_NOMBRE}}</option>
                            @else
                                <option value="{{$emp->EMP_CODIGO}}"  >{{$emp->EMP_NOMBRE}}</option>
                            @endif
                        @endforeach
                    </select> 
                </div>
            </div>

        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        <a href="{{url('laboratorio')}}" class="btn btn-danger mb-2">Cancelar</a>
        </div>

      
    </form>
</div>
@endsection