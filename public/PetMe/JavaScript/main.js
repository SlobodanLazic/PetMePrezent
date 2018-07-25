$(function(){
		$('#btnPopup').on('click', function(){
			$('#emailPopup').fadeIn(300); 
		});
		$('.closePopup').on('click', function(){
			$('#emailPopup').fadeOut(300);
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
	    	$("#popupApproved").fadeIn(300);
	    	$("#emailPopup").fadeOut(300);
        
	    }
      
	     else {
	    	$("#email_error_message").html("Email je neispravan");
	    	$("#email_error_message").show();
	    	error_email = true;
	    }
      }

      $("#approvedBtn").on('click', function(){
      	$("#popupApproved").fadeOut(300);
      	$("#email").val('');

      	})

	});