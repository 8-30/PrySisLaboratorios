
 <head>
    <title>Edit </title>
  
    
 </head>
 @extends('layouts.principal')
 @section('empresa') <body >
        
        <div class="container">
         <h2>Crear Empresa</h2>
           <h3>CODIGO {{ $empresa->EMP_CODIGO }}: {{ $empresa->EMP_NOMBRE }}</h3>  
         <form  action="/empresa/store"  method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row"> 
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_NOMBRE">Nombre  Laboratorio General</label>
                                <input type="text" class="form-control"  name="EMP_NOMBRE" value="{{ $empresa->EMP_FIRMA_DEE }}" required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_FIRMA_DEE">Nombre Director de Departamento</label>
                                <input type="text" class="form-control"  name="EMP_FIRMA_DEE" value="{{ $empresa->EMP_FIRMA_DEE }}" required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_PIE_DEE:">Cargo del Director Departamento</label>
                                <input type="text" class="form-control"  name="EMP_PIE_DEE" value="{{ $empresa->EMP_FIRMA_DEE }} "required >
                        </div>
                </div>
             
              
           </div>     
           <div class="row">
                 <div class="col">
                        <div class="form-group">
                        <label for="EMP_FIRMA_JEFE">Nombre Jefe del Laboratorio</label>
                                <input type="text" class="form-control"  name="EMP_FIRMA_JEFE" value="{{ $empresa->EMP_FIRMA_DEE }}" required >
                        </div>
                </div>

                <div class="col">
                        <div class="form-group">
                        <label for="EMP_PIE_JEFE">Cargo Jefe de Laboratorio</label>
                                <input type="text"  class="form-control" name="EMP_PIE_JEFE" value="{{ $empresa->EMP_PIE_JEFE }}" required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_FIRMA_LAB">Nombre Laboratorista</label>
                                <input type="text"  class="form-control"  name="EMP_FIRMA_LAB" value="{{ $empresa->EMP_FIRMA_LAB }}" required >
                        </div>
                </div>

            </div>
            <div class="row">
                         
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_PIE_LAB">Cargo Laboratorista</label>
                                <input type="text"  class="form-control" name="EMP_PIE_LAB" value="{{ $empresa->EMP_PIE_LAB }}" required  >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_ESTADO">Estado del Laboratorio</label>
                        <select class="form-control" id="EMP_ESTADO" name="EMP_ESTADO" required>
                        @if ($empresa->EMP_ESTADO === 0)
                            <option selected>0</option>
                            <option>1</option>
                        @elseif ($empresa->EMP_ESTADO === 1)
                            <option>0</option>
                            <option selected>1</option>
                        @endif
                        </select>
                        </div>
                </div>
                <div class="col">
                        <label for="">Relacion Suficiencia</label>
                        <select class="form-control" id="EMP_RELACION_SUFICIENCIA" name="EMP_RELACION_SUFICIENCIA" required>
                                @if ($empresa->EMP_RELACION_SUFICIENCIA === 0)
                                <option selected>0</option>
                                <option>1</option>
                                @elseif ($empresa->EMP_RELACION_SUFICIENCIA === 1)
                                <option>0</option>
                                <option selected>1</option>
                                @endif
                        </select>
                </div>
               
            </div>
            
                <button type="submit" class="btn btn-primary mb-2">Crear</button>
                 <a href="{{url('empresa')}}" class="btn btn-danger mb-2">Cancelar</a> 
            
        </form>
       </div> 
</body>
</html>



