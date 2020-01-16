function validarDateNoticias() {

  fecha1= document.getElementById("NOT_FECHA_INICIO").value;
  fecha2= document.getElementById("NOT_FECHA_FIN").value;
  if(fecha1!=""&&fecha2!=""){
    if (compare_dates(fecha1,fecha2)==0)
    {  
     
    }else{ 
      if (compare_dates(fecha1,fecha2)>0){
        alert("Por favor Ingrese Fechas en un rango valido... ");
        document.getElementById("NOT_FECHA_INICIO").value = document.getElementById("f1").value;
        document.getElementById("NOT_FECHA_FIN").value = document.getElementById("f2").value;
      } else{

      }
      
    } 
  }
     
}

function validarDateObjetos(){

  fecha1= document.getElementById("OBR_FECHA_RECEPCION").value;
  fecha2= document.getElementById("OBR_FECHA_ENTREGA").value;
  if(fecha1!=""&&fecha2!=""){
    if (compare_dates(fecha1,fecha2)==0)
    {  
     
    }else{ 
      if (compare_dates(fecha1,fecha2)>0){
        alert("Por favor Ingrese Fechas en un rango valido... ");
        document.getElementById("OBR_FECHA_RECEPCION").value=document.getElementById("f1").value;
        document.getElementById("OBR_FECHA_ENTREGA").value=document.getElementById("f2").value;
      } else{

      }
      
    } 
  }
     
}
function getbase64image(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
      console.log(reader.result)
      console.log(reader.result.length)
      document.getElementById("pic").src = reader.result;
      document.getElementById("IMAGE_TEXT").value  = reader.result;
      
    }
    reader.readAsDataURL(file);
   
  }

  function compare_dates(fecha1, fecha2)  
  {  
    var f1 =  new Date(fecha1);
    var f2 =  new Date(fecha2);
    return f1.getTime() - f2.getTime();
  }  
