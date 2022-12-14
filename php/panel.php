 <!DOCTYPE html>
<html>
<head>
	<title>app-estacion</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
</head>
<body>
<header id="title">ESTACIONES</header>
	<div id="list-estacion">
	</div>

	<template id="tpl-btn-estacion">
	<a href="" class="btn-estacion">
		<div class="card-apodo">
		</div>
		<div class="card-ubicacion"></div>
		<div class="card-visitas">
		</div>
		
	</a>
	</template>


	<script type="text/javascript">

		document.addEventListener("DOMContentLoaded", () =>{
			loadEstaciones().then(duendeverde =>{
				duendeverde.forEach(function(element, index){
					addBtnEstacion(element)
					console.log(element)
				})
				
		
			})
		})

		

		async function loadEstaciones(){
			const response=await fetch("https://mattprofe.com.ar/proyectos/app-estacion/datos.php?mode=list-stations");
			const data= await response.json();
			return data;
		}


	function addBtnEstacion(info){

	let tpl = document.querySelector("#tpl-btn-estacion")
	let clon = tpl.content.cloneNode(true)

	// cargamos los datos del botón clonado
	clon.querySelector(".btn-estacion").setAttribute("href", "./detalle.php?chipid="+info.chipid)
	clon.querySelector(".card-ubicacion").innerHTML= '<i class="fas fa-map-marker-alt color-ubicacion"></i>'+info.ubicacion
	clon.querySelector(".card-visitas").innerHTML = info.visitas+'<i class="fa-solid fa-tower-observation color-visitas"></i>'
	clon.querySelector(".card-apodo").innerHTML = info.apodo
	
	// Agrega un nuevo botón de estación
	document.querySelector("#list-estacion").appendChild(clon)
}
		
	</script>
</body>
</html>