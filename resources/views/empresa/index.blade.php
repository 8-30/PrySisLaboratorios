
@extends('layouts.principal')
<!DOCTYPE html>

<html>
 <head>

    <title>EMPRESA </title>
    
    <script  type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

 </head>

 <body >
 
@section('empresa')
  <div class="container" style="margin-right: 350px;">
      <h1>EMPRESA </h1>
      
      <a href="empresa/create" class="btn btn-primary mb-2" >Agregar</a> 
      <br><br>
      <table  id="empTable" class="table table-striped table-bordered table-responsive"  >
        <thead>
          <tr>
            <th>ID</th>
            <th>Laboratorio General</th> 
            <th>Director Departamento</th>
            <th>Cargo Director Departamento</th> 
            <th>Jefe Laboratorio</th>
            <th>Cargo Jefe Laboratorio</th>
            <th>Laboratorista</th> 
            <th>Cargo Laboratorista</th>
            <th>Estado Laboratorio</th> 
            <th>Relacion Suficiencia</th>
            <th>OPCIONES</th>
          </tr>
        
          
        </thead>
        <tbody>
        
        
        @foreach ($empresas as $empresa)
          <tr>
            <td>{{ $empresa->EMP_CODIGO }}</td>
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
                <a href="empresa/edit/{{$empresa->EMP_CODIGO}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
                <a href="empresa/destroy/{{$empresa->EMP_CODIGO}}" class="btn btn-danger mb-2"><span class="oi oi-trash"></span></a>
            </td>
          </tr>
      
        @endforeach
        <tbody>
        <tfoot>
        <tr>
                <th>ID</th>
                <th>Laboratorio</th>
                <th>Director Dep</th>
                <th>Cargo Director Dep</th>
                <th>Jefe Lab</th>
                <th>Cargo Jefe Lab</th>
                <th>Laboratorista</th>
                <th>Cargo Laboratorista</th>
                <th>Estado Laboratorio</th>
                <th>Relacion Suficiencia</th>
            </tr>
        </tfoot>
     </table>
    </div >
</body>

</html>
<script >
$(document).ready(function() {
    $('#empTable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

</script>



