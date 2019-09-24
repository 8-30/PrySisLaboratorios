<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<br><br><br>
<form  style="text-align:center;" action="/empresa/update"  method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
CODIGO {{ $empresa->EMP_CODIGO }}  <input type="hidden" name="EMP_CODIGO" value="{{ $empresa->EMP_CODIGO }}" ><br>
NOMBRE <input type="text" name="EMP_NOMBRE" value="{{ $empresa->EMP_NOMBRE }}" ><br>
EMP_FIRMA_DEE: <input type="text" name="EMP_FIRMA_DEE" value="{{ $empresa->EMP_FIRMA_DEE }}" ><br>
EMP_PIE_DEE: <input type="text" name="EMP_PIE_DEE" value="{{ $empresa->EMP_PIE_DEE }}"  ><br>
EMP_FIRMA_JEFE: <input type="text" name="EMP_FIRMA_JEFE" value="{{ $empresa->EMP_FIRMA_JEFE }}" ><br>
EMP_PIE_JEFE: <input type="text" name="EMP_PIE_JEFE"  value="{{ $empresa-> EMP_PIE_JEFE}}"><br>
EMP_FIRMA_LAB: <input type="text" name="EMP_FIRMA_LAB" value="{{ $empresa->EMP_FIRMA_LAB }}" ><br>
EMP_PIE_LAB: <input type="text" name="EMP_PIE_LAB"  value="{{ $empresa->EMP_PIE_LAB }}" ><br>
EMP_ESTADO: <input type="number" name="EMP_ESTADO" value="{{ $empresa->EMP_ESTADO }}" ><br>
EMP_RELACION_SUFICIENCIA: <input type="number" name="EMP_RELACION_SUFICIENCIA"  value="{{ $empresa->EMP_RELACION_SUFICIENCIA }}" ><br>


<br>
<input type="submit" value="Submit">
</form>