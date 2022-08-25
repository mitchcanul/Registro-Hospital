var btnEnviar = document.getElementById("btnEnviar");
var btnUser=document.getElementById("btnUser");
var caja1 = document.getElementById("id_usuario");
var caja2 = document.getElementById("libro");

btnEnviar.disabled = true;
btnUser.disabled = true;
caja2.disabled = true;

function verificar2(valor) {
  if (valor.length>=1){
    btnEnviar.disabled = false;
    btnEnviar.classList.remove("disabled");
    document.getElementById("btnEnviar").disabled=false;
  } else {
      btnEnviar.disabled = true;
      //document.getElementById("btnEnviar").disabled=true;
  }
}

function verificar(valor) {
  if (valor.length===8){
  	caja2.style.background = "#FFFFFF";
    caja2.disabled = false
    document.getElementById("btnUser").disabled=false;
  }else{
    caja2.style.background = "grey";
    caja2.disabled = true;
    btnEnviar.disabled = true;
    document.getElementById("libro").disabled=true;
  }
}
function mayus(e){
  e.value=e.value.toUpperCase();
}