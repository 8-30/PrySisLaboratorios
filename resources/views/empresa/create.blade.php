
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD </title>
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
        <h1>AGREGAR </h1>
            <hr>
            <div style="width:50%" align="center">
                    <form  action="/empresa/store"  method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            NOMBRE <input type="text" class="form-control"  name="EMP_NOMBRE"  ><br>
                            EMP_FIRMA_DEE: <input type="text" class="form-control"  name="EMP_FIRMA_DEE"  ><br>
                            EMP_PIE_DEE: <input type="text" class="form-control"  name="EMP_PIE_DEE"  ><br>
                            EMP_FIRMA_JEFE: <input type="text" class="form-control"  name="EMP_FIRMA_JEFE"  ><br>
                            EMP_PIE_JEFE: <input type="text"  class="form-control" name="EMP_PIE_JEFE" ><br>
                            EMP_FIRMA_LAB: <input type="text"  class="form-control"  name="EMP_FIRMA_LAB"  ><br>
                            EMP_PIE_LAB: <input type="text"  class="form-control" name="EMP_PIE_LAB"  ><br>
                            EMP_ESTADO: <input type="number"  class="form-control" name="EMP_ESTADO"  ><br>
                            EMP_RELACION_SUFICIENCIA: <input type="number" class="form-control"  name="EMP_RELACION_SUFICIENCIA"  ><br>
                            <input type="submit" class="btn-primary"  value="Submit">
                    </form>
            </div>
    </div>
 </div> 
</body>
</html>








<br>

