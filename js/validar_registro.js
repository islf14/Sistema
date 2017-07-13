function validacion(){
    
    var idusuario=document.getElementById("idusuario").value;
    var nombre=document.getElementById("nombre").value;
    var apellido=document.getElementById("apellido").value;
    var dni=document.getElementById("dni").value;
    var turno=document.getElementById("turno").value;
    var password=document.getElementById("password").value;
    var password2=document.getElementById("password2").value;

    if(idusuario==""){
        alert("Por Favor ingrese usuario");
        return false;
    }
    if(nombre==""){
        alert("Por Favor ingrese nombre");
        return false;
    }
    if(apellido==""){
        alert("Por Favor ingrese apellido");
        return false;
    }
    if(dni==""){
        alert("Por Favor ingrese dni");
        return false;
    }
    if(turno==""){
        alert("Por Favor ingrese turno");
        return false;
    }
    if(password==""){
        alert("Por Favor ingrese password");
        return false;
    }
    if(password2==""){
        alert("Por Favor ingrese password2");
        return false;
    }

}