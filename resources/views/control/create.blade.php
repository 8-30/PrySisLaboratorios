@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Registro de Control'))


 <body >
 <div class="jumbotron">
    <h2>Crear Control</h2>
</div>
        <div class="container">
         
         <form  action="{{url('/control/store')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row"> 
                <div class="col">
                        <div class="form-group">
                        <label for="CON_DIA">Dia*</label>
                                <input type="date" class="form-control"  name="CON_DIA"  required>
                        </div>
                </div>
                            
                <div class="col">
                        <div class="form-group">
                        <label for="CON_HORA_ENTRADA">Hora Entrada*</label>
                                <input type="time" class="form-control"  name="CON_HORA_ENTRADA" required >
                        </div>
                </div>
             
                
           </div>  
           <div class="row">
           <div class="col">
                        <div class="form-group">
                        <label for="CON_HORA_SALIDA">Hora Salida*</label>
                                <input type="time" class="form-control"  name="CON_HORA_SALIDA" required>
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="CON_LAB_ABRE">Laboratorio Abre</label>
                                <input type="text" class="form-control"  name="CON_LAB_ABRE" placeholder="Ingrese un laboratorio abre">
                        </div>
                </div>
           </div>   
           <div class="row">
                <div class="col">
                        <div class="form-group">
                        <label for="CON_HORA_ENTRADA_R">Hora Entrada Registro</label>
                                <input type="time"  class="form-control" name="CON_HORA_ENTRADA_R">
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                        <label for="CON_REG_FIRMA_ENTRADA">Registro Firma Entrada</label>
                                <input type="text"  class="form-control" name="CON_REG_FIRMA_ENTRADA" placeholder="Ingrese registro de firma entrada">
                        </div>
                </div>
           </div>
           <div class="row">
                <div class="col">
                        <div class="form-group">
                        <label for="CON_HORA_SALIDA_R">Hora Salida Registro</label>
                                <input type="time"  class="form-control" name="CON_HORA_SALIDA_R">
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                        <label for="CON_REG_FIRMA_SALIDA">Registro Firma Salida</label>
                                <input type="text"  class="form-control" name="CON_REG_FIRMA_SALIDA" placeholder="Ingrese registro de firma salida">
                        </div>
                </div>
           </div>
           <div class="row">
                <div class="col">
                        <div class="form-group">
                        <label for="CON_LAB_CIERRA">Laboratorio Cierra</label>
                                <input type="text"  class="form-control" name="CON_LAB_CIERRA" placeholder="Ingrese Laboratorio Cierra">
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                        <label for="CON_OBSERVACIONES">Observacion</label>
                                <input type="text"  class="form-control" name="CON_OBSERVACIONES" placeholder="Ingrese Observaciones">
                        </div>
                </div>
           </div>
           <div class="row">
                <div class="col">
                        <div class="form-group">
                        <label for="CON_NUMERO_HORAS">Numero Horas</label>
                                <input type="number"  class="form-control" name="CON_NUMERO_HORAS" placeholder="Ingrese Numero Horas">
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                        <label for="CON_NOTA">Nota</label>
                                <input type="text"  class="form-control" name="CON_NOTA" placeholder="Ingrese Nota">
                        </div>
                </div>
           </div>
           <div class="row">
                <div class="col">
                        <div class="form-group">
                        <label for="CON_EXTRA">Extra</label>
                                <input type="number"  class="form-control" name="CON_EXTRA" placeholder="Ingrese Extra">
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                        <label for="CON_GUIA">Guia</label>
                                <input type="number"  class="form-control" name="CON_GUIA" placeholder="Ingrese Nota">
                        </div>
                </div>
           </div>
           <div class="row">
                <div class="col">
                        <div class="form-group">
                        <label for="GUI_CODIGO">Codigo Guia</label>
                                <input type="number"  class="form-control" name="GUI_CODIGO" placeholder="Ingrese Extra">
                        </div>
                </div>
                <div class="col">
                        <label for="LAB_CODIGO">Laboratorio</label>
                        <select class="form-control" id="LAB_CODIGO" name="LAB_CODIGO" placeholder="Laboratorio"  required>
                                @foreach ($laboratorios as $laboratorio)
                                        <option value="{{$laboratorio->LAB_CODIGO}}">{{$laboratorio->LAB_NOMBRE}}</option>
                                @endforeach
                         </select> 
                </div>
               
            </div>
            <div class="row">
                <div class="col">
                        <label for="MAT_CODIGO">Materia</label>
                        <select class="form-control" id="MAT_CODIGO" name="MAT_CODIGO" placeholder="Materia"  required>
                                @foreach ($materias as $materia)
                                        <option value="{{$materia->MAT_CODIGO}}">{{$materia->MAT_NOMBRE}}</option>
                                @endforeach
                         </select> 
                </div>
                <div class="col">
                        <label for="DOC_CODIGO">Docente</label>
                        <select class="form-control" id="DOC_CODIGO" name="DOC_CODIGO" placeholder="Docente"  required>
                                @foreach ($docentes as $docente)
                                        <option value="{{$docente->DOC_CODIGO}}">{{$docente->DOC_NOMBRES}}</option>
                                @endforeach
                         </select> 
                </div>
               
            </div>
           

                <br>
                <button type="submit" class="btn btn-primary mb-2">Crear</button>
                        <a href="{{url('control')}}" class="btn btn-danger mb-2">Cancelar</a> 
             
        </form>
       </div> 
</body>
@endsection
</html>

