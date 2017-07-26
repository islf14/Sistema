function validacion(){    
    var tarjeta=document.getElementById("tarjeta").value;
    var codigo=document.getElementById("codigo").value;
    var nombres=document.getElementById("nombres").value;
    var apellidos=document.getElementById("apellidos").value;
    var beca=document.getElementById("beca").value;
    var direccion=document.getElementById("direccion").value;
    var facultad=document.getElementById("facultad").value;
    var escuela=document.getElementById("escuela").value;
    if(tarjeta==""){
        alert("Por favor ingrese tarjeta");
        return false;
    }
    if(codigo==""){
        alert("Por favor ingrese codigo");
        return false;
    }
    if(nombres==""){
        alert("Por favor ingrese nombres");
        return false;
    }
    if(apellidos==""){
        alert("Por favor ingrese apellidos");
        return false;
    }
    if(beca==0){
        alert("Por favor selecione beca");
        return false;
    }
    if(direccion==""){
        alert("Por favor ingrese direccion");
        return false;
    }
    if(facultad==0){
        alert("Por favor Seleccione facultad");
        return false;
    }
    if(escuela==0){
        alert("Por favor Seleccione escuela");
        return false;
    }

}