//Api con todas las opciones de busqueda

document.getElementById("datos").innerHTML = "<tr><td colspan='8'>Aun no se han buscado datos</td></tr>"



document.addEventListener("keyup",function buscador(){
    var dato = document.getElementById("buscador").value

    if(dato!=""){
        fetch('logica/select.php?buscador='+dato,{method: "GET"})
        .then(Response => Response.json())
        .then(data =>{ mostar(data)})

        const mostar = (data)=>{

        if (data =="no hay resultados"){
            document.getElementById("datos").innerHTML = "<tr><td colspan='8'>No se han encontrado resultados</td></tr>"


        }else{
            console.log(data)
            let tabla=''
            for(let i=0; i<data.length; i++){
    
                tabla+=`<tr><td>${data[i][0]}</td><td>${data[i][1]}</td><td id='ip'>${data[i][2]}<button class='cop' onclick=copiar('${data[i][2]}');></button</td><td>${data[i][3]}</td>
           <td>${data[i][4]}</td><td>${data[i][5]}</td><td>${data[i][6]}</td><td><button class='editar'><a href='actualizar.php?id=${data[i][0]}'>Editar</button></td><td><button class='borra'><a href='elimina.php?id=${data[i][0]}'>Eliminar</button></td></tr>`
    
            }
            document.getElementById("datos").innerHTML = tabla

        }
       
    } 

    }else{
        document.getElementById("datos").innerHTML="<tr><td colspan='8'>Aun no se han buscado datos</td></tr>"

    }
    
})

function seleccion(){
    var pais = document.getElementById("pais").value
    if(pais != "ninguno"){

        fetch('logica/select.php?pais='+pais,{method: "GET"})
        .then(Response => Response.json())
        .then(data => mostar(data))
  
    const mostar = (data)=>{
      console.log(data)
      let tabla=''
      for(let i=0; i<data.length; i++){
  
        tabla+=`<tr><td>${data[i][0]}</td><td>${data[i][1]}</td><td id='ip'>${data[i][2]}<button class='cop' onclick=copiar('${data[i][2]}');></button</td><td>${data[i][3]}</td>
        <td>${data[i][4]}</td><td>${data[i][5]}</td><td>${data[i][6]}</td><td><button class='editar'><a href='actualizar.php?id=${data[i][0]}'>Editar</button></td><td><button class='borra'><a href='elimina.php?id=${data[i][0]}'>Eliminar</button></td></tr>`
  
      }
      document.getElementById("datos").innerHTML = tabla
      } 
  
    }
}

function todo(){

    var todo = "Enviar todo"

    fetch('logica/select.php?dato='+todo,{method: "GET"})
    .then(Response => Response.json())
    .then(data => mostar(data))

    const mostar = (data)=>{
        console.log(data)
        let tabla=''
        for(let i=0; i<data.length; i++){

            tabla+=`<tr><td>${data[i][0]}</td><td>${data[i][1]}</td><td id='ip'>${data[i][2]}<button class='cop' onclick=copiar('${data[i][2]}');></button</td><td>${data[i][3]}</td>
           <td>${data[i][4]}</td><td>${data[i][5]}</td><td>${data[i][6]}</td><td><button class='editar'><a href='actualizar.php?id=${data[i][0]}'>Editar</button></td><td><button class='borra'><a href='elimina.php?id=${data[i][0]}'>Eliminar</button></td></tr>`

        }
        document.getElementById("datos").innerHTML = tabla
    } 
}

function vpn(){
    var vpn = "vpn"

    fetch('logica/select.php?dato='+vpn,{method: "GET"})
    .then(Response => Response.json())
    .then(data => mostar(data))

    const mostar = (data)=>{
        console.log(data)
        let tabla=''
        for(let i=0; i<data.length; i++){

            tabla+=`<tr><td>${data[i][0]}</td><td>${data[i][1]}</td><td id='ip'>${data[i][2]}<button class='cop' onclick=copiar('${data[i][2]}');></button</td><td>${data[i][3]}</td>
            <td>${data[i][4]}</td><td>${data[i][5]}</td><td>${data[i][6]}</td><td><button class='editar'><a href='actualizar.php?id=${data[i][0]}'>Editar</button></td><td><button class='borra'><a href='elimina.php?id=${data[i][0]}'>Eliminar</button></td></tr>`

        }
        document.getElementById("datos").innerHTML = tabla
    } 

}
async function copiar(ip){
    
    await navigator.clipboard.writeText(ip)

}

