@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Editar Solicitud'))

<div class="container-fluid">
    <p class="h3" style="color: #ED7624">
        Materia: <span class="font-weight-normal">{{ $materia->MAT_NOMBRE }}</span>
    </p>

    <b>Los campos con <span class="text-danger">*</span> son obligatorios</b>
    <form class="form" id="form" action="{{url('/solicitud/update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="SOL_CODIGO" value="{{ $solicitud->SOL_CODIGO }}">
        
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
                    <input type="date" class="form-control" id="SOL_FECHA_USO" name="SOL_FECHA_USO" value="{{$solicitud->SOL_FECHA_USO}}" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="SOL_NOMBRELAB">Nombre del Laboratorio<span class="text-danger">*</span></label>
                    <input type="hidden" class="form-control" id="LAB_CODIGO" name="LAB_CODIGO">
                    <input type="input" onkeypress="return false" class="form-control" id="SOL_NOMBRELAB" name="SOL_NOMBRELAB" value="{{$solicitud->laboratorio->LAB_NOMBRE}}" required readonly>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="SOL_HORARIO_USO">Horario de uso<span class="text-danger">*</span></label>
                    <input type="input" onkeypress="return false" class="form-control" id="SOL_HORARIO_USO" name="SOL_HORARIO_USO" value="{{$solicitud->SOL_HORARIO_USO}}" required readonly>
                </div>
            </div>


            <div class="col">
                <div class="form-group">
                    <label for="SOL_TEMA_PRACTICA">Tema de Práctica/Proyecto<span class="text-danger">*</span> </label>
                    <input type="input" class="form-control" id="SOL_TEMA_PRACTICA" name="SOL_TEMA_PRACTICA" value="{{$solicitud->SOL_TEMA_PRACTICA}}" required>
                </div>
            </div>
        </div>           
        <label class="h5">Equipo Extra</label>
        <hr class="mt-0">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_CANTIDAD">Cantidad</label>         

                    <input type="hidden" value="{{$cont=1}}">           
                    @foreach ($detalleSolicitud as $detsol)  

                        @if($cont == 1)  
                            @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                                <input type="number" class="form-control" id="DETSOL_CANTIDAD" name="DETSOL_CANTIDAD" value="{{$detsol->DETSOL_CANTIDAD}}">       
                                <input type="hidden" value="{{$cont++}}">   
                            @endif   
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_DETALLE">Detalle</label>
                    <input type="hidden" value="{{$cont=1}}">    
                    @foreach ($detalleSolicitud as $detsol)    
                     @if($cont == 1)  
                        @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                            <input type="input" class="form-control" id="DETSOL_DETALLE" name="DETSOL_DETALLE" value="{{$detsol->DETSOL_DETALLE}}">    
                            <input type="hidden" value="{{$cont++}}">        
                            @endif    
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="DETSOL_OBSERVACION">Observaciones</label>
                    <input type="hidden" value="{{$cont=1}}">    
                    @foreach ($detalleSolicitud as $detsol)    
                     @if($cont == 1)  
                        @if($detsol->SOL_CODIGO == $solicitud->SOL_CODIGO)
                            <input type="input" class="form-control" id="DETSOL_OBSERVACION" name="DETSOL_OBSERVACION" value="{{$detsol->DETSOL_OBSERVACION}}">          
                            <input type="hidden" value="{{$cont++}}">        
                            @endif    
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

            
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Modificar</button>
        <a href="{{url('solicitud/'.$materia->MAT_CODIGO.'/index')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/solicitud.js') }}"></script> 
@endsection