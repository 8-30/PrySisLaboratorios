$("#periodo").change(function(event){
    $.ajax({
      url: "comboMateria/"+event.target.value,
      type: "GET",
      dataType: "json",
      error: function(element){
        console.log(element.type);
      }, 
      success: function(respuesta){
        $("#guiaCombo").find('option')
      .remove()
      .end()
      .append('<option value="0">------Seleccione------</option>');
        $("#materiaCombo").find('option')
        .remove()
        .end()
        .append('<option value="0">------Seleccione-------</option>');
        if(respuesta.length>0){
          for(i = 0; i<respuesta.length; i++){
            $("#materiaCombo").append("<option value='"+respuesta[i].MAT_CODIGO+"'>"
            +respuesta[i].MAT_NOMBRE+" - "+respuesta[i].MAT_NRC+"</option>");
          }
        }else{
          
          alert("No tiene materias en el periodo "+ event.target.options[event.target.selectedIndex].text)
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
     if(respuesta.length<=0){
       document.getElementById('btn_cGuia').disabled=true;
      alert("No tiene guias");
     }
      for(i = 0; i<respuesta.length; i++){
          $("#guiaCombo").append("<option value='"+respuesta[i].GUI_CODIGO+"'>"
              +respuesta[i].GUI_NUMERO+" : "+respuesta[i].GUI_TEMA+"</option>");
              if((i+1)==respuesta.length){
                document.getElementById('btn_cGuia').disabled=false;
              } 
      }
      
    }
  });
});


$("#periodo").change(function(event){
    $.ajax({
      url: "comboCarrera/"+event.target.value,
      type: "GET",
      dataType: "json",
      error: function(element){
        console.log(element.type);
      }, 
      success: function(respuesta){
     $("#carreraCombo").find('option')
      .remove()
      .end()

       console.log(respuesta);

        if(respuesta.length>0){
          for(i = 0; i<respuesta.length; i++){
            $("#carreraCombo").append("<option value='"+respuesta[i].CAR_CODIGO+"'>"
            +respuesta[i].CAR_NOMBRE+"</option>");
          }
        }else{
          
          alert("No tiene materias en el periodo "+ event.target.options[event.target.selectedIndex].text)
        }
      }
    });
});