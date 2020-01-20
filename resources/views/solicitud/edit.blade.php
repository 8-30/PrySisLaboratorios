@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Editar Solicitud'))

<div class="container-fluid">
    @foreach ($materia as $mat)
        @if($mat->MAT_CODIGO == $solicitud->MAT_CODIGO)
        <p class="h3" style="color: #ED7624">
            Materia: <span class="font-weight-normal">{{ $mat->MAT_NOMBRE }}</span>
        </p>
        @endif
    @endforeach

    <b>Los campos con <span class="text-danger">*</span> son obligatorios</b>
    <form class="form" id="form" action="{{url('/solicitud/update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="LAB_NOMBRE">Fecha de Solicitud<span class="text-danger">*</span></label>
                    <input type="input" class="form-control" id="SOL_FECHA" name="SOL_FECHA" value="{{$solicitud->SOL_FECHA}}" readonly>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="SOL_FECHA_USO">Fecha de uso<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="SOL_FECHA_USO" name="SOL_FECHA_USO" value="{{$solicitud->SOL_FECHA_USO}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="SOL_NOMBRELAB">Nombre del Laboratorio<span class="text-danger">*</span></label>
                    @foreach ($laboratorio as $labs)    
                        @if($labs->LAB_CODIGO == $solicitud->LAB_CODIGO)
                            <input type="hidden" class="form-control" id="LAB_CODIGO" name="LAB_CODIGO">
                            <input type="input" onkeypress="return false" class="form-control" id="SOL_NOMBRELAB" name="SOL_NOMBRELAB" value="{{$labs->LAB_NOMBRE}}"readonly></option>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="SOL_HORARIO_USO">Horario de uso<span class="text-danger">*</span></label>
                    <input type="input" onkeypress="return false" class="form-control" id="SOL_HORARIO_USO" name="SOL_HORARIO_USO" value="{{$solicitud->SOL_HORARIO_USO}}"readonly>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="SOL_TEMA_PRACTICA">Tema de Práctica/Proyecto<span class="text-danger">*</span> </label>
                    <input type="input" class="form-control" id="SOL_TEMA_PRACTICA" name="SOL_TEMA_PRACTICA" value="{{$solicitud->SOL_TEMA_PRACTICA}}" readonly>
                </div>
            </div>
        </div>

        <label class="h5">Equipo Extra</label>
        <hr class="mt-0">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_CANTIDAD">Cantidad</label>
                    @foreach ($detalleSolicitud as $detsol)    
                        @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                            <input type="number" class="form-control" id="DETSOL_CANTIDAD" name="DETSOL_CANTIDAD" value="{{$detsol->DETSOL_CANTIDAD}}" readonly>          
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_DETALLE">Detalle</label>
                    @foreach ($detalleSolicitud as $detsol)    
                        @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                            <input type="input" class="form-control" id="DETSOL_DETALLE" name="DETSOL_DETALLE" value="{{$detsol->DETSOL_DETALLE}}" readonly>          
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_OBSERVACION">Observaciones</label>
                    @foreach ($detalleSolicitud as $detsol)    
                        @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                            <input type="input" class="form-control" id="DETSOL_OBSERVACION" name="DETSOL_OBSERVACION" value="{{$detsol->DETSOL_OBSERVACION}}" readonly>          
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        @foreach ($materia as $mat)
            @if($mat->MAT_CODIGO == $solicitud->MAT_CODIGO)
                <a href="{{url('solicitud/'.$mat->MAT_CODIGO.'/index')}}" class="btn btn-danger mb-2">Cancelar</a> 
            @endif
        @endforeach
    </form>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/solicitud.js') }}"></script> 
@endsection
