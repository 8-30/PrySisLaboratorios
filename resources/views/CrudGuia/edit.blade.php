<!--
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Mauro Morales - Jerson Morocho
 * Revisado por: 
 *
-->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Editar Guia'))

<div class="container-fluid">
    @if(isset($mensajes))
        <div class="alert alert-warning">
            {{ $mensajes }}
        </div>
    @endif 
    <p><h5>Los campos con <span style="color:#FF0000";>*</span> son obligatorios</h5></p> 
   
    <h3>Código {{ $guia->GUI_CODIGO }}: {{ $guia->GUI_FECHA }}</h3> 
    <form action="{{url('/guia/update')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="GUI_CODIGO" value="{{ $guia->GUI_CODIGO }}">
        <div class="row"> 
                <div class="col">
                    <div class="form-group">
                        <label for="DOC_CODIGO">Docente<span style="color:#FF0000";>*</span></label>
                        <select type="input" class="form-control" id="DOC_CODIGO" name="DOC_CODIGO" placeholder="Empresa"  required>
                            @foreach ($docentes as $doc)
                                    <option value="{{$doc->DOC_CODIGO}}">{{$doc->DOC_APELLIDOS}} {{$doc->DOC_NOMBRES}}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="MAT_CODIGO">Materias<span style="color:#FF0000";>*</span></label>
                        <select type="input" class="form-control" id="MAT_CODIGO" name="MAT_CODIGO" placeholder="Empresa"  required>
                            @foreach ($materias as $mat)
                                    <option value="{{$mat->MAT_CODIGO}}">{{$mat->MAT_NOMBRE}} {{$mat->MAT_NRC}}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
        </div>

        <div class="row">
        <div class="col">
                    <div class="form-group">
                        <label for="LAB_CODIGO">Periodos<span style="color:#FF0000";>*</span></label>
                        <select type="input" class="form-control" id="LAB_CODIGO" name="LAB_CODIGO" placeholder="Empresa"  required>
                            @foreach ($laboratorios as $lab)
                                    <option value="{{$lab->LAB_CODIGO}}">{{$lab->LAB_NOMBRE}}</option>
                            @endforeach
                        </select> 
                    </div>
            </div>
            <div class="col">
                    <div class="form-group">
                        <label for="PER_CODIGO">Periodos<span style="color:#FF0000";>*</span></label>
                        <select type="input" class="form-control" id="PER_CODIGO" name="PER_CODIGO" placeholder="Empresa"  required>
                            @foreach ($periodos as $per)
                                    <option value="{{$per->PER_CODIGO}}">{{$per->PER_NOMBRE}}</option>
                            @endforeach
                        </select> 
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_NUMERO">Numero Guia <span style="color:#FF0000";>*</span></label>
                    <input type="number"  class="form-control" name="GUI_NUMERO" required>
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                    <label for="GUI_FECHA"> Fecha Guia <span style="color:#FF0000";>*</span></label>
                    <input type="date"  class="form-control"  name="GUI_FECHA" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_DURACION">Duracion <span style="color:#FF0000";>*</span></label>
                    <input type="number"  class="form-control" name="GUI_DURACION" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="GUI_OBJETIVO">Objetivo <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_OBJETIVO" required>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_EQUIPO_MATERIALES">Equipo y Materiales <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_EQUIPO_MATERIALES" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="GUI_TRABAJO_PREPARATORIO">Trabajo Preparatorio<span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_TRABAJO_PREPARATORIO" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_ACTIVIDADES">Actividades <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_ACTIVIDADES" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="GUI_RESULTADOS">Resultados  <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_RESULTADOS" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_CONCLUSIONES">Conclusiones  <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_CONCLUSIONES" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="GUI_REFERENCIAS_BIBLIOGRAFICAS">Resultados Bibliograficos <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_REFERENCIAS_BIBLIOGRAFICAS" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_ELABORADO">Guia Elaboradra  <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_ELABORADO" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="GUI_APROBADO">Guia Aprobado <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_APROBADO" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_REGISTRADO">Guia Registrado  <span style="color:#FF0000";>*</span></label>
                    <input type="number"  class="form-control" name="GUI_REGISTRADO" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="GUI_INTRODUCCION">Guia Introducción <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_INTRODUCCION" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_COORDINADOR">Coordinador Guia  <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_COORDINADOR" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="GUI_RECOMENDACIONES">Recomendaciones  <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_RECOMENDACIONES" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="GUI_TEMA">Tema  <span style="color:#FF0000";>*</span></label>
                    <input type="text"  class="form-control" name="GUI_TEMA" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        <a href="{{url('guia')}}" class="btn btn-danger mb-2">Cancelar</a> 
    </form>
</div> 
@endsection
<script type="text/javascript" src="{{ URL::asset('js/base64image.js') }}"></script> 