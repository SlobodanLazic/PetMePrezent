$(function(){
        
        var width = 1500;
        var animationSpeed = 1000;
        var pause = 5000;
        var currentSlide = 1;

        var $slider=$('#slider');
	    var $slideContainer=$slider.find('.slides');
	    var $slides=$slideContainer.find('.slide');

	    var interval;

	    function startSlider() {
		  interval=setInterval(function(){
			$slideContainer.animate({'margin-left':'-='+width}, animationSpeed, function() {
				currentSlide++;
				if(currentSlide===$slides.length) {
					currentSlide=1;
					$slideContainer.css('margin-left',0);
				}
			});
		}, pause);
	}

        function stopSlider() {
		   clearInterval(interval);
    }		

	    $slider.on('mouseenter', stopSlider).on('mouseleave', startSlider);

	    startSlider();

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