<!--
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Mauro Morales - Jerson Morocho
 * Revisado por: 
 *
-->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear Empresa'))

<div class="container-fluid">
    @if(isset($mensajes))
        <div class="alert alert-warning">
            {{ $mensajes }}
        </div>
    @endif 
    <div align="center">
        <img src="{{URL::asset('images/icons/imgicon.png')}}" alt="seleccione una imagen" id="pic" width="500" height="200" />
    </div>
    <p><h5>Los campos con <span style=a"color:#FF0000";>*</span> son obligatorios</h5></p> 
    <form action="{{url('/empresa/store')}}" method="post">
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" id="IMAGE_TEXT" name="IMAGE_TEXT"  >
        <div class="row"> 
            <div class="col">
                <div class="form-group">
                    <label for="EMP_NOMBRE">Nombre Laboratorio General <span style="color:#FF0000";>*</span></label>
                    <input type="text" class="form-control"  name="EMP_NOMBRE" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="EMP_FIRMA_DEE"> Director de Departamento <span style="color:#FF0000";>*</span></label>
                    <input type="text" class="form-control"  name="EMP_FIRMA_DEE" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="EMP_PIE_DEE:">Cargo del Director Departamento <span style="color:#FF0000";>*</span></label>
                    <input type="text" class="form-control"  name="EMP_PIE_DEE"  required>
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                    <label for="EMP_FIRMA_JEFE">Jefe del Laboratorio <span style="color:#FF0000";>*</span></label>
                    <input type="text" class="form-control"  name="EMP_FIRMA_JEFE"  required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="EMP_PIE_JEFE">Cargo del Jefe de Laboratorio <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="EMP_PIE_JEFE" required>
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                    <label for="EMP_FIRMA_LAB"> Laboratorista <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control"  name="EMP_FIRMA_LAB" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="EMP_PIE_LAB">Cargo del Laboratorista <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="EMP_PIE_LAB" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="EMP_RELACION_SUFICIENCIA">Relacion Suficiencia <span style="color:#FF0000";>*</span></label>
                    <input type="number"  class="form-control" name="EMP_RELACION_SUFICIENCIA" required>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="EMP_IMAGEN_ENCABEZADO">Imagen Encabezado <span style="color:#FF0000";>*</span></label>
                    <input type="file" onchange="getbase64image(this)" class="form-control" id="image" name="image" accept="image/*"  >
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="EMP_IMAGEN_ENCABEZADO2">Imagen Encabezado 2 <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="EMP_IMAGEN_ENCABEZADO2" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="EMP_AUX1">Auxiliar <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="EMP_AUX1" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="EMP_AUX2">Auxiliar 2 <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="EMP_AUX2" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="INS_CODIGO">Institucion <span style="color:#FF0000";>*</span></label>
                    <select class="form-control" id="INS_CODIGO" name="INS_CODIGO" placeholder="Institucion"  required>
                        @foreach ($instituciones as $ins)
                        <option value="{{$ins->INS_CODIGO}}">{{$ins->INS_NOMBRE}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>
            <div class="col" style="display: flex;align-items: center;">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="EMP_ESTADO" name="EMP_ESTADO">
                    <label class="custom-control-label" for="EMP_ESTADO">Estado del Laboratorio</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('empresa')}}" class="btn btn-danger mb-2">Cancelar</a> 
    </form>
</div> 
@endsection
<script type="text/javascript" src="{{ URL::asset('js/base64image.js') }}"></script> 