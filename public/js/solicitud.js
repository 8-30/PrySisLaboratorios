
$("#SOL_FECHA_USO").change(function(event){
  var data = $("#SOL_FECHA_USO").val();
    $.ajax({
      url: "horarioFecha/"+data,
      type: "GET",
      dataType: "json",
      error: function(element){
        console.log(element.type);
      }, 
      success: function(respuesta){
        console.log(respuesta)
        $("#SOL_NOMBRELAB").val("");
        $("#LAB_CODIGO").val("");
        $("#SOL_HORARIO_USO").val("");

        if ($.isEmptyObject(respuesta)) {
          alert("No tiene Horas disponible en Horario");
        } else {
          $("#SOL_NOMBRELAB").val("Redes e Informatica ["+respuesta.laboratorio.LAB_NOMBRE+"]");
          $("#LAB_CODIGO").val(respuesta.LAB_CODIGO);
          $("#SOL_HORARIO_USO").val(respuesta.horaUso);
        }
      }
    });
});

$("#materiaCombo").change(function(event){
  $.ajax({
    url: "comboGuia/"+event.target.value,
    type: "GET",
    dataType: "json",
    error: function(element){
      console.log(element.type);
    }, 
    success: function(respuesta){
      $("#guiaCombo").find('option')
      .remove()
      .end()
      .append('<option value="0">---------------------------Seleccione---------------------------</option>');
     if(respuesta.length<=0){
      alert("No tiene guias");
     }
      for(i = 0; i<respuesta.length; i++){
          $("#guiaCombo").append("<option value='"+respuesta[i].GUI_CODIGO+"'>"
              +respuesta[i].GUI_NUMERO+" : "+respuesta[i].GUI_TEMA+"</option>");
      }
    }
  });
});