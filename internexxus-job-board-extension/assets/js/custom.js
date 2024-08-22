jQuery(document).ready(function ($) {

    $('#resume-file_co').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        //$('#file_name').text('Selected file: ' + fileName);
        if(fileName){
            $("#file_name_co_resume").text(fileName);
            console.log(fileName);
        }else{
            $("#file_name_co_resume").text('no file selected');
            console.log("no file selected");
        }
    });

    // upload_resume_co

    $('#enter_manually').on('change', function(){
        if($(this).is(':checked')){
            // If checkbox is checked, change the submit button title
            $('#upload_cv_onboarding').text('Next');
        } else {
            // If checkbox is unchecked, revert the submit button title
            $('#upload_cv_onboarding').text('Upload Your Resume');
        }
    });


    jQuery('#upload_resume_co').on('submit',function(e){
	  
        e.preventDefault();

    if($('#enter_manually').is(':checked')){

        window.location.href = "https://dev.internexxus.com/candidate-onboarding/?personal-details=true"; 
    
    } else {

	    // Get the selected file
		var validTypes = ['application/pdf', 'application/msword','text/plain'];
	    var file = jQuery('#resume-file_co').get(0).files[0];
		var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
		console.log(file);
		if(file == undefined || file == null || file == ''){
			$(".required_text").text('File is not selected');
			$("#alert_fire").css('opacity','1');
			$("#alert_fire").css('z-index','9999');
			return;
		}

		var fileTypeValid = $.inArray(file.type, validTypes) >= 0;
		var fileSizeValid = file.size <= maxSize;

		if(!fileTypeValid){
			$(".required_text").text('Error: The file type you uploaded is not supported. Please upload a file with one of the following extensions: .pdf, .doc, or .txt.');
			$("#alert_fire").css('opacity','1');
			$("#alert_fire").css('z-index','9999');
			return;
		}

		if(!fileSizeValid){
			$(".required_text").text('Error: The file you uploaded exceeds the size limit. Please ensure your file is no larger than 5 MB');
			$("#alert_fire").css('opacity','1');
			$("#alert_fire").css('z-index','9999');
			return;
		}


        // Display file name with extension
	    var fileName = file.name;
	    jQuery('#resume-name').text(fileName); // Update the text content of an element with id 'file-name'

		console.log(fileName);

	    // Create FormData object and append the file to it
	    var formData = new FormData();
	    formData.append('resume_file', file);
	    formData.append('action', 'resume_file_upload_onboard');

         // Send AJAX request
	    jQuery.ajax({
	        type: 'POST',
	        url: ajax_object.ajaxurl,
	        data: formData,
	        contentType: false,
	        processData: false,
	        beforeSend: function() {
	            // Show a loading spinner or do something before the AJAX request is sent
	            jQuery('.loader_upload_cv').addClass('show_loader');
	        },
	        success: function(response) {
	        	jQuery('.loader_upload_cv').removeClass('show_loader');

				console.log(response);

				window.location.href = "https://dev.internexxus.com/candidate-onboarding/?personal-details=true";
	        	//var resume_url=response.data.attachment_url;
	        	//var resume_data=response.data.responce_data;
	            // Handle the response from the server
	            //jQuery('#resume_url').val(response);

	        
				//jQuery('#responce_data').html(generated_html);    
	        },
	        error: function(errorThrown) {
	        	jQuery('.res-loader').hide();
	            // Handle errors here
	            console.log(errorThrown);
	        }
	    });

    }


});

// alert modal close
var cb = document.querySelectorAll(".alert_close");
	for (i = 0; i < cb.length; i++) {
	   cb[i].addEventListener("click", function() {
		  var dia = this.parentNode.parentNode; /* You need to update this part if you change level of close button */
		  dia.style.opacity = 0;
		  dia.style.zIndex = -1;
	   });
	}


	// year select 2

	        // Step 2: Generate the array of years
			const years = [];
			for (let year = 1940; year <= 2090; year++) {
				years.push(year);
			}
	
			// Step 3: Initialize Select2 with AJAX
		
				$('.year_select2').select2({
					minimumInputLength: 0, // Number of characters user must type before triggering AJAX request
					placeholder: 'Select a year',
				});
	
				// Preload the years array without AJAX (optional if you're handling it all client-side)
				$('.year_select2').select2({
					data: years.map(year => ({ id: year, text: year })),
				});
		

			const currentYear = new Date().getFullYear();
			$('.year_select2').val(currentYear).trigger('change');








});