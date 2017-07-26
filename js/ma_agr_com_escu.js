function cargarEscuelas(valor)
{
    /**
     * Este array contiene los valores sel segundo select
     * Los valores del mismo son:
     *  - hace referencia al value del primer select. Es para saber que valores
     *  mostrar una vez se haya seleccionado una opcion del primer select
     *  - value que se asignara
     *  - testo que se asignara
     * (value fa, value es, valor)
     */
    var arrayValores=new Array(
        new Array("Ingeniería","Ingeniería de Minas","Ingeniería de Minas"),
        new Array("Ingeniería","Ingeniería Matalúrgica y Materiales","Ingeniería Matalúrgica y Materiales"),
        new Array("Ingeniería","Ingeniería Mecánica","Ingeniería Mecánica"),
        new Array("Ingeniería","Ingeniería Informática y Sistemas","Ingeniería Informática y Sistemas"),
        new Array("Ingeniería","Ingeniería Química","Ingeniería Química"),

        new Array("Ciencias Jurídicas y Empresariales","Ciencias Contables y Financieras","Ciencias Contables y Financieras"),
        new Array("Ciencias Jurídicas y Empresariales","Ciencias Administrativas","Ciencias Administrativas"),
        new Array("Ciencias Jurídicas y Empresariales","Derecho y Ciencias Políticas","Derecho y Ciencias Políticas"),
        new Array("Ciencias Jurídicas y Empresariales","Ingeniería Comercial","Ingeniería Comercial"),

        new Array("Ciencias Agropecuarias","Agronomía","Agronomía"),
        new Array("Ciencias Agropecuarias","Medicina Veterinaria y Zootecnia","Medicina Veterinaria y Zootecnia"),
        new Array("Ciencias Agropecuarias","Ingeniería en Economía Agraria","Ingeniería en Economía Agraria"),
        new Array("Ciencias Agropecuarias","Ingeniería en Industrias Alimentarias","Ingeniería en Industrias Alimentarias"),
        new Array("Ciencias Agropecuarias","Ingeniería Pesquera","Ingeniería Pesquera"),
        new Array("Ciencias Agropecuarias","Ingeniería Ambiental","Ingeniería Ambiental"),

        new Array("Ciencias de la Salud","Obstetricia","Obstetricia"),
        new Array("Ciencias de la Salud","Enfermería","Enfermería"),
        new Array("Ciencias de la Salud","Medicina Humana","Medicina Humana"),
        new Array("Ciencias de la Salud","Odontología","Odontología"),
        new Array("Ciencias de la Salud","Farmacia y Bioquímica","Farmacia y Bioquímica"),

        new Array("Educación, Comunicación y Humanidades","Educación","Educación"),
        new Array("Educación, Comunicación y Humanidades","Ciencias de la Comunicación","Ciencias de la Comunicación"),
        new Array("Educación, Comunicación y Humanidades","Historia","Historia"),

        new Array("Ciencias","Biología Microbiología","Biología Microbiología"),
        new Array("Ciencias","Física Aplicada","Física Aplicada"),
        new Array("Ciencias","Matemáticas","Matemáticas"),

        new Array("Ingeniería Civil Geotecnia y Arquitectura","Ingeniería Civil","Ingeniería Civil"),
        new Array("Ingeniería Civil Geotecnia y Arquitectura","Ingeniería Geológica-Geotecnia","Ingeniería Geológica-Geotecnia"),
        new Array("Ingeniería Civil Geotecnia y Arquitectura","Arquitectura","Arquitectura"),
        new Array("Ingeniería Civil Geotecnia y Arquitectura","Artes","Artes")
    );
    if(valor==0)
    {
        // desactivamos el segundo select
        document.getElementById("escuela").disabled=true;
    }else{
        // eliminamos todos los posibles valores que contenga el escuela
        document.getElementById("escuela").options.length=0;
 
        // añadimos los nuevos valores al escuela
        document.getElementById("escuela").options[0]=new Option("Selecciona una opcion", "0");
        for(i=0;i<arrayValores.length;i++)
        {
            // unicamente añadimos las opciones que pertenecen al id seleccionado
            // del primer select
            if(arrayValores[i][0]==valor)
            {
                document.getElementById("escuela").options[document.getElementById("escuela").options.length]=new Option(arrayValores[i][2], arrayValores[i][1]);
            }
        }
 
        // habilitamos el segundo select
        document.getElementById("escuela").disabled=false;
    }
}
 
/**
 * Una vez selecciona una valor del segundo selecte, obtenemos la información
 * de los dos selects y la mostramos
 */
function seleccinado_escuela(value)
{
    var v1 = document.getElementById("facultad");
    var valor1 = v1.options[v1.selectedIndex].value;
    var text1 = v1.options[v1.selectedIndex].text;
    var v2 = document.getElementById("escuela");
    var valor2 = v2.options[v2.selectedIndex].value;
    var text2 = v2.options[v2.selectedIndex].text;
 
    //alert("Se ha seleccionado el valor "+valor1+" ("+text1+") del primer select y el valor "+valor2+" ("+text2+") del segundo select");
}

function pagobeca(tipo){
    //document.getElementById("pagos").contentEditable=true;
    if (tipo==0){
        //document.getElementById("pagos").disabled=true;
    }else if(tipo==1){
        document.getElementById("pagos").value="0.00";
    }else if(tipo==2){
        document.getElementById("pagos").value="54.50";
    }else{
        document.getElementById("pagos").value="75.00";
    }

}