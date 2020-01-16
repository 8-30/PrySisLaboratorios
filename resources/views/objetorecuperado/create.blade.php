<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Jerson Morocho
 -->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear Objeto'))

<div class="container">
    <div class="card border-primary mb-3">
        <div class="card-header">Recomendaciones</div>
        <div class="card-body text-primary">
            <p class="card-text">- Se recomienda seleccionar imagenes con una dimensión de la imagen a 200x200 y fondo blanco.</p>
            <p class="card-text">- Los campos con <span class="text-danger">*</span> son obligatorios.</p>
            <p class="card-text">- Dejar la fecha de entrega en blanco si el objeto aún no se ha entregado.</p>
        </div>
    </div>
</div>

<form action="{{url('/objeto/store')}}" method="POST" enctype="multipart/form-data"> 
    <div align="center">
    <img src="{{URL::asset('images/icons/imgicon.png')}}" alt="seleccione una imagen" id="pic" width="100" height="100" />
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" class="form-control" id="IMAGE_TEXT" name="IMAGE_TEXT">

    <div class="container-fluid">
        <div class="row" >
            <div class="col">
                <div class="form-group">
                    <label for="OBR_NOMBRE">Nombre<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="OBR_NOMBRE" name="OBR_NOMBRE" placeholder="El nombre del objeto recuperado..." required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="image">Imagen<span class="text-danger">*</span></label>
                    <input type="file" onchange="getbase64image(this)" style="display:none;" class="form-control" id="image" name="image" accept="image/*" required  ><br> 
                    <a href="javascript:document.getElementById('image').click(); " class="btn btn-primary mb-2">Agregar Imagen</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="OBR_DESCRIPCION">Descripcion<span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" id="OBR_DESCRIPCION" name="OBR_DESCRIPCION" 
                    placeholder="Añada una descripción del objeto en pocas lineas..." rows="3" required></textarea>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="OBR_OBSERVACION">Observacion</label>
                    <textarea type="text" class="form-control" id="OBR_OBSERVACION"  name="OBR_OBSERVACION"
                    placeholder="Añada una observación al objeto..." rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="OBR_FECHA_RECEPCION">Fecha de recuperación<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" onchange="validarDateObjetos()" id="OBR_FECHA_RECEPCION" name="OBR_FECHA_RECEPCION"  required>
                    <input type="date" class="form-control" style="display:none;" id="f1" name="f1"   >

                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="OBR_FECHA_ENTREGA">Fecha de entrega</label>
                    <input type="date" class="form-control" onchange="validarDateObjetos()" id="OBR_FECHA_ENTREGA" name="OBR_FECHA_ENTREGA"  >
                    <input type="date" class="form-control" style="display:none;" id="f2" name="f2"   >
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="PER_CODIGO">Periodo<span class="text-danger">*</span></label>
                    <select type="input" class="form-control" id="PER_CODIGO" name="PER_CODIGO" placeholder="Campus"  required>
                    @foreach ($periodos as $per)
                        @if($per->PER_CODIGO==$periodo->PER_CODIGO)
                            <option  selected value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                        @else
                            <option  value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                        @endif    
                    @endforeach
                    </select> 
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="EMP_CODIGO">Empresa<span class="text-danger">*</span></label>
                    <select type="input" class="form-control" id="EMP_CODIGO" name="EMP_CODIGO" placeholder="Empresa"  required>
                        @foreach ($empresas as $emp)
                                @if($emp->EMP_CODIGO==$empresa->EMP_CODIGO)
                                <option value="{{$empresa->EMP_CODIGO}} " selected >{{$empresa->EMP_NOMBRE}}</option>
                                @endif
                        @endforeach
                    </select> 
                </div>
            </div>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('objeto')}}" class="btn btn-danger mb-2">Cancelar</a>
    </div>
</form>
@endsection
<script type="text/javascript" src="{{ URL::asset('js/base64image.js') }}"></script> 