@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Editar Control'))


 <body >
        <div class="container">
                <h2>Editar Control</h2>
                <h3>CODIGO {{ $control->CON_CODIGO }}: {{ $control->CON_DIA }}</h3>
           
         <form  action="/control/update"  method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="CON_CODIGO" value="{{ $control->CON_CODIGO }}">
                <div class="row"> 
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_DIA">Dia*</label>
                                        <input type="date" class="form-control"  name="CON_DIA" value="{{$control->CON_DIA}}" required>
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_HORA_ENTRADA">Hora Entrada*</label>
                                        <input type="time" class="form-control"  name="CON_HORA_ENTRADA" value="{{$control->CON_HORA_ENTRADA}}" required >
                                </div>
                        </div>
                     
                        
                   </div>  
                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_HORA_SALIDA">Hora Salida*</label>
                                        <input type="time" class="form-control"  name="CON_HORA_SALIDA" value="{{$control->CON_HORA_SALIDA}}" required>
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_LAB_ABRE">Laboratorio Abre</label>
                                        <input type="text" class="form-control"  name="CON_LAB_ABRE" value="{{$control->CON_LAB_ABRE}}">
                                </div>
                        </div>
                   </div> 
                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_HORA_ENTRADA_R">Hora Entrada Registro</label>
                                        <input type="time" class="form-control"  name="CON_HORA_ENTRADA_R" value="{{$control->CON_HORA_ENTRADA_R}}">
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_REG_FIRMA_ENTRADA">Registro Firma Entrada</label>
                                        <input type="text" class="form-control"  name="CON_REG_FIRMA_ENTRADA" value="{{$control->CON_REG_FIRMA_ENTRADA}}">
                                </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_HORA_SALIDA_R">Hora Salida Registro</label>
                                        <input type="time" class="form-control"  name="CON_HORA_SALIDA_R" value="{{$control->CON_HORA_SALIDA_R}}">
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_REG_FIRMA_SALIDA">Registro Firma Salida</label>
                                        <input type="text" class="form-control"  name="CON_REG_FIRMA_SALIDA" value="{{$control->CON_REG_FIRMA_SALIDA}}">
                                </div>
                        </div>
                   </div>  
                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_LAB_CIERRA">Laboratorio Cierra</label>
                                        <input type="text" class="form-control"  name="CON_LAB_CIERRA" value="{{$control->CON_LAB_CIERRA}}">
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_OBSERVACIONES">Observacion</label>
                                        <input type="text" class="form-control"  name="CON_OBSERVACIONES" value="{{$control->CCON_OBSERVACIONES}}">
                                </div>
                        </div>
                   </div>  

                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_NUMERO_HORAS">Numero Horas</label>
                                        <input type="number" class="form-control"  name="CON_NUMERO_HORAS" value="{{$control->CON_NUMERO_HORAS}}">
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_NOTA">Nota</label>
                                        <input type="text" class="form-control"  name="CON_NOTA" value="{{$control->CON_NOTA}}">
                                </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_EXTRA">Extra</label>
                                        <input type="number" class="form-control"  name="CON_EXTRA" value="{{$control->CON_EXTRA}}">
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                <label for="CON_GUIA">Guia</label>
                                        <input type="text" class="form-control"  name="CON_GUIA" value="{{$control->CON_GUIA}}">
                                </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                <label for="GUI_CODIGO">Codigo Guia</label>
                                        <input type="number" class="form-control"  name="GUI_CODIGO" value="{{$control->GUI_CODIGO}}">
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                        <label for="LAB_CODIGO">Laboratorio</label>
                                        <select class="form-control" id="LAB_CODIGO" name="LAB_CODIGO"  >
                                                @foreach ($laboratorios as $laboratorio)
                                                @if($laboratorio->LAB_CODIGO==$control->LAB_CODIGO)
                                                        <option value="{{$laboratorio->LAB_CODIGO}}" selected="{{$laboratorio->LAB_CODIGO}}">{{$laboratorio->LAB_NOMBRE}}</option>
                                                        @else
                                                        <option value="{{$laboratorio->LAB_CODIGO}}"  >{{$laboratorio->LAB_NOMBRE}}</option>
                                                @endif
                                                @endforeach
                                        </select>
                                </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col">
                                <div class="form-group">
                                        <label for="MAT_CODIGO">Materia</label>
                                        <select class="form-control" id="MAT_CODIGO" name="MAT_CODIGO"  >
                                                @foreach ($materias as $materia)
                                                @if($materia->MAT_CODIGO==$control->MAT_CODIGO)
                                                        <option value="{{$materia->MAT_CODIGO}}" selected="{{$materia->MAT_CODIGO}}">{{$materia->MAT_NOMBRE}}</option>
                                                        @else
                                                        <option value="{{$materia->MAT_CODIGO}}"  >{{$materia->MAT_NOMBRE}}</option>
                                                @endif
                                                @endforeach
                                        </select>
                                </div>
                        </div>
                     
                        <div class="col">
                                <div class="form-group">
                                        <label for="DOC_CODIGO">Docente</label>
                                        <select class="form-control" id="DOC_CODIGO" name="DOC_CODIGO"  >
                                                @foreach ($docentes as $docente)
                                                @if($docente->DOC_CODIGO==$control->DOC_CODIGO)
                                                        <option value="{{$docente->DOC_CODIGO}}" selected="{{$docente->DOC_CODIGO}}">{{$docente->DOC_NOMBRES}}</option>
                                                        @else
                                                        <option value="{{$docente->DOC_CODIGO}}"  >{{$docente->DOC_NOMBRES}}</option>
                                                @endif
                                                @endforeach
                                        </select>
                                </div>
                        </div>
                   </div>


                <br>
                <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
                 <a href="{{url('control')}}" class="btn btn-danger mb-2">Cancelar</a> 
             
        </form>
       </div> 
</body>
@endsection
</html>

