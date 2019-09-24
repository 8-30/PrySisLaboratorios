
<form action="/empresa/store"  method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
NOMBRE <input type="text" name="EMP_NOMBRE"  ><br>
EMP_FIRMA_DEE: <input type="text" enable="false" name="EMP_FIRMA_DEE"  ><br>
EMP_PIE_DEE: <input type="text" name="EMP_PIE_DEE"  ><br>
EMP_FIRMA_JEFE: <input type="text" name="EMP_FIRMA_JEFE"  ><br>
EMP_PIE_JEFE: <input type="text" name="EMP_PIE_JEFE" ><br>
EMP_FIRMA_LAB: <input type="text" name="EMP_FIRMA_LAB"  ><br>
EMP_PIE_LAB: <input type="text" name="EMP_PIE_LAB"  ><br>
EMP_ESTADO: <input type="number" name="EMP_ESTADO"  ><br>
EMP_RELACION_SUFICIENCIA: <input type="number" name="EMP_RELACION_SUFICIENCIA"  ><br>



<input type="submit" value="Submit">
</form>