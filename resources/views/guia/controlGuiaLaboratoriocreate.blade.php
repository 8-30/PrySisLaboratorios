@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear GUIA'))

<div class="container-fluid">
    <p><h6>Los campos con <span style="color:#FF0000";>*</span> son obligatorios</h6></p>
    <form class="form" id="form" action="{{url('/guia/guardarGuia')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="GUI_NUMERO" name="GUI_NUMERO" readonly value="@if(isset($guia)) {{$guia->GUI_NUMERO}} @endif">
        <input type="hidden" id="LAB_CODIGO" name="LAB_CODIGO" readonly value="@if(isset($guia)) {{$guia->LAB_CODIGO}} @endif">
        <input type="hidden" name="CON_CODIGO" id="CON_CODIGO" value="@if(isset($fecha)) {{$fecha->CON_CODIGO}} @endif">
            <div class="form-group row">
                <label for="GUI_FECHA"class="col-sm-2 col-form-label">Fecha<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-3">
                @if(isset($fecha)) 
                    <input type="input" class="form-control" id="GUI_FECHA" name="GUI_FECHA" readonly value="{{$fecha->CON_DIA}} ">
                    <span style="color:#FF0000";>Tiene Guias Atrasadas</span>
                @else   
                    <input type="date" class="form-control" id="GUI_FECHA" name="GUI_FECHA">
                @endif
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_TEMA"class="col-sm-2 col-form-label">Tema<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="GUI_TEMA" name="GUI_TEMA"   value="@if(isset($guia)) {{$guia->GUI_TEMA}} @endif" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_INTRODUCCION"class="col-sm-2 col-form-label">Introduccion<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                        <input type="input" class="form-control" id="GUI_INTRODUCCION" name="GUI_INTRODUCCION"   value="@if(isset($guia)) {{$guia->GUI_INTRODUCCION}} @endif" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_OBJETIVO"class="col-sm-2 col-form-label">Objetivos<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                        <input type="input" class="form-control" id="GUI_OBJETIVO" name="GUI_OBJETIVO"    value="@if(isset($guia)) {{$guia->GUI_OBJETIVO}} @endif" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_EQUIPO_MATERIALES"class="col-sm-2 col-form-label">Equipos y Materiales<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                        <textarea type="input" class="form-control" id="GUI_EQUIPO_MATERIALES" name="GUI_EQUIPO_MATERIALES" required>@if(isset($guia)){{$guia->GUI_EQUIPO_MATERIALES}} @endif</textarea>
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_TRABAJO_PREPARATORIO"class="col-sm-2 col-form-label">Instrucciones<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                        <textarea type="input" class="form-control" id="GUI_TRABAJO_PREPARATORIO" name="GUI_TRABAJO_PREPARATORIO" required>@if(isset($guia)){{$guia->GUI_TRABAJO_PREPARATORIO}} @endif</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_ACTIVIDADES"class="col-sm-2 col-form-label">Actividades por desarrollar<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                        <textarea type="input" class="form-control" id="GUI_ACTIVIDADES" name="GUI_ACTIVIDADES" required>@if(isset($guia)){{$guia->GUI_ACTIVIDADES}} @endif</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_RESULTADOS"class="col-sm-2 col-form-label">Resultados obtenidos<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                        <textarea type="input" class="form-control" id="GUI_RESULTADOS" name="GUI_RESULTADOS" required>@if(isset($guia)){{$guia->GUI_RESULTADOS}} @endif</textarea>                
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_CONCLUSIONES"class="col-sm-2 col-form-label">Concluciones</label>
                <div class="col-sm-10">
                        <input type="input" class="form-control" id="GUI_CONCLUSIONES" name="GUI_CONCLUSIONES" value="@if(isset($guia)) {{$guia->GUI_CONCLUSIONES}} @endif">
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_RECOMENDACIONES"class="col-sm-2 col-form-label">Recomendaciones</label>
                <div class="col-sm-10">
                        <input type="input" class="form-control" id="GUI_RECOMENDACIONES" name="GUI_RECOMENDACIONES" value="@if(isset($guia)) {{$guia->GUI_RECOMENDACIONES}} @endif">
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_REFERENCIAS_BIBLIOGRAFICAS"class="col-sm-2 col-form-label">Referencias Bibliograficas </label>
                <div class="col-sm-10">
                        <input type="input" class="form-control" id="GUI_REFERENCIAS_BIBLIOGRAFICAS" name="GUI_REFERENCIAS_BIBLIOGRAFICAS" value="@if(isset($guia)) {{$guia->GUI_REFERENCIAS_BIBLIOGRAFICAS}} @endif">
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_COORDINADOR"class="col-sm-2 col-form-label">Coordinador Area<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                        <input type="input" class="form-control" id="GUI_COORDINADOR" name="GUI_COORDINADOR"  value="@if(isset($guia)) {{$guia->GUI_COORDINADOR}} @endif" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="GUI_DURACION"class="col-sm-2 col-form-label">Duracion<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-10">
                    @if(isset($guia))
                        <input type="input" class="form-control" id="GUI_DURACION" name="GUI_DURACION"   value="@if(isset($guia)){{$guia->GUI_DURACION}}@endif" required>
                    @else
                      <input type="number" class="form-control" id="GUI_DURACION" name="GUI_DURACION" required>
                    @endif
                </div>
            </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('guia/crearGuia')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection