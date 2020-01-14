$("#MAT_CODIGO").change(function(event){

    $.ajax({
      url: "docente/"+event.target.value,
      type: "GET",
      dataType: "json",
      error: function(element){
        console.log(element.type);
      }, 
      success: function(respuesta){
        console.log(respuesta);
       $("#DOC_CODIGO").empty();
        for(i = 0; i<respuesta.length; i++){
            $("#DOC_CODIGO").append("<option value='"+respuesta[i].DOC_CODIGO+"'>"
                +respuesta[i].DOC_NOMBRES+" "+respuesta[i].DOC_APELLIDOS+"</option>");
        }
      }
    });
});