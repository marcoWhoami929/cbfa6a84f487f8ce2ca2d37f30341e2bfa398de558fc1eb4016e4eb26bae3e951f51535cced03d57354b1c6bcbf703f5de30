/*=============================================
BUSCADOR
=============================================*/

$("#buscador #buscar").change(function(){

	var busqueda = $("#buscador #buscar").val();

	var expresion = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ][^$%&|<>#]*$/;

	if(!expresion.test(busqueda)){

		$("#buscador #buscar").val("");

	}else{

		var evaluarBusqueda = busqueda.replace(/[áéíóúÁÉÍÓÚ ]/g, "-");

		var rutaBuscador = $("#buscador a").attr("href");

		if($("#buscador #buscar").val() != ""){

			$("#buscador a").attr("href", rutaBuscador+"/"+evaluarBusqueda);

		}

	}

})

/*=============================================
BUSCADOR CON ENTER
=============================================*/
$("#buscador #buscar").focus(function(){

	$(document).keyup(function(event) {

		event.preventDefault();

		if(event.keyCode == 13 && $("#buscador #buscar").val() != ""){

			var rutaBuscador = $("#buscador a").attr("href");

			window.location.href = rutaBuscador;

		}
		else if (event.keyCode == 13 && $("#buscador #buscar").val()!= "") {
			var rutaBuscador = $("#buscador a").attr("href");

			window.location.href = rutaBuscador;

		}

	})

})
/*============================================
============================================*/

/*===========================================
BUSCADOR CON FLECHA Y ENTER
============================================*/
/*
$("#buscador input").focus(function(){
	$(document).keyup(function(event){

		event.preventDefault();

		if(event.keycode == 40 && $("#buscador input").val()!= ""){
			var rutaBuscador = $("#buscador a").attr("href");
			window.location.href = rutaBuscador;
		}
	})

})

$("#buscador input").focus(function(){
		$(document).keyup(function(event)){
			event.preventDefault();


			if (event.onclick && $("#buscador input").val()!= "") {
				var rutaBuscador= $("#buscador a").attr("href");
				window.location.href= rutaBuscador;
			}
		}
})
*/
