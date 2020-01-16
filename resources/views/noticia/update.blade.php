<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Lorena Perez-David Esparza
 Revisado por: Jerson Morocho
 -->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Actualizar Noticia'))
    
<div class="container">
    <div class="card border-primary mb-3">
        <div class="card-header">Recomendaciones</div>
        <div class="card-body text-primary">
            <p class="card-text">- Se recomienda seleccionar imagenes con una dimensión de la imagen a 200x200 y fondo blanco.</p>
            <p class="card-text">- Los campos con <span class="text-danger">*</span> son obligatorios</p>
        </div>
    </div>
</div>

<form action="{{url('/noticia/update')}}" method="POST" enctype="multipart/form-data">
    <div align="center">
         @if(isset($noticia->NOT_IMAGEN))
         <img src="{{$noticia -> NOT_IMAGEN}}"  id="pic" width="100" height="100" />
         @else
         <img src="{{URL::asset('images/icons/imgicon.png')}}"  id="pic" width="100" height="100" />
         @endif   
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="NOT_CODIGO" value="{{ $noticia->NOT_CODIGO }}">
    <input type="hidden" class="form-control" id="IMAGE_TEXT" name="IMAGE_TEXT" value="{{ $noticia->NOT_IMAGEN }}"  >

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="NOT_TITULO">Titulo<span style="color:#FF0000";>*</span></label>
                    <input type="text" class="form-control" id="NOT_TITULO" name="NOT_TITULO" value="{{ $noticia->NOT_TITULO }}" placeholder="Escriba el titulo de la noticia..." required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="image">Imagen<span style="color:#FF0000";>*</span></label>
                    @if(isset($noticia->NOT_IMAGEN))
                    <input type="file" onchange="getbase64image(this)"  style="display:none;" class="form-control" id="image" name="image" accept="image/*"  ><br> 
                    <a href="javascript:document.getElementById('image').click(); " class="btn btn-primary mb-2">Cambiar Imagen</a>
                    @else
                        <input type="file" onchange="getbase64image(this)"  style="display:none;" class="form-control" id="image" name="image" accept="image/*"  ><br> 
                        <a href="javascript:document.getElementById('image').click(); " class="btn btn-primary mb-2">Agregar Imagen</a>
                        @endif   
                    
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="NOT_DESCRIPCION">Descripcion<span style="color:#FF0000";>*</span></label>
                    <textarea type="text" maxlength="460"  class="form-control" id="NOT_DESCRIPCION" name="NOT_DESCRIPCION" required  placeholder="Coloque una descripción de la noticia...">{{$noticia->NOT_DESCRIPCION}}</textarea>
                    
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="NOT_FECHA_INICIO">Fecha de inicio de visualización<span style="color:#FF0000";>*</span></label>
                    <input type="date" class="form-control" id="NOT_FECHA_INICIO" name="NOT_FECHA_INICIO"  onchange="validarDateNoticias()"  value="{{ $noticia->NOT_FECHA_INICIO }}" required>
                    <input type="date" class="form-control" style="display:none;" id="f1" name="f1" value="{{ $noticia->NOT_FECHA_INICIO }}"  >

                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="NOT_FECHA_FIN">Fecha de finalización de visualización<span style="color:#FF0000";></span></label>
                    <input type="date" class="form-control" id="NOT_FECHA_FIN" name="NOT_FECHA_FIN" onchange="validarDateNoticias()"   value="{{ $noticia->NOT_FECHA_FIN}}"  required >
                    <input type="date" class="form-control" style="display:none;" id="f2" name="f2" value="{{ $noticia->NOT_FECHA_FIN }}"  >

                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="PER_CODIGO">Seleccione el periodo<span style="color:#FF0000";>*</span></label>
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
                    <label for="EMP_CODIGO">Seleccione la empresa<span style="color:#FF0000";>*</span></label>
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
        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        <a href="{{url('noticia')}}" class="btn btn-danger mb-2">Cancelar</a>
    </div>
</form>
@endsection
<script type="text/javascript" src="{{ URL::asset('js/base64image.js') }}"></script> 