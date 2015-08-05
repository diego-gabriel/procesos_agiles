$(document).on('ready',function(){
    $("#fechaInicioE").datepicker({
        minDate: "-0D",
        onSelect: function(){
            var lockDate = new Date($('#fechaInicioE').datepicker('getDate'));
            $('input#fechaFinalE').datepicker('option', 'minDate', lockDate);
        }
     });
     $("#fechaFinalE").datepicker({
        minDate: "-0D"
    });
    $(document).on('click', '#horaFin', function(e) {
        
        $('.clockpicker').clockpicker()
			.find('input').change(function() {
				   
                        var fechaInicio = document.getElementById("fechaInicioE");
                        var fechaFinal = document.getElementById("fechaFinalE");
                        var horaInicio = document.getElementById("horaIni");
                        var horaFinal = document.getElementById("horaFin");
                        if(fechaInicio.value != "" && fechaFinal.value != "" && fechaInicio.value == fechaFinal.value && horaInicio.value != "" && horaFinal.value != ""){
                            if((new Date(2015,1,1, parseInt(horaInicio.value.split(':')[0]), parseInt(horaInicio.value.split(':')[1]),0,0)) > ( new Date(2015,1,1, parseInt(horaFinal.value.split(':')[0]), parseInt(horaFinal.value.split(':')[1]),0,0))){
                                alert('Los horarios de entrega son incoherentes');
                                document.getElementById("horaFin").value = "";
                            }
                        }
			});
		var input = $('#single-input').clockpicker({
			placement: 'bottom',
			align: 'left',
			autoclose: true,
			'default': 'now'
		});

		$('.clockpicker-with-callbacks').clockpicker({
				donetext: 'Done',
				init: function() {
					console.log("colorpicker initiated");
				},
				beforeShow: function() {
					console.log("before show");
				},
				afterShow: function() {
					console.log("after show");
				},
				beforeHide: function() {
					console.log("before hide");
				},
				afterHide: function() {
					console.log("after hide");
				},
				beforeHourSelect: function() {
					console.log("before hour selected");
				},
				afterHourSelect: function() {
					console.log("after hour selected");
				},
				beforeDone: function() {
					console.log("before done");
				},
				afterDone: function() {
					console.log("after done");
				}                   
			})
			.find('input').change(function() {
				console.log(this.value);
			});

		// Manually toggle to the minutes view
		$('#check-minutes').click(function(e) {
			// Have to stop propagation here
			e.stopPropagation();
			input.clockpicker('show')
				.clockpicker('toggleView', 'minutes');
		});
		if (/mobile/i.test(navigator.userAgent)) {
			$('input').prop('readOnly', true);
		}            
    });
    $(document).on('click', '#horaIni', function(e) {
        
        $('.clockpicker').clockpicker()
			.find('input').change(function() {
				console.log(this.value);
			});
		var input = $('#single-input').clockpicker({
			placement: 'bottom',
			align: 'left',
			autoclose: true,
			'default': 'now'
		});

		$('.clockpicker-with-callbacks').clockpicker({
				donetext: 'Done',
				init: function() {
					console.log("colorpicker initiated");
				},
				beforeShow: function() {
					console.log("before show");
				},
				afterShow: function() {
					console.log("after show");
				},
				beforeHide: function() {
					console.log("before hide");
				},
				afterHide: function() {
					console.log("after hide");
				},
				beforeHourSelect: function() {
					console.log("before hour selected");
				},
				afterHourSelect: function() {
					console.log("after hour selected");
				},
				beforeDone: function() {
					console.log("before done");
				},
				afterDone: function() {
					console.log("after done");
				}
			})
			.find('input').change(function() {
				console.log(this.value);
			});

		// Manually toggle to the minutes view
		$('#check-minutes').click(function(e) {
			// Have to stop propagation here
			e.stopPropagation();
			input.clockpicker('show')
				.clockpicker('toggleView', 'minutes');
		});
		if (/mobile/i.test(navigator.userAgent)) {
			$('input').prop('readOnly', true);
		}        
    });
    console.log($('#materias').length);
    
    $('#materias').on('keyup keydown keypress change input', function() {
    	console.log("lala?");
        return false;
    })
});
