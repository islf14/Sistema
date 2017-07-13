function validacion(){
    
    var usu=document.getElementById("usuario").value;
    var pass=document.getElementById("pass").value;
    if(usu==""){
        alert("Por favor ingrese usuario");
        return false;
    }
    if(pass==""){
        alert("Por favor ingrese contraseña");
        return false;
    }

}