<!DOCTYPE html>
<html>
<head>
	<title>app-estacion</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
	<link rel="stylesheet" type="text/css" href="../css/estilos2.css">
</head>
<body>
	<header id="nom-estacion"></header>
	<div id="fecha"></div>

<div id="flex">
		<div class="temp">
			<div class="icono-chico">
				<img src="../img/temperatura.png" align="center">
			</div>
			
			<div class="titulo">Temperatura </div>
			<div class="valor" id="temperatura">24</div>
			<div class="titulo">Actualmente</div>
			<div class="max-min">
				<div>
					<div class="mini-valor" id="tempmax">37</div>
					<div class="mini-titulo">max</div>
				</div>
				<div>
					<div class="mini-valor" id="tempmin">21</div>
					<div class="mini-titulo">min</div>
				</div>
			</div>
		</div>

<div class="temp">
			<div class="icono-chico">
				<img src="../img/clima.png" align="center">
			</div>
			<div class="titulo">Sensación</div>
			<div class="valor" id="sensacion">24</div>
			<div class="titulo">Actualmente</div>
			<div class="max-min">
				<div>
					<div class="mini-valor" id="sensamax">37</div>
					<div class="mini-titulo">max</div>
				</div>
				<div>
					<div class="mini-valor" id="sensamin">21</div>
					<div class="mini-titulo">min</div>
				</div>
			</div>
		</div>

	<section id="sec-fuego">
		<div class="temp">
			<div class="icono-chico">
				<img src="../img/fuego.png" align="center">
			</div>
			<div id="peligroFuego">Riesgo de incendio: </div>
			<div class="colum">
				<div>ffmc: </div>
				<div id="ffmc">222222</div>
			</div>
			<div class="colum">
				<div>dmc: </div>
				<div id="dmc"></div>
			</div>
			<div class="colum">
				<div>dc: </div>
				<div id="dc"></div>
			</div>
			<div class="colum">
				<div>isi: </div>
				<div id="isi"></div>
			</div>
			<div class="colum">
				<div>bui: </div>
				<div id="bui"></div>
			</div>
			<div class="colum">
				<div>fwi: </div>
				<div id="fwi"></div>
			</div>
			
		</div>
		
	</section>

	<section id="sec-humedad">
		<div class="temp">
			<div class="icono-chico">
				<img src="../img/humedad (1).png" align="center">
			</div>
			<div class="titulo">Humedad</div>
			<div class="valor" id="humedad">24</div>
			<div class="icono-grande">
				<img src="../img/humedad.png" >
			</div>
		</div>
		
	</section>
	<section id="sec-presion">
		<div class="temp">
			<div class="icono-chico">
				<img src="../img/atmosferico2.png" align="center">
			</div>
			<div class="titulo">Presión Atmosférica</div>
			<div class="valor" id="presion">24</div>
			<div class="icono-grande">
				<img src="../img/atmosferico.png">
			</div>
		</div>
	</section>

	<section id="sec-viento">
		<div class="temp">
			<div class="icono-chico">
				<img src="../img/viento-mini.png" align="center">
			</div>
			<div class="titulo">Viento</div>
			<div class="valor" id="viento">24</div>
			<div class="max-min">
				<div class="m">
					<div class="mini-valor" id="maxviento">37</div>
					<div class="mini-titulo">max</div>
				</div>
				<div class="m">
					<div class="mini-titulo">indeterminado</div>
					<div class="icono-mediano">
						<img src="../img/viento.png" >
					</div>
						</div>
			</div>
		</div>
	</section>
</div>
</body>
<script type="text/javascript">


	const valores = window.location.search
	const urlParams = new URLSearchParams(valores)
	if (urlParams.has('chipid')) {
			document.addEventListener("DOMContentLoaded", ()=>{
			var chipid = urlParams.get('chipid')
			buscarDatos(chipid).then(result =>{
				console.log(result)
				document.querySelector("#nom-estacion").innerHTML = result[0].ubicacion
				document.querySelector("#fecha").innerHTML = result[0].fecha

				//temperatura
				document.querySelector("#temperatura").innerHTML = result[0].temperatura+"°C"
				document.querySelector("#tempmin").innerHTML = result[0].tempmin+"°C"
				document.querySelector("#tempmax").innerHTML = result[0].tempmax+"°C"
				document.querySelector("#sensacion").innerHTML = result[0].sensacion+"°C"
				document.querySelector("#sensamin").innerHTML = result[0].sensamin+"°C"
				document.querySelector("#sensamax").innerHTML = result[0].sensamax+"°C"
				console.log(result[0].ffmc)
				//fuego
				var riesgo=""
				if (result[0].fwi>=50) {
					document.querySelector("#peligroFuego").innerHTML = "Riesgo de incendio: Extremo"
				}else{
					if (result[0].fwi>=38) {
						document.querySelector("#peligroFuego").innerHTML = "Riesgo de incendio: Muy alto"
					}else{
						if (result[0].fwi>=21.3) {
							document.querySelector("#peligroFuego").innerHTML = "Riesgo de incendio: Alto"
						}else{
							if (result[0].fwi>=11.2) {
								document.querySelector("#peligroFuego").innerHTML = "Riesgo de incendio: Moderado"
							}else{
								if (result[0].fwi>=5.2) {
									document.querySelector("#peligroFuego").innerHTML = "Riesgo de incendio: Bajo"
								}else{
									document.querySelector("#peligroFuego").innerHTML = "Riesgo de incendio: Muy bajo"
								}
								}
							}	
						}
					}
				
				document.querySelector("#ffmc").innerHTML = result[0].ffmc
				document.querySelector("#dmc").innerHTML = result[0].dmc
				document.querySelector("#dc").innerHTML = result[0].dc
				document.querySelector("#isi").innerHTML = result[0].isi
				document.querySelector("#bui").innerHTML = result[0].bui
				document.querySelector("#fwi").innerHTML = result[0].fwi

				//humedad
				document.querySelector("#humedad").innerHTML = result[0].humedad+"%"

				//presion
				document.querySelector("#presion").innerHTML = result[0].presion+"hPa"

				//viento
				document.querySelector("#viento").innerHTML = result[0].viento
				document.querySelector("#maxviento").innerHTML = result[0].maxviento

			})
		})

	} else {
		location.href= 'https://mattprofe.com.ar/alumno/3780/app-estacion/panel.html'
	}

	async function buscarDatos(chipid){
		
		const response = await fetch("https://mattprofe.com.ar/proyectos/app-estacion/datos.php?chipid=" + chipid + "&cant=7");
		const data = await response.json();
		return data;
	}

	
</script>
</html>