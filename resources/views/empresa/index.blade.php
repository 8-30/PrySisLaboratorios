<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<div style="text-align:center;">
<br><br><br><br>
<table border="80">

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
<br>
<a href="empresa/create" >Agregar</a> 
</body>
</html>