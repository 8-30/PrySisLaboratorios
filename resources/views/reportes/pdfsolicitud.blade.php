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
   font-size: 13px
   border-collapse:collapse;
}

#internatabla{
  width: 100%;
   border: 0;
   border-collapse:collapse;
}

#centrado{
  vertical-align:middle;
  text-align:center;
}
#fondo{
  background-color:gainsboro;
  vertical-align:middle;
  text-align:center;
  font-size: 10px
}#fondo1{
  background-color:white;
  vertical-align:middle;
  text-align:center;
  font-size: 12px
}
p{
  font-size:9px;
}

</style>
</head>

<body>
 <table style="margin-bottom: 2mm;">
        <thead>
            <tr>
              <th scope="row" id="centrado"width="25%">  <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/reportes/espelogo.png';?>"/>   </th>
              <th scope="row" id="centrado"width="55%" style=" font: sans-serif;"><p><h2>SOLICITUD DE USO DE</h2></p><p><h2>LABORATORIO</h2></p><</th>
              <th scope="row"width="20%">
                <p>CÓDIGO: DCM.LB.12 <br>
                VERSIÓN: 1.0 <br>
                FECHA ÚLTIMA REVISIÓN: 08/06/2017     
                </p></th>
            </tr>
        </thead>
 </table>
 
 <table>
        <thead>
            <tr>
              <td scope="row" id="fondo"width="19%" height="2.5%" style="font-size:12px "  ><b> DEPARTAMENTO:</b> </td>
              <td scope="row" id="centrado"width="35%"> Eléctrica y Electronica </td>
              <td scope="row" id="fondo"width="20%" style="font-size:12px "><b> CARRERA:</b> </td>
              <td scope="row" id="centrado"width="30%"> SOFTWARE</td>
            </tr>
        </thead>
  </table>
  <table>
            <tr>
              <td scope="row" id="fondo"width="19%"   height="2.5%" style="text-align: left;" ><b> NOMBRE DE LABORATORIO:</b> </td>
              <td scope="row" id="centrado"width="57%"> Redes e Informatica [
              @if(!empty($solicitud)) 
              {{$solicitud->laboratorio->LAB_NOMBRE}}
              @endif
              ]
               </td>
            
              <td scope="row" id="fondo"width="15%"><b> CODIGO DEL LAB:</b> </td>
              <td scope="row" id="centrado"width="13%">
              </td>
            </tr>
  </table>
  <table >
            <tr>
              <td scope="row" id="fondo"width="19%"   height="2.5%"><b>FECHA DE SOLICITUD :</b></td>
              <td scope="row" id="fondo1"width="25%">@if(!empty($solicitud)) 
              {{$solicitud->SOL_FECHA}}
              @endif</td>
              <td scope="row" id="fondo"width="10%" style="text-align: left;" ><b> FECHA DE USO :</b></td>
              <td scope="row" id="fondo1" width="22%">@if(!empty($solicitud)) 
              {{$solicitud->SOL_FECHA_USO}}
              @endif
              </td>
              <td scope="row" id="fondo"width="15%" ><b> HORARIO DE USO :</b></td>
              <td scope="row" id="fondo1" width="13%">@if(!empty($solicitud)) 
              {{$solicitud->SOL_HORARIO_USO}}
              @endif
              </td>
            </tr>

  </table>
  <table >
          <tr>
            <td scope="row" id="fondo"width="19%"   height="2.5%" ><b> AREA DE OCUPACIÓN:</b></td>
            <td scope="row" id="fondo"width="35 %"><b> NOMBRE USUARIO:</b></td>
            <td scope="row" id="fondo"width="22%" ><b> NRC:</b></td>
            <td scope="row" id="fondo"width="28%" ><b> TIPO DE USUARIO:</b></td>
          </tr>
  </table>
  <table >
          <tr>
            <td scope="row" id="fondo"width="5%"  height="2.5%" ><b> Doc.</b></td>
            <td scope="row" id="centrado" width="4.5%"> X </td>
            <td scope="row" id="fondo1"width="5%"><b> Inv.</b></td>
            <td scope="row" id="fondo1" width="4.5%"></td>
            <td scope="row" id="centrado" width="35%">@if(!empty($solicitud)) 
            {{$solicitud->docente->DOC_TITULO}} {{$solicitud->docente->DOC_NOMBRES}} {{$solicitud->docente->DOC_APELLIDOS}}
              @endif
              </td>
            <td scope="row" id="centrado" width="22%">@if(!empty($solicitud)) 
              {{$solicitud->materia->MAT_NRC}}
              @endif
              </td>
            <td scope="row" id="fondo"width="6%"><b> Doc.</b></td>
            <td scope="row" id="centrado" width="3%"> X </td>
            <td scope="row" id="fondo"width="6%"><b> Inv.</b></td>
            <td scope="row" id="fondo1" width="3.5%"></td>
            <td scope="row" id="fondo"width="6%"><b> Est.</b></td>
            <td scope="row" id="fondo1" width="3.5%"></td>
          </tr>
  </table>
  <table >
          <tr>
            <td scope="row" id="fondo"width="14.4%"  height="2.5%" ><b> ASIGNATURA:</b></td>
            <td scope="row" id="centrado" width="39.4%">@if(!empty($solicitud)) 
              {{$solicitud->materia->MAT_NOMBRE}}
              @endif</td>
            <td scope="row" id="fondo"width="11%" ><b> NIVEL:</b></td>
            <td scope="row" id="centrado" width="11%">@if(!empty($solicitud)) 
              {{$solicitud->materia->MAT_NIVEL}}
              @endif
              </td>
            <td scope="row" id="fondo"width="9%"><b> PRÁCTICA N°:</b></td>
            <td scope="row" id="centrado" width="6%">@if(!empty($solicitud)) 
              {{$solicitud->SOL_NUMERO}}
              @endif
              </td>
            <td scope="row" id="fondo"width="9.5%" ><b> N° USUARIOS:</b></td> 
            <td scope="row" id="centrado" width="3.5%">@if(!empty($solicitud)) 
              {{$solicitud->materia->MAT_NUM_EST}}
              @endif</td>
          </tr>
  </table>
  <table >
          <tr>
            <td scope="row" id="fondo"width="30%" height="2.5%" ><b> TEMA DE PRÁCTICA/PROYECTO :</b></td>
            <td scope="row" id="fondo1" width="85%">@if(!empty($solicitud)) 
              {{$solicitud->SOL_TEMA_PRACTICA}}
              @endif</td>
          </tr>
  </table>
    <table >
          <tr>
            <td scope="row" id="fondo"width="12.5%" height="2%"><b> CANTIDAD</b></td>
            <td scope="row" id="fondo" width="59.5%"> <b>DETALLE DE: EQUIPOS/MATERIALES/INSUMOS/REACTIVOS/ESPECÍMENES VIVOS</b></td>
            <td scope="row" id="fondo"width="28%"><b> OBSERVACIONES</b></td>
          </tr>
  </table>
      <table >
      @if(!empty($solicitud->laboratorio->empresa->materiales))
      @foreach ($solicitud->laboratorio->empresa->materiales as $material)
          <tr>
            <td scope="row" id="fondo1"width="12.5%" height="2%" >{{$material->MAT_CANTIDAD}}</td>
            <td scope="row" id="fondo1" width="59.5%">{{$material->MAT_DETALLE}}</td>
            <td scope="row" id="fondo1"width="28%">{{$material->MAT_OBSERVACION}}</td>
          </tr>
      @endforeach
      @endif
      @foreach ($solicitud->detalleSolicitud as $detalle)
          <tr>
            <td scope="row" id="fondo1"width="12.5%" height="2%">{{$detalle->DETSOL_CANTIDAD}}</td>
            <td scope="row" id="fondo1" width="59.5%">{{$detalle->DETSOL_DETALLE}}</td>
            <td scope="row" id="fondo1"width="28%">{{$detalle->DETSOL_OBSERVACION}}</td>
          </tr>
      @endforeach
        @for($i=0;$i< (19-count($solicitud->detalleSolicitud)); $i++)
           <tr>

            <td scope="row" id="fondo1"width="12.5%" height="2%"></td>
            <td scope="row" id="fondo1" width="59.5%"></td>
            <td scope="row" id="fondo1"width="28%"></td>
          </tr>
      @endfor
  </table>
<table>
 <tr>
  <td scope="row" width="33%">
    &nbsp; &nbsp; &nbsp;SOLICITANTE:
    <br>
    <br>
    <br>
    &nbsp; &nbsp; &nbsp; &nbsp;............................................................<br>
    &nbsp; &nbsp; &nbsp;<center>@if(!empty($solicitud)) 
    {{$solicitud->docente->DOC_TITULO}} {{$solicitud->docente->DOC_NOMBRES}} {{$solicitud->docente->DOC_APELLIDOS}}
              @endif
            DOCENTE</center>  
    </p>
  </td>
  <td scope="row" width="33%">
    &nbsp; &nbsp; &nbsp;AUTORIZADO POR:
    <br>
    <br>
    <br>
    &nbsp; &nbsp; &nbsp; &nbsp;............................................................<br>
    &nbsp; &nbsp; &nbsp; <center>@if(!empty($solicitud)) 
    {{$solicitud->laboratorio->empresa->EMP_FIRMA_JEFE}}
              @endif
            COORDINADOR DEL LABORATORIO</center>
    
    </p>
  </td>
  <td scope="row" width="34%">
    &nbsp; &nbsp; &nbsp;ENTREGADO POR:
    <br>
    <br>
    <br>
    &nbsp; &nbsp; &nbsp; &nbsp;.................................................................<br>
    <br>
    <center>RESPONSABLE DEL LABORATORIO</center>
    </p>
  </td>
 </tr>
</table>
    <li type="disc"><b>Doc.</b>= Docencia/Docente, <b>Inv.</b> = Investigación/Investigador <b>Est.</b> = Estudiante/Tesista/Pasante</li>
</body>
</html>