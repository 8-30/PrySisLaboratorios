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
    #footer .page:after {  counter-increment: pages; content: counter(page)  }
    

</style>
</head>

<body>

<div id="header" > 
      <div  >
          <img  style='height: 100%; width: 100%;' src="{{$empresa->EMP_IMAGEN_ENCABEZADO}}" alt="Error Header">
      </div>
      <hr style="size:1px;color:SILVER; " />
      <div style="margin-top: 3px;   margin-bottom:px;" >
        
        <table  border="0px"  >
                <thead >
                    <tr>
                      <td scope="row"  width="4%"> <b>REPORTE</td>
                      <td scope="row" id="izquierda"width="30%">: HORARIO POR DOCENTE </td>
                    
                    
                    </tr>
                </thead>
          </table>
          <table border="0px" >
                <thead>
                    <tr>
                      <td scope="row"  width="4%"> <b>PERIODO</b> </td>
                      
                      <td scope="row" width="10%">: {{$periodox->PER_NOMBRE}}  </td>
                      <td scope="row" id="derecha" width="8%"> <b> DOCENTE</b> </td>
                      <td scope="row" id="izquierda" width="12%">: {{ $profesor->DOC_TITULO }} {{ $profesor->DOC_NOMBRES}} {{ $profesor->DOC_APELLIDOS }}   </td>   
     
                                         
                    </tr>
                </thead>
          </table>
          
        </div>
        <hr style="size:1px;color:SILVER; "/>
</div>

<div id="footer"  >
    <hr style="size:1px;color:SILVER;  margin-bottom:0px;" >
  	<table border="0px" id="foot" >
        <thead>
            <tr>
                      
              <td scope="row" id="izquierda" width="33%"> <b> SG-LAB</b> </td>
              <td scope="row" id="centrado" width="34%"> 
              <b>Página </b> <b  class="page"></b> 
              </td>
              <td scope="row" id="derecha" width="33%"><b> {{$fechaActual}} <b>  </td>
                      
            </tr>
        </thead>
    </table>
</div>


<div class="page" id="margenes" >
    <div  >
       <table>
         <tbody >
              <tr>
                    <td style="text-align: center; vertical-align: middle;" scope="row" width="6.5%" >  <b>HORA</b> </td>
                    <td style="text-align: center; vertical-align: middle;" scope="row" width="10%" ><b>LUNES</b> </td>
                    <td style="text-align: center; vertical-align: middle;" scope="row"  width="10%"> <b>MARTES</b></td>
                    <td style="text-align: center; vertical-align: middle;" scope="row" width="10%" > <b>MIERCOLES</b> </td>
                    <td style="text-align: center; vertical-align: middle;" scope="row" width="10%" > <b>JUEVES</b> </td>
                    <td style="text-align: center; vertical-align: middle;" scope="row" width="10%" > <b>VIERNES</b> </td>             

              </tr>      

              @for ($x = 1; $x <= 13; $x++)
              <tr >
                  <td ><b>{{ $horario['HOR_HORA'.$x] }}</b></td>
                  <td >
                      @if ($horario['HOR_LUNES'.$x] != 0 || $horario['HOR_LUNES'.$x] != NULL)
                      {{ $horario['HOR_LUNES'.$x] }} <span class="text-{{ $horario['HOR_LUNES'.$x.'_OPC'] }}"></span>
                      <br>
                      <b class="small font-weight-bold">{{ $horario['HOR_LUNES_DOC'.$x] }}</b>
                      @endif
                  </td>
                  <td >
                      @if ($horario['HOR_MATES'.$x] != 0 || $horario['HOR_MATES'.$x] != NULL)
                      {{ $horario['HOR_MATES'.$x] }} <span class="text-{{ $horario['HOR_MARTES'.$x.'_OPC'] }}"></span>
                      <br>
                      <b class="small font-weight-bold">{{ $horario['HOR_MATES_DOC'.$x] }}</b>
                      @endif
                  </td>
                  <td >
                      @if ($horario['HOR_MIERCOLES'.$x] != 0 || $horario['HOR_MIERCOLES'.$x] != NULL)
                      {{ $horario['HOR_MIERCOLES'.$x] }} <span class="text-{{ $horario['HOR_MIERCOLES'.$x.'_OPC'] }}"></span>
                      <br>
                      <b class="small font-weight-bold">{{ $horario['HOR_MIERCOLES_DOC'.$x] }}</b>
                      @endif
                  </td>
                  <td >
                      @if ($horario['HOR_JUEVES'.$x] != 0 || $horario['HOR_JUEVES'.$x] != NULL)
                      {{ $horario['HOR_JUEVES'.$x] }} <span class="text-{{ $horario['HOR_JUEVES'.$x.'_OPC'] }}"></span>
                      <br>
                      <b class="small font-weight-bold">{{ $horario['HOR_JUEVES_DOC'.$x] }}</b>
                      @endif
                  </td>
                  <td >
                      @if ($horario['HOR_VIERNES'.$x] != 0 || $horario['HOR_VIERNES'.$x] != NULL)
                      {{ $horario['HOR_VIERNES'.$x] }} <span class="text-{{ $horario['HOR_VIERNES'.$x.'_OPC'] }}"></span>
                      <br>
                      <b class="small font-weight-bold">{{ $horario['HOR_VIERNES_DOC'.$x] }}</b>
                      @endif
                  </td>
              </tr>
            @endfor


         </tbody>   
      </table>
      <br><br><br><br><br>
      <table border="0px">
          <tr>
              <td scope="row"  style="width:60%; height:auto;"  >
                  <br>
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

</body>

</html>