function valida(){
    var indice = document.getElementById("materia").selectedIndex;
    if( indice != 0) {
        document.getElementById("boton").disabled=false;
    }else{
        document.getElementById("boton").disabled=true;
    }
}