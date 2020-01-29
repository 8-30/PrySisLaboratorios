<html>

<head>
  <style type="text/css">
    table {
      width: 100%;
      border-collapse: collapse;
      border: 2px solid black;
    }

    th, td {
      text-align: left;
      vertical-align: top;
      border: solid #000;
      border: 2px solid black;
      font-size: 11px;
      font-family: sans-serif;
      border-collapse: collapse;
    }

    #margenes {
      margin-top: 0px;
      margin-bottom: 20mm;
      margin-right: 10mm;
      margin-left: 20mm;
      font-family: sans-serif;
      font-size: 11pt;
    }

    #foot {
      margin-top: 0px;
      font-family: sans-serif;
      font-size: 5pt;
      font-style: oblique;
    }

    #internatabla {
      width: 100%;
      border: 0;
      border-collapse: collapse;
    }

    #centrado {
      vertical-align: middle;
      text-align: center;
    }

    #fondo {
      background-color: grey;
      vertical-align: middle;
      text-align: center;
      font-size: 8px
    }

    #derecha {
      vertical-align: middle;
      text-align: right;
    }

    #izquierda {
      vertical-align: middle;
      text-align: left;
    }

    @page {
      margin: 150px 50px;
    }

    #header {
      position: fixed;
      left: 58pt;
      top: -100px;
      right: 29pt;
      text-align: center;
      font-family: sans-serif;
      font-size: 11pt;
      height: 50px;
    }

    #footer {
      position: fixed;
      left: 50pt;
      bottom: -235px;
      right: 29px;
      height: 150px;
    }

    #footer .page:after {
      counter-increment: pages;
      content: counter(page)
    }
  </style>
</head>

<body>

  <header id="header">
    <div>
    <img style='height: 100%; width: 40%;' alt="Error Header" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/reportes/espelogo.png';?>"/>
    </div>
    <hr style="size:1px;color:SILVER;" />
    <div style="margin-top: 3px;   margin-bottom:px;">

      <table border="0px">
        <thead>
          <tr>
            <td scope="row" width="4%"> <b>REPORTE</td>
            <td scope="row" id="izquierda" width="60%">:Uso y Guias Entregadas por Docente </td>
          </tr>
        </thead>
      </table>
    </div>
    <hr style="size:2px;color:SILVER;" />
  </header>

  <footer id="footer">
    <hr style="size:1px;color:SILVER;margin-bottom:0px;">
    <table border="0px" id="foot">
      <thead>
        <tr>
          <td scope="row" id="izquierda" width="33%"> <b> SG-LAB</b> </td>
          <td scope="row" id="centrado" width="34%">
            <b>Página </b> <b class="page"></b>
          </td>
        </tr>
      </thead>
    </table>
  </footer>

  <div id="margenes">
    <div style="margin-top: 30px;">
    <<table id="ListOC" class="table table-hover table-bordered results">
    <thead>
      <tr>
        <th scope="row">MATERIA</th>
        <th scope="row">DOCENTE</th>
        <th scope="row">ENTRADA</th>
        <th scope="row">SALIDA</th>
        <th scope="row">GUIA ENTREGADA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($materias as $mat)
            <td scope="row">{{$mat -> MAT_NOMBRE}}</td>
            <td scope="row">{{$mat -> docente->DOC_NOMBRES}}</td>
        @endforeach
        <td scope="row">P</td>
        <td scope="row">P</td>
      </tr>

  </table>
<br><br><br>
      <table border="0px">
        <tr>
          <td scope="row">
            <p id="centrado" style="font-size:13px">
              <b>REALIZADO POR</b>
              <br><br><br><br>
              FIRMA:----------------------------
              <br>
              Fabián Montaluisa
            </p>
          </td>
        </tr>
      </table>

    </div>
</body>
</html>