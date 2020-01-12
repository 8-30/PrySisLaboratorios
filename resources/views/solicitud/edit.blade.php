@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Editar Solicitud'))
<div class="container-fluid">
    campos con <span style="color:#FF0000";>*</span> son obligatorios</h5></p> <form action="{{url('/solicitud/update')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
        <div class="form-group row">
                <label for="SOL_FECHA"class="col-sm-2 col-form-label">Fecha de Solicitud<span style="color:#FF0000";>*</span></label>
                <div class="col-sm-3">
                    <input type="input" class="form-control" id="SOL_FECHA" name="SOL_FECHA" value="{{$solicitud->SOL_FECHA}}" readonly>
                </div>
        </div>

        <div class="form-group row">
            <label for="SOL_FECHA_USO"class="col-sm-2 col-form-label">Fecha de uso<span style="color:#FF0000";>*</span></label>
            <div class="col-sm-3">
             
                <input type="date" class="form-control" id="SOL_FECHA_USO" name="SOL_FECHA_USO" value="{{$solicitud->SOL_FECHA_USO}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="SOL_NOMBRELAB"class="col-sm-2 col-form-label">Nombre del Laboratorio<span style="color:#FF0000";>*</span></label>
            <div class="col-sm-6">
                @foreach ($laboratorio as $labs)    
                    @if($labs->LAB_CODIGO == $solicitud->LAB_CODIGO)
                        <input type="hidden" class="form-control" id="LAB_CODIGO" name="LAB_CODIGO">
                        <input type="input" onkeypress="return false" class="form-control" id="SOL_NOMBRELAB" name="SOL_NOMBRELAB" value="{{$labs->LAB_NOMBRE}}"readonly></option>
                                                
                    @endif
                @endforeach
                
            </div>
        </div>
            
        <div class="form-group row">
            <label for="SOL_HORARIO_USO"class="col-sm-2 col-form-label">Horario de uso<span style="color:#FF0000";>*</span></label>
            <div class="col-sm-6">
                <input type="input" onkeypress="return false" class="form-control" id="SOL_HORARIO_USO" name="SOL_HORARIO_USO" value="{{$solicitud->SOL_HORARIO_USO}}"readonly>
            </div>
        </div>

        <div class="form-group row">    
            <label for="SOL_TEMA_PRACTICA"class="col-sm-2 col-form-label">Tema de Práctica/Proyecto<span style="color:#FF0000";>*</span> </label>
            <div class="col-sm-6">
                <input type="input" class="form-control" id="SOL_TEMA_PRACTICA" name="SOL_TEMA_PRACTICA" value="{{$solicitud->SOL_TEMA_PRACTICA}}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="DETSOL_CANTIDAD"class="col-sm-2 col-form-label">Cantidad<span style="color:#FF0000";>*</span></label>
            <div class="col-sm-6">
                @foreach ($detalleSolicitud as $detsol)    
                    @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                        <input type="number" class="form-control" id="DETSOL_CANTIDAD" name="DETSOL_CANTIDAD" value="{{$detsol->DETSOL_CANTIDAD}}" readonly>          
                    @endif
                @endforeach
                
            </div>
        </div>

        <div class="form-group row">
            <label for="DETSOL_DETALLE"class="col-sm-2 col-form-label">Detalle<span style="color:#FF0000";>*</span></label>
            <div class="col-sm-6">
                @foreach ($detalleSolicitud as $detsol)    
                    @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                        <input type="input" class="form-control" id="DETSOL_DETALLE" name="DETSOL_DETALLE" value="{{$detsol->DETSOL_DETALLE}}" readonly>          
                    @endif
                @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label for="DETSOL_OBSERVACION"class="col-sm-2 col-form-label">Observaciones<span style="color:#FF0000";>*</span> </label>
            <div class="col-sm-6">
                @foreach ($detalleSolicitud as $detsol)    
                    @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                        <input type="input" class="form-control" id="DETSOL_OBSERVACION" name="DETSOL_OBSERVACION" value="{{$detsol->DETSOL_OBSERVACION}}" readonly>          
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        @foreach ($materia as $mat)
            @if($mat->MAT_CODIGO == $solicitud->MAT_CODIGO)
                <a href="{{url('solicitud/listarSolicitud/'.$mat->MAT_CODIGO)}}" class="btn btn-danger mb-2">Cancelar</a> 
            @endif
        @endforeach

    </form>
</div>
@endsection
@section('js')
 <script type="text/javascript" src="{{ URL::asset('js/solicitud.js') }}"></script> 
@endsection
