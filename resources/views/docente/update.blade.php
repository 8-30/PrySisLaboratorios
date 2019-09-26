@extends('layouts.principal')

@section('docente')

<div class="container">
    <h2>Actualizar docente</h2>
    <form action="{{url('/docente/update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="DOC_CODIGO" value="{{ $docente->DOC_CODIGO }}">


        <div class="form-group">
            <label for="DOC_CEDULA">Cedula</label>
            <input type="input" class="form-control" id="DOC_CEDULA" name="DOC_CEDULA" value="{{ $docente->DOC_CEDULA }}">
        </div>


        
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="DOC_MIESPE">Mi Espe</label>
                    <input type="input" class="form-control" id="DOC_MIESPE" name="DOC_MIESPE" value="{{ $docente->DOC_MIESPE }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="DOC_NOMBRES">Nombres</label>
                    <input type="input" class="form-control" id="DOC_NOMBRES" name="DOC_NOMBRES" value="{{ $docente->DOC_NOMBRES }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="DOC_APELLIDOS">Apellidos</label>
                    <input type="input" class="form-control" id="DOC_APELLIDOS" name="DOC_APELLIDOS" value="{{ $docente->DOC_APELLIDOS }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="DOC_CORREO">Correo</label>
                    <input type="input" class="form-control" id="DOC_CORREO" name="DOC_CORREO" value="{{ $docente->DOC_CORREO }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="DOC_CLAVE">Clave</label>
                    <input type="input" class="form-control" id="DOC_CLAVE" name="DOC_CLAVE" value="{{ $docente->DOC_CLAVE }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="DOC_TITULO">Titulo</label>
                    <input type="input" class="form-control" id="DOC_TITULO" name="DOC_TITULO" value="{{ $docente->DOC_TITULO }}">
                </div>
            </div>
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        <a href="/docente" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>

@stop