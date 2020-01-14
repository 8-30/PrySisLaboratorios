<!DOCTYPE html>
<html>
<head>
<style type="text/css">
table {
   width: 100%;
   border-collapse:collapse;
   border: 1px solid black;

}
th, td {
   text-align: left;
   vertical-align: top;
   border:  solid #000;
   border: 1px solid black;
   font-size: 12px
   border-collapse:collapse;
}

#internatabla{
  width: 100%;
   border: 0;
   border-collapse:collapse;
}

#centrado{
  vertical-align:bottom;
  text-align:left;
  font-size: 9px
}
#fondo{
  background-color:rgb(189, 189, 189);
  vertical-align:bottom;
  text-align:left;
  font-size: 9px
}
p{
  font-size:9px;
}

</style>
</head>
<body>
<!-------------- -->
<table>
        <thead>
            <tr>
              <th scope="row" id="centrado"width="20%">  <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/reportes/espelogo.png';?>"/>   </th>
              <th scope="row" id="centrado"width="55%"><h3>GUÍA PARA LAS PRÁCTICAS DE LABORATORIO, TALLER O CAMPO<h3></th>
              <th scope="row"width="25%">
                <p>CÓDIGO: SGC.DI.505<br>
                VERSIÓN: 1.0 <br>
                FECHA ÚLTIMA REVISIÓN: 12/04/2017    
                </p></th>
            </tr>
        </thead>
 </table>
 <br>
 <table>
        <thead>
            <tr>
              <td scope="row" id="fondo"width="15%"><br> DEPARTAMENTO: </td>
              <td scope="row" id="centrado"width="35%"> </td>
              <td scope="row" id="fondo"width="7%"><br> CARRERA: </td>
              <td scope="row" id="centrado"width="43%"> {{$guia->CAR_NOMBRE}}</td>
            </tr>
        </thead>
  </table>
  <table>
            <tr>
              <td scope="row" id="fondo"width="15%" > ASIGNATURA: </td>
              <td scope="row" id="centrado"width="30%">{{$guia->MAT_NOMBRE}}</td>
              <td scope="row" id="fondo"width="7%"> PERIODO LECTIVO: </td>
              <td scope="row" id="centrado"width="18%">{{$guia->PER_NOMBRE}}</td>
              <td scope="row" id="fondo"width="7%"> NIVEL: </td>
              <td scope="row" id="centrado"width="18%"><center>{{$guia->MAT_NIVEL}}</center></td>
            </tr>
            <tr>
              <td scope="row" id="fondo"width="15%" >DOCENTE: </td>
              <td scope="row" id="centrado"width="35%">{{$guia->DOC_NOMBRE}}</td> 
              <td scope="row" id="fondo"width="7%"> COD: <br> NRC: </td>
              <td scope="row" id="centrado"width="18%">{{$guia->MAT_CODIGO}} <br> {{$guia->MAT_NRC}} </td>
              <td scope="row" id="fondo"width="7%"> PRACTICA No: </td>
              <td scope="row" id="centrado"width="18%"><center>{{$guia->GUI_NUMERO}}</center></td>
            </tr>            
  </table>
  <table>
            <tr>
              <td scope="row" id="fondo" width="50%" > LABORATORIO DONDE SE DESARROLLARÁ <br> LA PRÁCTICA: </td>
              <td scope="row" id="centrado" width="50%" >{{$guia->EMP_NOMBRE}} <br> {{$guia->LAB_NOMBRE}} </td>
            </tr>
  </table>
  <table>
            <tr>
              <td scope="row" id="fondo" width="15%" ><br>TEMA DE LA PRÁCTICA: </td>
              <td scope="row" id="centrado" width="85%" >{{$guia->GUI_TEMA }}</td>
            </tr>
  </table>
  <table>
            <tr>
              <td scope="row" id="fondo" > <br>INTRODUCCIÓN: </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_INTRODUCCION}} </td>
            </tr>
            <tr>
              <td scope="row" id="fondo" > <br>OBJETIVOS: </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_OBJETIVO}}</td>
            </tr>
            <tr>
              <td scope="row" id="fondo" > <br>MATERIALES: </td>
            </tr>
    </table>
    <table>
            <tr>
              <td scope="row" id="centrado"  width="60%">REACTIVOS: </td>
              <td scope="row" id="centrado"  width="40%">INSUMOS: </td>
            </tr>
    </table>
    <table>
            <tr>
              <td scope="row" id="centrado">EQUIPOS: {{$guia->GUI_EQUIPO_MATERIALES}}</td>
            </tr>
            <tr>
              <td scope="row" id="centrado">MUESTRA: </td>
            </tr>
            <tr>
              <td scope="row" id="fondo" ><br> INSTRUCCIONES: </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_TRABAJO_PREPARATORIO}} </td>
            </tr>
            <tr>
              <td scope="row" id="fondo" ><br> ACTIVIDADES POR DESARROLLAR:  </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_ACTIVIDADES}} </td>
            </tr>
            <tr>
              <td scope="row" id="fondo" ><br> RESULTADOS OBTENIDOS:  </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_RESULTADOS}} <br></td>
            </tr>
            <tr>
              <td scope="row" id="fondo" ><br> CONCLUSIONES:  </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_CONCLUSIONES}}</td>
            </tr>
            <tr>
              <td scope="row" id="fondo" ><br> RECOMENDACIONES: </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_RECOMENDACIONES}}</td>
            </tr>
            <tr>
              <td scope="row" id="fondo" ><br> REFERENCIAS BIBLIOGRÁFICAS Y DE LA WEB: </td>
            </tr>
            <tr>
              <td scope="row" id="centrado"><br>{{$guia->GUI_REFERENCIAS_BIBLIOGRAFICAS}}</td>
            </tr>
</table>
<table>
            <tr>
              <td scope="row" id="fondo" ><br> FIRMAS </td>
            </tr>
</table>
<table>
 <tr>
 <td scope="row"id="centrado">
 <br>
 <br>
 <br>
 <center><p>F.....................................................<br>
  {{$guia->DOC_NOMBRE}}<br>
  &nbsp;DOCENTE
  </p></center>
  </td>
  <td scope="row"id="centrado">
  <br>
  <br>
  <br>
  <center><p>F.....................................................<br>
  Ing. Javier Montaluisa MSc.  <br>
  &nbsp;COORDINADOR DE AREA DE CONOCIMIENTO
  </p></center>
  </td>
  <td scope="row"id="centrado">
  <br>
  <br>
  <br>
  <center><p>F.....................................................<br>
  Ing. Edgar F. Montaluisa P. MSc.<br>
  &nbsp;JEFE DE LABORATORIO
  </p></center>
  </td>
 </tr>
</table>
</body>
</html>


