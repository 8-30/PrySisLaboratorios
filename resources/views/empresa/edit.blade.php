<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body >
 <div class="container">

    <div align="center" class="table-title" >
        <h1>EDITAR </h1>
            <hr>
            <div style="width:50%" align="center">
            <form  style="text-align:center;" action="/empresa/update"  method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>CODIGO {{ $empresa->EMP_CODIGO }}</h3>  <input type="hidden"  class="form-control" name="EMP_CODIGO" value="{{ $empresa->EMP_CODIGO }}" ><br>
                    NOMBRE <input type="text" name="EMP_NOMBRE"  class="form-control" value="{{ $empresa->EMP_NOMBRE }}" ><br>
                    EMP_FIRMA_DEE: <input type="text" name="EMP_FIRMA_DEE"  class="form-control" value="{{ $empresa->EMP_FIRMA_DEE }}" ><br>
                    EMP_PIE_DEE: <input type="text" name="EMP_PIE_DEE"  class="form-control" value="{{ $empresa->EMP_PIE_DEE }}"  ><br>
                    EMP_FIRMA_JEFE: <input type="text" name="EMP_FIRMA_JEFE"  class="form-control" value="{{ $empresa->EMP_FIRMA_JEFE }}" ><br>
                    EMP_PIE_JEFE: <input type="text" name="EMP_PIE_JEFE"   class="form-control" value="{{ $empresa-> EMP_PIE_JEFE}}"><br>
                    EMP_FIRMA_LAB: <input type="text" name="EMP_FIRMA_LAB"  class="form-control" value="{{ $empresa->EMP_FIRMA_LAB }}" ><br>
                    EMP_PIE_LAB: <input type="text" name="EMP_PIE_LAB"  class="form-control"  value="{{ $empresa->EMP_PIE_LAB }}" ><br>
                    EMP_ESTADO: <input type="number" name="EMP_ESTADO"  class="form-control" value="{{ $empresa->EMP_ESTADO }}" ><br>
                    EMP_RELACION_SUFICIENCIA: <input type="number"  class="form-control" name="EMP_RELACION_SUFICIENCIA"  value="{{ $empresa->EMP_RELACION_SUFICIENCIA }}" ><br>


                    <br>
                    <input type="submit"  class="btn-primary" value="Submit">
              </form>

            </div>
    </div>
 </div> 
</body>
</html>


