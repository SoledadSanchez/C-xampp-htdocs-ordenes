
$(document).ready(function(){

	//para las busqueda
	$('#search_financiera').change(function(e){
		e.preventDefault();
		var sistema = getUrl();	
		
		location.href = sistema+'buscar_oc1.php?financiera='+$(this).val();
	})

	$('#search_estado').change(function(e){
		e.preventDefault();
		var sistema2 = getUrl();
		location.href = sistema2+'buscar_oc1.php?estado='+$(this).val();
	})
	
	/*Modal form abonar cuota
	$('.add_pago').click(function(e) {

 		e.preventDefault();
 		var nroOrden = $(this).attr('orden');
 		var action ='infopago';
 		var arreglo = [action, nroOrden];
 		var cadena = '{"action":"infopago","orden":nroOrden}';
 		
 		$.ajax({
 			url: 'ajax.php',
 			type: 'POST',
 			async: true,
 			data: {"action":"infopago","nroOrden":nroOrden},
 	

 			success: function(response){
 				
 				if(response != 'error'){
 					var miJson = JSON.stringify(arreglo);
 					var objeto = JSON.parse(miJson);
 					//$('.namepago').val(objeto.[0]);
 					//$('.namecuota').val(objeto.[1]);
 				console.log(objeto);
 						
 				}		

 			},
			
 			error: function(error){
 				console.log(error);
 			}


 		});
 		$('.modal').fadeIn();
 	});*/
	
	
	//crear afiliado - orden 
	$('#form_new_cliente_orden').submit(function(e){
		e.preventDefault();
		$.ajax({
		url: 'ajax.php',
		type: 'POST',
		async : true,
		data: $('#form_new_cliente_orden').serialize(),


			success: function(response)
			{
				if(response != 'error'){
					$('#idAfiliado').val(response);
					$('#nom_afiliado').attr('disabled','disabled');
					$('#tel_afiliado').attr('disabled','disabled');
					$('#dir_afiliado').attr('disabled','disabled');
					$('#apellido_afiliado').attr('disabled','disabled');
					$('#leg_afiliado').attr('disabled','disabled');
					$('#fecha_afiliado').attr('disabled','disabled');
					$('#sexo').attr('disabled','disabled');
					$('#dependencia').attr('disabled','disabled');
					$('.btn_new_cliente').slideUp();
					$('#div_registro_cliente').slideUp();

				}
			
			},
			error: function(error){
			}
		});
	});

	//calcula importe por cuota
	$('#text_monto').keyup(function(e){
		e.preventDefault();
		var interes = ($(this).val() * $('#text_interes').html());
		var montoDevolver= parseInt(interes)+parseInt($(this).val());
		var montoCuota = parseInt(montoDevolver)/parseInt($('#text_cant_cuotas').html());
		var mCuota= Math.round(montoCuota *100);		
		mCuota = mCuota/100;
		
		$('#text_importe').html(mCuota);

		//ocultar el boton eliminar, esto deberia estar en la generacion de orden
		//if(($(this).val() < 1) || isNaN ($(this).val()) ){
			//$('#delete_cuota').slideUp();
		//}else{
			//$('#delete_cuota').slideDown();
		//}	

		
	});
 		
//activa campos para registrar afiliado desde nueva orden
		$('.btn_new_cliente').click(function(e){
			e.preventDefault();	
			$('#nom_afiliado').removeAttr('disabled');
			$('#tel_afiliado').removeAttr('disabled');
			$('#dir_afiliado').removeAttr('disabled');
			$('#apellido_afiliado').removeAttr('disabled');
			$('#leg_afiliado').removeAttr('disabled');
			$('#fecha_afiliado').removeAttr('disabled');
			$('#sexo').removeAttr('disabled');
			$('#dependencia').removeAttr('disabled');

			$('#div_registro_cliente').slideDown();
		});

//buscar afiliado en nueva orden
		$('#nit_documento').keyup(function(e){
			e.preventDefault();	
			var af = $(this).val();
			var action = 'searchAfiliado';
			
			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				async : true,
				data: {action:action,afiliado:af},


				success: function(response)
				{
					if(response == 0){

						
						$('#nom_afiliado').val('');
						$('#tel_afiliado').val('');
						$('#dir_afiliado').val('');
						$('#apellido_afiliado').val('');
						$('#leg_afiliado').val('');
						$('#fecha_afiliado').val('');
						$('#sexo').val('');
						$('#dependencia').val('');
						$('.btn_new_cliente').slideDown();
					}else{
						var data = $.parseJSON(response);
						$('#idAfiliado').val(data.id_afiliado);
						$('#nit_documento').val(data.nro_doc);
						$('#nom_afiliado').val(data.nombre);
						$('#tel_afiliado').val(data.telefono);
						$('#dir_afiliado').val(data.domicilio);
						$('#apellido_afiliado').val(data.apellido);
						$('#leg_afiliado').val(data.legajo);
						$('#fecha_afiliado').val(data.fecha_nac);
						$('#sexo').val(data.sexo);
						$('#dependencia').val(data.dependencia);
						//ocultar boton agregar
						$('.btn_new_cliente').slideUp();

						//bloque de campos
						$('#nom_afiliado').attr('disabled','disabled');
						$('#tel_afiliado').attr('disabled','disabled');
						$('#dir_afiliado').attr('disabled','disabled');
						$('#apellido_afiliado').attr('disabled','disabled');
						$('#leg_afiliado').attr('disabled','disabled');
						$('#fecha_afiliado').attr('disabled','disabled');
						$('#sexo').attr('disabled','disabled');
						$('#dependencia').attr('disabled','disabled');

						//oculta boton guardar
						$('#div_registro_cliente').slideUp();

					}
				},
				error: function(error){
				}
			});
		});

//buscar financiera en nueva orden
		$('#nit_cuit').keyup(function(e){
			e.preventDefault();	
			//var fi = $(this).val();
			var fi = $('#nit_cuit').val();
			var action = 'searchFinanciera';
			
			$.ajax({
				url: 'ajax.php',
				type: "POST",
				async : true,
				data: {action:action,financiera:fi},


				success: function(response)
				{
					if(response == 0){

						$('#nom_financiera').val('');
						$('#tel_financiera').val('');
						$('#dir_financiera').val('');
						
					}else{
						var data = $.parseJSON(response);
						$('#idFinanciera').val(data.id_financiera);
						$('#nom_financiera').val(data.nombre);
						$('#tel_financiera').val(data.telefono);
						$('#dir_financiera').val(data.domicilio);
						
						//bloque de campos
						$('#nom_financiera').attr('disabled','disabled');
						$('#tel_financiera').attr('disabled','disabled');
						$('#dir_financiera').attr('disabled','disabled');
						

					}
				},
				error: function(error){
				}
			});
		});
		// agregamos las cuotas de una financiera
		$('#muestra_cuota').click(function(e){
			e.preventDefault();

			if($('#nit_cuit').val() > 0)
			{
				var cuil=$('#nit_cuit').val();
				var action = 'mostrarCuota';
			
					$.ajax({
						url : 'ajax.php',
						type: "POST",
						async: true,
						data: {action:action,cuil:cuil},

						success: function(response)
						{
							if(response!="error"){
								var data = $.parseJSON(response);
								$('#detalleTabla').html(data.detalle);						

							}else{
								console.log('No existen cuotas para la financiera')
							}
						},
						error:function(error){
						}

					});
			 }
			

		});

		


		// eliminamos la cuota de la orden
		$('#delete_cuota').click(function(e){
			e.preventDefault();
			if($('#text_cant_cuotas').val() != '')
				
				$('#text_monto').val('  ');			
			  	$('#text_interes').html('--');
			  	$('#text_cant_cuotas').html('--');
			  	$('#text_importe').html('--');
			  	//Ocultar boton de eliminar
			  	$('#delete_cuota').slideUp();
		});

		// anular la generacion de orden
		$('#btn_anular').click(function(e){
			e.preventDefault();
			location.reload();

		});

		// generar de orden
		$('#btn_generar').click(function(e){
			e.preventDefault();
			
				var action = 'generarOrden';
				var idAfiliado = $('#idAfiliado').val();
				var idFinanciera = $('#idFinanciera').val();
				var idCuota = $('#text_cod_cuota').val();
				var monto = $('#text_monto').val();
				var importe = $('#text_importe').val();
				if (($('#idAfiliado').val()!='')&&($('#idFinanciera').val() !='')&&($('#text_cod_cuota').val()!='')&&($('#text_monto').val() !='')){
				
				$.ajax({
						url : 'ajax.php',
						type: "POST",
						async: true,
						data: {action:action,afiliado:idAfiliado,financiera:idFinanciera,cuota:idCuota,monto:monto,importe:importe},

						success: function(response)
						{
							if(response!="error"){															
								var info = JSON.parse(response);
								//console.log(info);
								generarPDF(info.id_afiliado,info.id_orden)
								location.reload();										

							}else{
								console.log('No existen cuotas para la financiera')
							}
						},
						error:function(error){
						}

					});		
				}else{
					console.log('Debe ingresar todos los campos');
				}

		});

		
		// verificar que no exista la cuota de la financiera
		$('#add_cuota_financiera').click(function(e){
			e.preventDefault();
			var total = $('#text_interes').html();
			var cant_cuota = $('#text_cant_cuotas').html();
			var importe = $('#text_importe').html();
			var idFinanciera = $('#idFinanciera').val();
			var action = 'verificarCuota';

			if (($('#idFinanciera').val() !='')&&($('#text_interes').val() > 0) &&($('#text_cant_cuotas').val() > 0)&&($('#text_importe').val() > 0)){
				$.ajax({
						url : 'ajax.php',
						type: "POST",
						async: true,
						data: {action:action,financiera:idFinanciera,importe:importe,cant_cuota:cant_cuota,total:total},

						success: function(response)
						{
							if(response!="error"){
								
								console.log(response);

							}else{
								console.log('ya existe la cuota para la financiera')
							}
						},
						error:function(error){
						}

					});		
				}else{
					console.log('Debe ingresar todos los valores positivos');
				}

			
		});
	


});//end ready

//generar orden PDF
function generarPDF(cliente,factura){
	var ancho = 1000;
	var alto = 800;
	//calcular posicion x, y para centrar la ventana
	var x = parseInt((window.screen.width/2) - (ancho / 2));
	var y = parseInt((window.screen.height/2) - (alto / 2));

	$url= 'factura/generaFactura.php?cl='+cliente+'&f='+factura;
	window.open($url,"Factura","left="+x+",top="+y+"height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
}


function getUrl() {
		var loc = window.location;

    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);

    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));

	}


	function sendDataPago(){


 			$('.alertAddPago').html('');
 			
 			$.ajax ({
 			url: '../ajax.php',
 			type: 'POST',
 			async: true,
 			data: {action:action,nroOrden:nroOrden},
 			
 			
 			success: function(response){
 				console.log(response);

 			},
			
 			error: function(error){
 				console.log(error);
 			}

 			});
 		
		}
function closeModal(){
	$('.alertAddPago').html('');
	$('.modal').fadeOut();
}

function add_cuota(id_cuota){
	var action='addCuota';
	var cuota = id_cuota;
	$.ajax ({
 			url: 'ajax.php',
 			type: 'POST',
 			async: true,
 			data: {action:action,cuota:cuota},
 			 			
 			success: function(response){
 				if(response != 'error'){
			  	var info = JSON.parse(response);
			  	$('#text_cod_cuota').val(info.id_cuota);
			  	$('#text_interes').html(info.interes);
			  	$('#text_cant_cuotas').html(info.n_cuotas);
			  	

			  	//Mostrar boton de eliminar
			  	$('#delete_cuota').slideDown();
			  }else{
			  	$('#text_cod_cuota').html('');
			  	$('#text_monto').val('');
			  	$('#text_interes').html('--');
			  	$('#text_cant_cuotas').html('--');
			  	$('#text_importe').html('--');

			  	//Ocultar boton de eliminar
			  	$('#delete_cuota').slideUp();
			  }

 			},
			
 			error: function(error){
 				console.log(response);
 			}

 			});

}
			