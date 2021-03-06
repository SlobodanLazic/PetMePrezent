$(function(){

		$('#btnPopup').on('click', function(){
			$('#emailPopup').fadeIn(300); 
		});
		$('.closePopup').on('click', function(){
			$('#emailPopup').fadeOut(300);
			$("#email_error_message").hide();
			$("#email_approved_message").hide();
			$("#email").val('');
		});

		$("#email_error_message").hide();
		var error_email = false;

		$("#email").focusout(function() {
			check_email();
		});

		function check_email() {
		
	    var pattern = new RegExp(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,3}$/i);
	    if(pattern.test($("#email").val())) {
	    	$("#email_error_message").hide();
	    	$("#submit").on('click', function(event) {
	    		event.preventDefault();
	    		event.stopImmediatePropagation();
	    		return ($("#email_approved_message").html("Uspešno ste se prijavili"));
	    	});
	    	
        
	    }
      
	     else {
	     	$("#email_error_message").html("Email je neispravan");
	    	$("#email_error_message").show();
	    	error_email = true;
	    }
      }

	});