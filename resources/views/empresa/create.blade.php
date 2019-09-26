
<!DOCTYPE html>
<html>
 <head>
    <title>ADD </title>
 </head>
 @extends('layouts.principal')
 @section('empresa')
 <body >
        
        <div class="container">
         <h2>Crear Empresa</h2>
         <form  action="/empresa/store"  method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row"> 
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_NOMBRE">Nombre  Laboratorio General</label>
                                <input type="text" class="form-control"  name="EMP_NOMBRE" required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_FIRMA_DEE">Nombre Director de Departamento</label>
                                <input type="text" class="form-control"  name="EMP_FIRMA_DEE" required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_PIE_DEE:">Cargo del Director Departamento</label>
                                <input type="text" class="form-control"  name="EMP_PIE_DEE"  required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_FIRMA_JEFE">Nombre del Jefe del Laboratorio</label>
                                <input type="text" class="form-control"  name="EMP_FIRMA_JEFE"  required >
                        </div>
                </div>
           </div>     
           <div class="row">
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_PIE_JEFE">Cargo del Jefe de Laboratorio</label>
                                <input type="text"  class="form-control" name="EMP_PIE_JEFE" required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_FIRMA_LAB">Nombre Laboratorista</label>
                                <input type="text"  class="form-control"  name="EMP_FIRMA_LAB" required >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_PIE_LAB">Cargo del Laboratorista</label>
                                <input type="text"  class="form-control" name="EMP_PIE_LAB" required  >
                        </div>
                </div>
             
                <div class="col">
                        <div class="form-group">
                        <label for="EMP_ESTADO">Estado del Laboratorio</label>
                        <select class="form-control" id="EMP_ESTADO" name="EMP_ESTADO" required>
                                <option>0</option>
                                <option>1</option>
                        </select>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                        <label for="">Relacion Suficiencia</label>
                        <select class="form-control" id="EMP_RELACION_SUFICIENCIA" name="EMP_RELACION_SUFICIENCIA" required>
                                <option>0</option>
                                <option>1</option>
                        </select>
                </div>
            </div>
                <br>
                <button type="submit" class="btn btn-primary mb-2">Crear</button>
                 <a href="{{url('empresa')}}" class="btn btn-danger mb-2">Cancelar</a> 
             
        </form>
       </div> 
</body>
</html>

