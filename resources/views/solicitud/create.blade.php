@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear Solicitud'))

<div class="container-fluid">
    <p class="h3" style="color: #ED7624">
        Materia: <span class="font-weight-normal">{{ $materia->MAT_NOMBRE }}</span>
    </p>

    <b>Los campos con <span class="text-danger">*</span> son obligatorios</b>
    <form class="form" id="form" action="{{url('/solicitud/store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="LAB_NOMBRE">Fecha de Solicitud<span class="text-danger">*</span></label>
                    <input type="input" class="form-control" id="SOL_FECHA" name="SOL_FECHA" readonly value="{{$fecha}}">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="SOL_FECHA_USO">Fecha de uso<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="SOL_FECHA_USO" name="SOL_FECHA_USO" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="SOL_NOMBRELAB">Nombre del Laboratorio<span class="text-danger">*</span></label>
                    <input type="hidden" class="form-control" id="LAB_CODIGO" name="LAB_CODIGO">
                    <input type="input" onkeypress="return false" class="form-control" id="SOL_NOMBRELAB" name="SOL_NOMBRELAB" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="SOL_HORARIO_USO">Horario de uso<span class="text-danger">*</span></label>
                    <input type="input" onkeypress="return false" class="form-control" id="SOL_HORARIO_USO" name="SOL_HORARIO_USO" required>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="SOL_TEMA_PRACTICA">Tema de Práctica/Proyecto<span class="text-danger">*</span> </label>
                    <input type="input" class="form-control" id="SOL_TEMA_PRACTICA" name="SOL_TEMA_PRACTICA" required>
                </div>
            </div>
        </div>

        <label class="h5">Equipo Extra</label>
        <hr class="mt-0">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_CANTIDAD">Cantidad</label>
                    <input type="number" class="form-control" id="DETSOL_CANTIDAD" name="DETSOL_CANTIDAD">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_DETALLE">Detalle</label>
                    <input type="input" class="form-control" id="DETSOL_DETALLE" name="DETSOL_DETALLE">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_OBSERVACION">Observaciones</label>
                    <input type="input" class="form-control" id="DETSOL_OBSERVACION" name="DETSOL_OBSERVACION">
                </div>
            </div>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('solicitud/'.$materia->MAT_CODIGO.'/index')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/solicitud.js') }}"></script> 
@endsection