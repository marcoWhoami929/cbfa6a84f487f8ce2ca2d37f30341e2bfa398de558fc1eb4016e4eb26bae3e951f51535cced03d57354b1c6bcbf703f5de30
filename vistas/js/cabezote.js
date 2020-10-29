/*=============================================
CABEZOTE
=============================================*/

$("#btnCategorias").click(function(){

	if(window.matchMedia("(max-width:767px)").matches){

		$("#btnCategorias").after($("#categorias").slideToggle("fast"))

	}else{

		$("#cabezote").after($("#categorias").slideToggle("fast"))
		
	}

		
})
/*=============================================
Sucursales
=============================================*/

$("#btnSucursal").click(function(){

	if(window.matchMedia("(max-width:767px)").matches){

		$("#btnSucursal").after($("#sucursal").slideToggle("fast"))

	}else{

		$("#cabezote").after($("#sucursal").slideToggle("fast"))
		
	}

		
})