

<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMPRESA </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body >
 <div class="container">

    <div class="table-title" >
        <h1>EMPRESA </h1>
            <hr>
            <div >
            <table  class="table table-condensed table-bordered table-hover">

                      <tr>
                        <th>ID</th>
                        <th>EMP_NOMBRE</th> 
                        <th>EMP_FIRMA_DEE</th>
                        <th>EMP_PIE_DEE</th> 
                        <th>EMP_PIE_JEFE</th>
                        <th>EMP_FIRMA_JEFE</th>
                        <th>EMP_PIE_LAB</th> 
                        <th>EMP_PIE_LAB</th>
                        <th>EMP_ESTADO</th> 
                        <th>EMP_RELACION_SUFICIENCIA</th>
                        <th>OPCIONES</th>
                      </tr>
                    @foreach ($empresas as $empresa)

                      <tr>
                          <td>
                              <a href="empresa/edit/{{$empresa->EMP_CODIGO}}" >{{ $empresa->EMP_CODIGO }}</a> 
                          </td>
                          <td>{{ $empresa->EMP_NOMBRE }}</td>
                          <td>{{ $empresa->EMP_FIRMA_DEE }}</td>
                          <td>{{ $empresa->EMP_PIE_DEE }}</td>
                          <td>{{ $empresa->EMP_FIRMA_JEFE }}</td>
                          <td>{{ $empresa->EMP_PIE_JEFE }}</td>
                          <td>{{ $empresa->EMP_FIRMA_LAB }}</td>
                          <td>{{ $empresa->EMP_PIE_LAB }}</td>
                          <td>{{ $empresa->EMP_ESTADO }}</td>
                          <td>{{ $empresa->EMP_RELACION_SUFICIENCIA }}</td>
                          <td>
                              <a href="empresa/destroy/{{$empresa->EMP_CODIGO}}" >ELIMINAR</a> 
                          </td>
                      </tr>
                    @endforeach
             </table>


            </div>
    </div>
    <a href="empresa/create" class="btn-info" >Agregar</a> 
 </div> 
</body>
</html>


