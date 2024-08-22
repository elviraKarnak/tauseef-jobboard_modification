jQuery(document).ready(function ($) {

    var siteurl = $(".site_url").val();

    $('#mySelect').select2({
        placeholder: "Select Additional Benefits",
        allowClear: true
      });

      $('#mySelect-2').select2({
        placeholder: "Select Perks",
        allowClear: true
      });
 
      $('#mySelect-5').select2({
        placeholder: "Select University/College",
        allowClear: true
      });


        $('#university_pi').select2({
            ajax: {
                url: siteurl+'/wp-admin/admin-ajax.php', // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    return {
                    q: params.term, 
                    action: 'load_job_taxanomy',
                    taxanomy_term: 'university_name' 

                    };
                },
                processResults: function( data ) {
            var options = [];
            if ( data ) {
            
                // data is the array of arrays, and each of them contains ID and the Label of the option
                $.each( data, function( index, text ) { // do not forget that "index" is just auto incremented value
                options.push( { id: text[0], text: text[1]  } );
                });
            
            }
            return {
                results: options
            };
            },
            cache: true
        },
        maximumSelectionSize: 10,
        minimumResultsForSearch: 50,
        minimumInputLength: 0,
        placeholder: "Select Skills", // the minimum of symbols to input before perform a search
        });


        $('#skills_post_internship').select2({
            ajax: {
                url: siteurl+'/wp-admin/admin-ajax.php', // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    return {
                    q: params.term, 
                    action: 'load_job_taxanomy',
                    taxanomy_term: 'job_skills' 

                    };
                },
                processResults: function( data ) {
            var options = [];
            if ( data ) {
            
                // data is the array of arrays, and each of them contains ID and the Label of the option
                $.each( data, function( index, text ) { // do not forget that "index" is just auto incremented value
                options.push( { id: text[0], text: text[1]  } );
                });
            
            }
            return {
                results: options
            };
            },
            cache: true
        },
        maximumSelectionSize: 10,
        minimumResultsForSearch: 50,
        minimumInputLength: 0,
        placeholder: "Select Skills", // the minimum of symbols to input before perform a search
        });

      $('#job_locations_dropdown').select2({
        containerCssClass: function(e) { 
            return $(e).attr('required') ? 'required' : '';
          },
        ajax: {
            url: siteurl+'/wp-admin/admin-ajax.php', // AJAX URL is predefined in WordPress admin
            dataType: 'json',
            delay: 250, // delay in ms while typing when to perform a AJAX search
            data: function (params) {
                return {
                  q: params.term, 
                  action: 'load_job_taxanomy',
                  taxanomy_term: 'job_listing_location' 

                };
            },
            processResults: function( data ) {
          var options = [];
          if ( data ) {
        
            // data is the array of arrays, and each of them contains ID and the Label of the option
            $.each( data, function( index, text ) { // do not forget that "index" is just auto incremented value
              options.push( { id: text[0], text: text[1]  } );
            });
          
          }
          return {
            results: options
          };
        },
        cache: true
      },
      maximumSelectionSize: 10,
      minimumResultsForSearch: 50,
      minimumInputLength: 2,
      placeholder: "Search Job Location", // the minimum of symbols to input before perform a search
    });


    $.getJSON('/wp-json/custom/v1/university_list', function(data) {
        $('#university_pi').select2({
            data: data,
            maximumSelectionSize: 10,
            minimumResultsForSearch: 50,
            minimumInputLength: 3,
            placeholder: "Select University/College"
        });
    });


      
 
    $('.submit').click(function() {
        var formData = gatherFormData();
        console.log(formData); // Output formData object to console
    });





    $('#employer_company_details').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        var isValid = true;
        var errorMessage = "This field is required";
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        var phonePattern =  /^\(\d{3}\) \d{3}-\d{4}$/;

        // Clear previous error messages
        $('.error-message').text('');

        // Validate required fields
        $(this).find('[required]').each(function() {
            if (!$(this).val().trim()) {
                isValid = false;
                $(this).next('.error-message').text(errorMessage);
            }
        });

        function isBusinessEmail(email) {
            // Common free email domains
            var freeEmailDomains = [
                'gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 'live.com',
                'aol.com', 'mail.com', 'yandex.com', 'zoho.com', 'proto.me'
            ];

            // Extract the domain from the email address
            var domain = email.split('@').pop();

            // Check if the domain is in the list of free email domains
            if (freeEmailDomains.includes(domain)) {
                return false;
            } else {
                return true;
            }
        }

        // Validate email fields
        $(this).find('input[type="email"]').each(function() {
            if ($(this).val() && !emailPattern.test($(this).val())) {
                isValid = false;
                $(this).next('.error-message').text("Please enter a valid email address");
            }
            if($(this).val() && !isBusinessEmail(($(this).val()))){
                isValid = false;
                $(this).next('.error-message').text("Please enter a valid Business Email address");
            }
        });




        // Validate phone fields
        $(this).find('input[type="tel"]').each(function() {
            if ($(this).val() && !phonePattern.test($(this).val())) {
                isValid = false;
                $(this).next('.error-message').text("Please enter a valid US phone number (###) ###-####)");
            }
        });

        // If the form is valid, submit it via AJAX
       if (isValid) {
            var formData = new FormData(this);

            //console.log(formData);
           

            $.ajax({
                type: 'POST',
                url: siteurl+'/wp-admin/admin-ajax.php', // Replace with your backend endpoint
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log('Form submitted successfully');
                    var res = response.replace(/\s+/g, '');
                    if(res == '200'){
                        $(".step_form-wrapper .employer_details_row").addClass('disable');
                        $(".step_form-wrapper .employer_location_row").removeClass('disable');

                        $(".step_form-wrapper .location ").addClass('active_step');

                    }
                    // Optionally, redirect to another page or show a success message
                },
                error: function(xhr, status, error) {
                    console.error('Form submission error:', error);
                    // Optionally, display an error message to the user
                }
            });
        }
    });


    $('.company_logo_upload').on('change',function() {

        //var childCount = $(".section_horse_details .section_start").children().length;

        var thisbutton = $(this);
            console.log("started");
            var formData = new FormData();
            formData.append('action', 'upload_file_company_logo');
            formData.append('file', $(this)[0].files[0]);

            $.ajax({
                url:  siteurl+'/wp-admin/admin-ajax.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                   console.log('File uploaded successfully');
                   var imageId = response.replace(/\s+/g, '');
                   console.log(imageId);
                   $('.id_company_img').val(imageId);
                   thisbutton.addClass('disable_upload');
                   thisbutton.parent().addClass('disable_upload');
                   thisbutton.parent().parent().find('.file_upload_satatus').text('File Added Successfully');
                   thisbutton.parent().parent().find('.remove_file_text').text('Remove File');
                   thisbutton.parent().parent().find('.file_upload_satatus').addClass('show');
                   thisbutton.parent().parent().find('.reomve_button_status').addClass('show');

              
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading file:', error);
                }
            });
      
        });

    
    $("#employer_location_details").on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: siteurl+'/wp-admin/admin-ajax.php', // Replace with your backend endpoint
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('Form submitted successfully');
                var res = response.replace(/\s+/g, '');
                if(res == '200'){
                    $(".step_form-wrapper .employer_details_row").addClass('disable');
                    $(".step_form-wrapper .employer_location_row").addClass('disable');
                    $(".step_form-wrapper .employer_social_row").removeClass('disable');

                    $(".step_form-wrapper .social_media  ").addClass('active_step');

                }
                // Optionally, redirect to another page or show a success message
            },
            error: function(xhr, status, error) {
                console.error('Form submission error:', error);
                // Optionally, display an error message to the user
            }
        });

        
    })

    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1700:2100" // Optional: set year range
    });



    // job post form

        $('#job_majors').select2({
            ajax: {
                url: siteurl+'/wp-admin/admin-ajax.php', // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    return {
                    q: params.term, 
                    action: 'load_job_taxanomy',
                    taxanomy_term: 'job_major_minors' 

                    };
                },
                processResults: function( data ) {
            var options = [];
            if ( data ) {
            
                // data is the array of arrays, and each of them contains ID and the Label of the option
                $.each( data, function( index, text ) { // do not forget that "index" is just auto incremented value
                options.push( { id: text[0], text: text[1]  } );
                });
            
            }
            return {
                results: options
            };
            },
            cache: true
        },
        maximumSelectionSize: 10,
        minimumResultsForSearch: 50,
        minimumInputLength: 0,
        placeholder: "Select Majors", // the minimum of symbols to input before perform a search
        });


        $('#job_minors').select2({
            ajax: {
                url: siteurl+'/wp-admin/admin-ajax.php', // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    return {
                    q: params.term, 
                    action: 'load_job_taxanomy',
                    taxanomy_term: 'job_major_minors' 

                    };
                },
                processResults: function( data ) {
            var options = [];
            if ( data ) {
            
                // data is the array of arrays, and each of them contains ID and the Label of the option
                $.each( data, function( index, text ) { // do not forget that "index" is just auto incremented value
                options.push( { id: text[0], text: text[1]  } );
                });
            
            }
            return {
                results: options
            };
            },
            cache: true
        },
        maximumSelectionSize: 10,
        minimumResultsForSearch: 50,
        minimumInputLength: 0,
        placeholder: "Select Minors", // the minimum of symbols to input before perform a search
        });

        $('#job_additional_benefits').select2({
            ajax: {
                url: siteurl+'/wp-admin/admin-ajax.php', // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    return {
                    q: params.term, 
                    action: 'load_job_taxanomy',
                    taxanomy_term: 'job_Job Benifits' 

                    };
                },
                processResults: function( data ) {
            var options = [];
            if ( data ) {
            
                // data is the array of arrays, and each of them contains ID and the Label of the option
                $.each( data, function( index, text ) { // do not forget that "index" is just auto incremented value
                options.push( { id: text[0], text: text[1]  } );
                });
            
            }
            return {
                results: options
            };
            },
            cache: true
        },
        maximumSelectionSize: 10,
        minimumResultsForSearch: 50,
        minimumInputLength: 0,
        placeholder: "Additional Benefits", // the minimum of symbols to input before perform a search
        });

        $('#jobs_perks').select2({
            ajax: {
                url: siteurl+'/wp-admin/admin-ajax.php', // AJAX URL is predefined in WordPress admin
                dataType: 'json',
                delay: 250, // delay in ms while typing when to perform a AJAX search
                data: function (params) {
                    return {
                    q: params.term, 
                    action: 'load_job_taxanomy',
                    taxanomy_term: 'job_Perks' 

                    };
                },
                processResults: function( data ) {
            var options = [];
            if ( data ) {
            
                // data is the array of arrays, and each of them contains ID and the Label of the option
                $.each( data, function( index, text ) { // do not forget that "index" is just auto incremented value
                options.push( { id: text[0], text: text[1]  } );
                });
            
            }
            return {
                results: options
            };
            },
            cache: true
        },
        maximumSelectionSize: 10,
        minimumResultsForSearch: 50,
        minimumInputLength: 0,
        placeholder: "Perks", // the minimum of symbols to input before perform a search
        });
    
});