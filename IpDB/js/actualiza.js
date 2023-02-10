document.getElementById("aviso").style.display="none";

var submit = document.getElementById("form");
submit.addEventListener("submit", function(e){
    e.preventDefault();

    var id = document.getElementById("idb").value;
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
    datosf.append("idb", id);
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
        }else if (data=="correcto"){
            document.getElementById("aviso").style.display="inline-block";
            document.getElementById("aviso").innerHTML=`Datos Actualizados correctamente`;
            document.getElementById("aviso").style.color="green";
            document.getElementById("form").reset();
        }
        setTimeout(function(){
            window.location.href="buscar.php";

        }, 1000);
    
    }) 

})