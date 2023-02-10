//Api que valida los datos del formulario para ser guardados
document.getElementById("aviso").style.display="none";

var submit = document.getElementById("form");
submit.addEventListener("submit", function(e){
    e.preventDefault();

    var idpsn = document.getElementById("idpsn").value;
    var ip =  document.getElementById("ip").value;
    var puerto = document.getElementById("puerto").value;
    var vpn = document.getElementById("vpn").checked;
    var pais = document.getElementById("pais").value;

    if(vpn){
        vpn = "VPN";
    }
    else{
        vpn = "No";
    }

    if(pais ==""){
        pais = "No especificado";

    }
    const datosf = new FormData();
    datosf.append("idpsn", idpsn);
    datosf.append("ip", ip);
    datosf.append("puerto", puerto);
    datosf.append("vpn", vpn);
    datosf.append("pais", pais);
    
    fetch('logica/gdatos.php',{method: 'post',
        body: datosf,
        
    })
    .then(res => res.json())
    .then(data => {console.log(data)

        if(data=="error"){
            document.getElementById("aviso").style.display="inline-block";
            document.getElementById("aviso").innerHTML=`Ha ocurrido un error con el guardado de datos`;
            document.getElementById("aviso").style.color="red";
        }else if (data=="iprepetida"){
            document.getElementById("aviso").style.display="inline-block";
            document.getElementById("aviso").innerHTML=`Esta ip ya se encuentra en la base de datos`;
            document.getElementById("aviso").style.color="red";
        }else if (data=="correcto"){
            document.getElementById("aviso").style.display="inline-block";
            document.getElementById("aviso").innerHTML=`Datos guardados correctamente`;
            document.getElementById("aviso").style.color="rgb(26, 194, 26)";
            document.getElementById("form").reset();
        }
        setTimeout(function(){
            document.getElementById("aviso").innerHTML="";
            document.getElementById("aviso").style.display="none";

        }, 5000);
    
    }) 

})