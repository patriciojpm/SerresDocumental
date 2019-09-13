
 $(document).ready(function(){
     $('#btnGetPass').click(function(){
     
 			var tamanyo_password				=	9;			// definimos el tamaño que tendrá nuestro password

 			var caracteres_conseguidos			=	0;			// contador de los caracteres que hemos conseguido
 			var caracter_temporal				=	'';
			
 			var array_caracteres				=	new Array();// array para guardar los caracteres de forma temporal
				
 				for(var i = 0; i < tamanyo_password; i++){		// inicializamos el array con el valor null
 					array_caracteres[i]	=	null;
 				}

 			var password_definitivo				=	'';

 			var numero_minimo_letras_minusculas	=	1;			// en ésta y las siguientes variables definimos cuántos 
 			var numero_minimo_letras_mayusculas	=	1;			// caracteres de cada tipo queremos en cada 
 			var numero_minimo_numeros			=	1;
 			var numero_minimo_simbolos			=	1;

 			var letras_minusculas_conseguidas 	=	0;
 			var	letras_mayusculas_conseguidas	=	0;
 			var	numeros_conseguidos				=	0;
 			var	simbolos_conseguidos			=	0;


 			// función que genera un número aleatorio entre los límites superior e inferior pasados por parámetro
 			function genera_aleatorio(i_numero_inferior, i_numero_superior) {
 			    var     i_aleatorio  =   Math.floor((Math.random() * (i_numero_superior - i_numero_inferior + 1)) + i_numero_inferior);
 			    return  i_aleatorio;
 			}


 			// función que genera un tipo de caracter en base al tipo que se le pasa por parámetro (mayúscula, minúscula, número, símbolo o aleatorio)
 			function genera_caracter(tipo_de_caracter){
 				// hemos creado una lista de caracteres específica, que además no tiene algunos caracteres como la "i" mayúscula ni la "l" minúscula para evitar errores de transcripción
 				var lista_de_caracteres	=	'$+=?@_23456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz';
 				var caracter_generado	=	'';
 				var valor_inferior		=	0;
 				var valor_superior		=	0;

 				switch (tipo_de_caracter){
 					case 'minúscula':
 						valor_inferior	=	38;
 						valor_superior	=	61;
 						break;
 					case 'mayúscula':
 						valor_inferior	=	14;
 						valor_superior	=	37;
 						break;
 					case 'número':
 						valor_inferior	=	6;
 						valor_superior	=	13;
 						break;
 					case 'símbolo':	
 						valor_inferior	=	0;
 						valor_superior	=	5;
 						break;
 					case 'aleatorio':
 						valor_inferior	=	0;
 						valor_superior	=	61;

 				} // fin del switch

 				caracter_generado	=	lista_de_caracteres.charAt(genera_aleatorio(valor_inferior, valor_superior));
 				return caracter_generado;
 			} // fin de la función genera_caracter()


 			// función que guarda en una posición vacía aleatoria el caracter pasado por parámetro
 			function guarda_caracter_en_posicion_aleatoria(caracter_pasado_por_parametro){
 				var guardado_en_posicion_vacia	=	false;
 				var posicion_en_array			=	0;

 				while(guardado_en_posicion_vacia	!=	true){
 					posicion_en_array	=	genera_aleatorio(0, tamanyo_password-1);	// generamos un aleatorio en el rango del tamaño del password

 					// el array ha sido inicializado con null en sus posiciones. Si es una posición vacía, guardamos el caracter
 					if(array_caracteres[posicion_en_array] == null){
 						array_caracteres[posicion_en_array]	=	caracter_pasado_por_parametro;
 						guardado_en_posicion_vacia			=	true;
 					}
 				}
 			}


 			// función que se inicia una vez que la página se ha cargado
 			

 				// generamos los distintos tipos de caracteres y los metemos en un password_temporal
 				while (letras_minusculas_conseguidas < numero_minimo_letras_minusculas){
 					caracter_temporal	=	genera_caracter('minúscula');
 					guarda_caracter_en_posicion_aleatoria(caracter_temporal);
 					letras_minusculas_conseguidas++;
 					caracteres_conseguidos++;
 				}

 				while (letras_mayusculas_conseguidas < numero_minimo_letras_mayusculas){
 					caracter_temporal	=	genera_caracter('mayúscula');
 					guarda_caracter_en_posicion_aleatoria(caracter_temporal);
 					letras_mayusculas_conseguidas++;
 					caracteres_conseguidos++;
 				}

 				while (numeros_conseguidos < numero_minimo_numeros){
 					caracter_temporal	=	genera_caracter('número');
 					guarda_caracter_en_posicion_aleatoria(caracter_temporal);
 					numeros_conseguidos++;
 					caracteres_conseguidos++;
 				}

 				while (simbolos_conseguidos < numero_minimo_simbolos){
 					caracter_temporal	=	genera_caracter('símbolo');
 					guarda_caracter_en_posicion_aleatoria(caracter_temporal);
 					simbolos_conseguidos++;
 					caracteres_conseguidos++;
 				}

 				// si no hemos generado todos los caracteres que necesitamos, de forma aleatoria añadimos los que nos falten
 				// hasta llegar al tamaño de password que nos interesa
 				while (caracteres_conseguidos < tamanyo_password){
 					caracter_temporal	=	genera_caracter('aleatorio');
 					guarda_caracter_en_posicion_aleatoria(caracter_temporal);
 					caracteres_conseguidos++;
 				}

 				// ahora pasamos el contenido del array a la variable password_definitivo
 				for(var i=0; i < array_caracteres.length; i++){
 					password_definitivo	=	password_definitivo + array_caracteres[i];
 				}

 				// indicamos los parámetros con los que hemos generado la contraseña
 				// document.write('Tamaño total de la contraseña: ' 	+ tamanyo_password + '<br>');
 				// document.write('Cantidad de minúsculas: '			+ numero_minimo_letras_minusculas + '<br>');
 				// document.write('Cantidad de mayúsculas: ' 			+ numero_minimo_letras_mayusculas + '<br>');
 				// document.write('Cantidad de números: ' 				+ numero_minimo_numeros + '<br>');
 				// document.write('Cantidad de símbolos: ' 			+ numero_minimo_simbolos + '<br>');
 				// document.write('El resto de caracteres hasta llegar al tamaño de la contraseña se completa con caracteres aleatorios.<br>');

                 // y ahora simplemente lo mostramos por pantalla
                 
 				document.getElementById('password').value=password_definitivo;
                document.getElementById('password-confirm').value=password_definitivo;
 				// e indicamos que al recargar la página se generará uno nuevo
 				// document.write('Pulse F5 para generar una nueva contraseña')
             
            
         });
	 });
	 
//verificacion rut empresa
	 $(document).ready(function(){
		$('#rut').blur(function(){
			/* validación de rut */
		var rut=$('#rut').val();
    if (rut.toString().trim() != '' && rut.toString().indexOf('-') > 0) {
        var caracteres = new Array();
        var serie = new Array(2, 3, 4, 5, 6, 7);
        var dig = rut.toString().substr(rut.toString().length - 1, 1);
        rut = rut.toString().substr(0, rut.toString().length - 2);

        for (var i = 0; i < rut.length; i++) {
            caracteres[i] = parseInt(rut.charAt((rut.length - (i + 1))));
        }

        var sumatoria = 0;
        var k = 0;
        var resto = 0;

        for (var j = 0; j < caracteres.length; j++) {
            if (k == 6) {
                k = 0;
            }
            sumatoria += parseInt(caracteres[j]) * parseInt(serie[k]);
            k++;
        }

        resto = sumatoria % 11;
        dv = 11 - resto;

        if (dv == 10) {
            dv = "K";
        }
        else if (dv == 11) {
            dv = 0;
        }

        if (dv.toString().trim().toUpperCase() == dig.toString().trim().toUpperCase()){
		
			$.get('/api/datos/'+rut+'/Empresa/',function(array){
				
			
            
				// Swal.fire({
				// 	type: 'error',
				// 	title: 'Empresa ya Creada...',
				// 	text: 'Something went wrong!',
					
				//   })
				
			
		});
		}else{
		//inicio
		Swal.fire({
			type: 'error',
			title: 'Oops...',
			text: 'Something went wrong!',
			footer: '<a href>Why do I have this issue?</a>'
		  })
		//fin
		}
    }
    else {
		Swal.fire({
			type: 'error',
			title: 'Error...',
			text: 'El Rut no existe!',
			
		  })
    }



/* fin */
		});
	 });
//fin verificacion rut empresa
//verificacion rut rep
$(document).ready(function(){
	$('#rutRep').blur(function(){
		/* validación de rut */
	var rut=$('#rutRep').val();
if (rut.toString().trim() != '' && rut.toString().indexOf('-') > 0) {
	var caracteres = new Array();
	var serie = new Array(2, 3, 4, 5, 6, 7);
	var dig = rut.toString().substr(rut.toString().length - 1, 1);
	rut = rut.toString().substr(0, rut.toString().length - 2);

	for (var i = 0; i < rut.length; i++) {
		caracteres[i] = parseInt(rut.charAt((rut.length - (i + 1))));
	}

	var sumatoria = 0;
	var k = 0;
	var resto = 0;

	for (var j = 0; j < caracteres.length; j++) {
		if (k == 6) {
			k = 0;
		}
		sumatoria += parseInt(caracteres[j]) * parseInt(serie[k]);
		k++;
	}

	resto = sumatoria % 11;
	dv = 11 - resto;

	if (dv == 10) {
		dv = "K";
	}
	else if (dv == 11) {
		dv = 0;
	}

	if (dv.toString().trim().toUpperCase() == dig.toString().trim().toUpperCase()){
		//alert('bueno');
		
	}else{
	//inicio
	Swal.fire({
		type: 'error',
		title: 'Oops...',
		text: 'Something went wrong!',
		footer: '<a href>Why do I have this issue?</a>'
	  })
	//fin
	}
}
else {
	Swal.fire({
		type: 'error',
		title: 'Error...',
		text: 'El Rut no existe!',
		
	  })
}



/* fin */
	});
 });
//fin verificacion rut rep

$(document).ready(function(){
	$('#selectEmpresa').change(function(){
		var idEmpresa = $('#selectEmpresa').val();
			alert(resultado);
		$.get('/api/proyectos/'+idEmpresa+'/empresa/',function(resultado){
		
		});
	});
});


// select dinámicos para la selección de Empresa arroja Proyectos 
$(function(){
    $('#empresa_id').on('change', Cambio_Seleccion);
    // $('#tipo_personal').on('change',cambiotipopersonal);
    // $('#select_area').on('change',trabajadores_sepp_caidaA);
});

function Cambio_Seleccion(){
	
	var id = $(this).val();
  
    $.get('/api/Listaproyectos/'+id+'/empresa', function(info){
         var html_select ='<option value=""></option>';
         for (var i=0; i<info.length; ++i){
             html_select +='<option value="'+info[i].id+'">'+info[i].proyecto+'</option>';
             $('#proyecto_id').html(html_select);
         }    
     });
}

// datatable de agregar contratistas a los proyectos
$(document).ready(function(){
	$('#tablaProyectos').DataTable();
	
});