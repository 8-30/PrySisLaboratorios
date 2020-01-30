<html>
<head>
<style type="text/css">
table {
   width: 100%;
   border-collapse:collapse;
   border: 2px solid black;
}
th, td {
   text-align: left;
   vertical-align: top;
   border:  solid #000;
   border: 2px solid black;
   font-size: 11px;
   font-family:sans-serif; 
   border-collapse:collapse;
}
#margenes{
  margin-top: 0px;
  margin-bottom: 20mm;
  margin-right: 10mm;
  margin-left: 20mm;
  font-family:sans-serif; 
  font-size:11pt;
}
#foot{
  margin-top: 0px;
  font-family:sans-serif; 
  font-size:5pt;
  font-style: oblique;
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
  background-color:grey;
  vertical-align:middle;
  text-align:center;
  font-size: 8px
}
#derecha{
 
  vertical-align:middle;
  text-align:right;
}
#izquierda{
 
 vertical-align:middle;
 text-align:left;
}


@page { margin: 150px 50px; }
    #header { position: fixed; left: 58pt; top: -135px; right: 29pt;  background-color:; text-align: center;  font-family:sans-serif; font-size:11pt; }
    
    #footer { position: fixed; left: 50pt; bottom: -235px; right: 29px; height: 150px; }
    #footer .page:after { content: counter(page, upper-number); }
</style>
</head>

<body>
<div id="header" > 
      <div>
        <img style='height: 100%; width: 40%;' alt="Error Header" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/reportes/espelogo.png';?>"/>
      </div>
      <hr style="size:1px;color:SILVER; " />
      <div style="margin-top: 3px;   margin-bottom:px;" >
        
        <table  border="0px"  >
                <thead >
                    <tr>
                      <td scope="row"  width="4%"> <b>REPORTE</td>
                      <td scope="row" id="izquierda"width="30%">: GUIAS POR CARRERA </td>
                    
                    
                    </tr>
                </thead>
          </table>
          <table border="0px" >
                <thead>
                    <tr>
                      <td scope="row"  width="4%"> <b>PERIODO</b> </td>
                      <td scope="row" width="9%">: {{$periodo->PER_NOMBRE}}  </td>

                      <td scope="row" id="derecha" width="4%"> <b> CARRERA</b> </td>
                      <td scope="row" id="izquierda" width="16%">{{$carrera->CAR_NOMBRE}}</td>
                      
                    </tr>
                </thead>
          </table>

          <table  border="0px"  >
                <thead >
                    <tr>
                      <td scope="row" width="4%"> <b> FECHAS</b> </td>
                      <td scope="row" id="izquierda" width="30%">: DE {{$fechaInicial}} AL {{$fechaFinal}}  </td>
                    
                    
                    </tr>
                </thead>
          </table>
          
        </div>
        <hr style="size:1px;color:SILVER; "/>
</div>



<div class="page" id="margenes" >
    <div  >
        <table class="table table-hover table-bordered table-sm" style="text-align:center;">
        @foreach ($guias as $gui)
                <thead>
                    <tr class="d-flex">
                         <th colspan="4" scope="rowgroup" style="text-align: center;" >{{$gui[0]->materias->MAT_NOMBRE}} (NRC: {{$gui[0]->materias->MAT_NRC}}) - Ing. {{$gui[0]->docentes->DOC_APELLIDOS}} {{$gui[0]->docentes->DOC_NOMBRES}}</th>
                    </tr>
                    <tr >
                        <th style="text-align: center; vertical-align: middle;" scope="row" width="4%">GUIA</th>
                        <th style="text-align: center; vertical-align: middle;" scope="row"id="centrado"width="15%">FECHA</th>
                        <th style="text-align: center; vertical-align: middle;">TEMA</th>
                        <th style="text-align: center; vertical-align: middle;" scope="row"id="centrado"width="15%">DURACION</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($gui as $guV)
                            <tr ">
                                <td scope="row" id="centrado" width="4%"><b>{{$guV->GUI_NUMERO}}</b></td>
                                <td style="text-align: center; vertical-align: middle;" scope="row"id="centrado"width="15%">{{$guV->GUI_FECHA}}</td>
                                <td class="col opts">{{$guV->GUI_TEMA}}</td>
                                <td style="text-align: center; vertical-align: middle;" scope="row"id="centrado"width="15%">{{$guV->GUI_DURACION}}</td>
                            </tr>
                    @endforeach
            </tbody>  
        @endforeach     
    </table>
      <br><br><br><br><br>
      <table border="0px">
          <tr>
              <td scope="row"  style="width:60%; height:auto;"  >
                  <p id="centrado"  style="font-size:13px">
                      <B>REALIZADO POR</B>
                      <br><br><br>
                  </p>
                  <p id="centrado">
                      Ing. Edgar F. Montaluisa P. MSc. 
                      <br>
                      JEFE DEL LABORATORIO DE REDES E INFORMATICA
                  </p>
              </td>
              <td  scope="row"id="centrado">
              </td>
          </tr>
      </table>
    </div>  
</div >
<div id="footer" >
    <hr style="size:1px;color:SILVER;  margin-bottom:0px;" >
  	<table border="0px" id="foot" >
        <thead>
            <tr>
                      
              <td scope="row" id="izquierda" width="33%"> <b> SG-LAB</b> </td>
              <td scope="row" id="centrado" width="34%"> 
              <b>Página <b> <b  class="page"></b> /  <b  class="page"></b>
              </td>
              <td scope="row" id="derecha" width="33%"><b> <b>  </td>
                      
            </tr>
        </thead>
    </table>
</div>
</body>

</html>