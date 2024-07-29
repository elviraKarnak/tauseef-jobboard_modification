<?php ob_start(); ?>

<input type="hidden" class="site_url" value="<?php echo home_url(); ?>">
<div class="container">


    <div class="step_form-wrapper">
        <div class="step-form_navigation">
            <ul class="step__navigate">
                <li class="company_details active_step">
                   <div class="step_icon"><img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/company_active-icon.svg" alt="" class="icon_img"></div>
                   <label class="step_label">Company Details</label>
                </li>
                <li class="location ">
                    <div class="step_icon"><img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/location_normal-icon.svg" class="icon_img" alt=""></div>
                    <label class="step_label">Location</label>
                </li>
                <li class="social_media ">
                    <div class="step_icon"><img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/social_icon.svg" class="icon_img" alt=""></div>
                    <label class="step_label">Social Media</label>
                </li>
            </ul>
        </div>
        <div class="form_parent-row employer_details_row">
          <form id="employer_company_details" name="employer_company_details" method="POST">
            <input type="hidden" name="action" value="add_employe_data">
            <h2 class="title">Company Details</h2>
            <div class="form_child-colmn">
                <div class="row">
                   <div class="col-md-6">
                     <div class="form__group">
                       <label class="field_label">Company Name<span>*</span></label>
                         <input type="text" name="company_name" class="form-field-control" required>
                         <span class="error-message"></span>
                     </div>
                   </div>

                    <div class="col-md-6">
                     <div class="form__group">
                       <label class="field_label">Founded Date<span>*</span></label>
                         <input type="text" id="datepicker" name="founded_date" class="form-field-control" required>
                         <!-- <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all" bis_skin_checked="1"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title" bis_skin_checked="1"><select class="ui-datepicker-month" aria-label="Select month" data-handler="selectMonth" data-event="change"><option value="0">Jan</option><option value="1"> Feb</option><option value="2"> Mar</option><option value="3"> Apr</option><option value="4"> May</option><option value="5" selected="selected"> Jun</option><option value="6"> Jul</option><option value="7"> Aug</option><option value="8"> Sep</option><option value="9"> Oct</option><option value="10"> Nov</option><option value="11"> Dec</option></select><select class="ui-datepicker-year" aria-label="Select year" data-handler="selectYear" data-event="change"><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024" selected="selected">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option></select></div></div> -->
                         <span class="error-message"></span>
                     </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Website<span>*</span></label>
                           <input type="text" name="website" class="form-field-control" required>
                           <span class="error-message"></span>
                       </div>
                     </div>

                     
                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Company Size<span>*</span></label>
                           <input type="number" name="company_size" class="form-field-control" required>
                           <span class="error-message"></span>
                       </div>
                     </div>

                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Phone No.<span>*</span></label>
                           <input type="tel" name="phone_number" class="form-field-control"   placeholder="(###) ###-####" required>
                           <span class="error-message"></span>
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Email Id<span>*</span></label>
                           <input type="email" name="email_id" class="form-field-control" required>
                           <span class="error-message"></span>
                       </div>
                     </div>
                     <div class="col-md-12">
                       <div class="form__group">
                         <label class="field_label">About Company<span>*</span></label>
                           <textarea name="about_company" class="text_field-control" required></textarea>
                           <span class="error-message"></span>
                       </div>
                     </div>
 
                     <div class="col-md-12">
                       <div class="form__group">
                         <label class="field_label">Company Logo<span>*</span></label>
                         <input class="form-control company_logo_upload" name="file" type="file" id="formFile" required>
                         <input type="hidden" name="company_profile_image_id" class="id_company_img">  
                         <span class="error-message"></span>
                           <!-- <div class="file_satus">
                                 <p class="file_upload_satatus"></p>
                                 <p class="reomve_button_status"><span class="remove_file_text"></span>
                                  <button class="remove_file" data-attchmentid="">&#10060;</button>
                                  </p>
                                  </div> -->
                       </div>
                     </div>

                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Name of Representative<span>*</span></label>
                           <input type="text" name="representative" class="form-field-control" required>
                           <span class="error-message"></span>
                       </div>
                     </div>

                     
                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Work Title<span>*</span></label>
                           <input type="text" name="job_title" class="form-field-control" required>
                           <span class="error-message"></span>
                       </div>
                     </div>

                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Phone No.<span>*</span></label>
                           <input type="tel" name="representative_phone_number" class="form-field-control"  placeholder="(###) ###-####" required>
                           <span class="error-message"></span>
                       </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Email Id<span>*</span></label>
                           <input type="email" name="representative_email_id" class="form-field-control" required>
                           <span class="error-message"></span>
                       </div>
                     </div>

                </div>
           </div>
          
           <div class="stb-4 text-center">
            <button type="submit" class="btnStepForm nextStep" data-step="company_details">Next</button>
           </div>     
           </form>     
        </div> 

        <div class="form_parent-row disable employer_location_row">
        <form id="employer_location_details" name="employer_location_details" method="POST">
          <input type="hidden" value="add_employe_loc_data" name="action">
            <h2 class="title">Location</h2>
           <div class="form_child-colmn">
                <div class="row">
                <div class="col-md-6">
                  <div class="form__group">
                      <label class="field_label">State<span>*</span></label>
                      <select id="stateDropdown" name="state" class="form-field-control">
                          <option value="">Select State</option>
                      </select>
                      <span class="error-message"></span>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form__group">
                      <label class="field_label">City<span>*</span></label>
                      <select id="cityDropdown" name="city" class="form-field-control">
                          <option value="">Select City</option>
                      </select>
                      <span class="error-message"></span>
                  </div>
              </div>
                   <div class="col-md-12">
                       <div class="form__group">
                         <label class="field_label">Maps Location<span>*</span></label>
                           <input type="text" id="map_location_autofetch" name="maps_location" class="form-field-control">
                           <input type="hidden" id="loc_lat" name="latitude_emp" />
                           <input type="hidden" id="loc_long" name="longitude_emp"/>
                           <span class="error-message"></span>
                       </div>
                     </div>

                     <div class="col-md-12">
                        <div id="rendered_map_employer" class="map_show-label"></div>
                      </div>


                </div>
           </div>
           <div class="stb-4 text-center">
            <!-- <button class="btnStepForm previousStep" data-step="location">Previous</button> -->
            <button type="submit" class="btnStepForm nextStep" data-step="location">Next</button>
           </div>  
          </form>        
        </div> 

        <div class="form_parent-row disable employer_social_row">
            <h2 class="title">Social Media</h2>
            <div class="container sm_container mt-5">
              <div class="form-group social_media_wrap">
              <div id="field-container">
                <div class="field-wrapper">
                    <div class="custom-select-wrapper">
                        <div class="custom-select" id="selected-option-0">
                            <i class="fab fa-facebook"></i><span></span><i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="custom-select-options" id="options-0">
                            <div data-value="facebook"><i class="fab fa-facebook"></i></div>
                            <div data-value="twitter"><i class="fab fa-twitter"></i></div>
                            <div data-value="instagram"><i class="fab fa-instagram"></i></div>
                            <div data-value="linkedin"><i class="fab fa-linkedin"></i></div>
                            <div data-value="tiktok"><i class="fab fa-tiktok"></i></div>
                        </div>
                    </div>
                    <input type="hidden" class="icon-value" id="icon-value-0">
                    <input type="text" placeholder="Enter URL" class="url-input">
                </div>
              </div>
          
                <input type="hidden" class="platform_name" name="platform_name">
              </div>
            </div>

            <div class="form_child-colmn text-center">
              <a href="javascript:void(0);" id="clone-button" class="clone-button">+ Add Social Media</a>
            </div>
            
            <div class="stb-4 text-center">
              <!-- <button class="btnStepForm previousStep" data-step="social_media">Previous</button> -->
              <a href="<?php echo home_url('/submit-internship/'); ?>" class="btnStepForm submit">Post Internship</a>
              <a href="<?php echo home_url('/user-dashboard/'); ?>" class="btnStepForm submit">Visit Dashboard</a>
            </div>          
        </div> 
        
   </div>
  </div>


    <script>
    jQuery(document).ready(function($) {

        let fieldCount = 1;

        var site_url = '<?php echo home_url(); ?>';

        function validateSocialMediaProfile(platform, url) {
            // Define the regex patterns for each social media platform
            var patterns = {
                'facebook': /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]+$/,
                'instagram': /^(https?:\/\/)?(www\.)?instagram.com\/[a-zA-Z0-9(\.\?)?]+$/,
                'twitter': /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]+$/,
                'linkedin': /^(https?:\/\/)?(www\.)?linkedin.com\/in\/[a-zA-Z0-9(\.\?)?]+$/,
                'tiktok': /^(https?:\/\/)?(www\.)?tiktok.com\/@?[a-zA-Z0-9(\.\?)?]+$/
            };
          }

        function initializeSelect(selectId, optionsId, iconValueId) {
            $(`#${selectId}`).on('click', function() {
                $(`#${optionsId}`).toggle();
            });

            $(`#${optionsId} div`).on('click', function() {
                const value = $(this).data('value');
                const icon = $(this).find('i').attr('class');
                const text = $(this).text().trim();
                $(`#${selectId}`).html(`<i class="${icon}"></i> ${text} <i class="fas fa-chevron-down"></i>`);
                $(`#${iconValueId}`).val(value);
                $(`#${optionsId}`).hide();
            });

            $(window).on('click', function(e) {
                if (!$(e.target).closest('.custom-select-wrapper').length) {
                    $(`#${optionsId}`).hide();
                }
            });
        }

        initializeSelect('selected-option-0', 'options-0', 'icon-value-0');

        $('#clone-button').on('click', function() {
            const newFieldWrapper = `
                <div class="field-wrapper">
                    <div class="custom-select-wrapper">
                        <div class="custom-select" id="selected-option-${fieldCount}">
                            <i class="fab fa-facebook"></i><i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="custom-select-options" id="options-${fieldCount}">
                            <div data-value="facebook"><i class="fab fa-facebook"></i></div>
                            <div data-value="twitter"><i class="fab fa-twitter"></i></div>
                            <div data-value="instagram"><i class="fab fa-instagram"></i></div>
                            <div data-value="linkedin"><i class="fab fa-linkedin"></i></div>
                            <div data-value="tiktok"><i class="fab fa-tiktok"></i></div>
                        </div>
                    </div>
                    <input type="hidden" class="icon-value" id="icon-value-${fieldCount}">
                    <input type="text" placeholder="Enter URL" class="url-input">
                </div>
            `;
            $('#field-container').append(newFieldWrapper);
            initializeSelect(`selected-option-${fieldCount}`, `options-${fieldCount}`, `icon-value-${fieldCount}`);
            fieldCount++;
        });

        $(document).on('change', '.url-input', function() {
            const url = $(this).val();
            const regex = /^(ftp|http|https):\/\/[^ "]+$/;
            if (!regex.test(url)) {
                alert('Please enter a valid URL.');
                return;
            }

            const iconValue = $(this).siblings('.icon-value').val();
            if (!iconValue) {
                alert('Please select a social media platform.');
                return;
            }

            
            if(!validateSocialMediaProfile(iconValue,url)){
              alert('Please provide a Proper Social Media Profile.');
              return;
            }


            // Perform AJAX request
            $.ajax({
                url: site_url+'/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action:'upload_social_icon',
                    platform: iconValue,
                    url: url
                },
                success: function(response) {
                    console.log('Data successfully sent to the server.');

                    console.log(response);
                },
                error: function(error) {
                    //alert('An error occurred while sending data.');
                }
            });
        });

     function getplatformname(iconClass){
      var newClass = iconClass.split('-')[1].trim();
      return newClass;
     }


        $('.add_social-btn').on('click', function() {
        // Clone the div with class 'social_media_wrap'
        var clonedDiv = $('.social_media_wrap').clone();

        // Clear the cloned input fields
        clonedDiv.find('input[type="text"]').val('');
        clonedDiv.find('.platform_name').val('');

        // Append the cloned div to wherever you want it in the DOM
        clonedDiv.appendTo('.sm_container'); // Replace '.container' with your target element

        // Optional: If you want to reset the dropdown to the default selected icon
        clonedDiv.find('.sm_select i').removeClass().addClass('fab fa-facebook'); // Change to your default icon class
    });



      //location state city dropdown  
              // Static array of US states
              var usStates = [
                  { name: 'Alabama', iso2: 'AL' },
                  { name: 'Alaska', iso2: 'AK' },
                  { name: 'Arizona', iso2: 'AZ' },
                  { name: 'Arkansas', iso2: 'AR' },
                  { name: 'California', iso2: 'CA' },
                  { name: 'Colorado', iso2: 'CO' },
                  { name: 'Connecticut', iso2: 'CT' },
                  { name: 'Delaware', iso2: 'DE' },
                  { name: 'Florida', iso2: 'FL' },
                  { name: 'Georgia', iso2: 'GA' },
                  { name: 'Hawaii', iso2: 'HI' },
                  { name: 'Idaho', iso2: 'ID' },
                  { name: 'Illinois', iso2: 'IL' },
                  { name: 'Indiana', iso2: 'IN' },
                  { name: 'Iowa', iso2: 'IA' },
                  { name: 'Kansas', iso2: 'KS' },
                  { name: 'Kentucky', iso2: 'KY' },
                  { name: 'Louisiana', iso2: 'LA' },
                  { name: 'Maine', iso2: 'ME' },
                  { name: 'Maryland', iso2: 'MD' },
                  { name: 'Massachusetts', iso2: 'MA' },
                  { name: 'Michigan', iso2: 'MI' },
                  { name: 'Minnesota', iso2: 'MN' },
                  { name: 'Mississippi', iso2: 'MS' },
                  { name: 'Missouri', iso2: 'MO' },
                  { name: 'Montana', iso2: 'MT' },
                  { name: 'Nebraska', iso2: 'NE' },
                  { name: 'Nevada', iso2: 'NV' },
                  { name: 'New Hampshire', iso2: 'NH' },
                  { name: 'New Jersey', iso2: 'NJ' },
                  { name: 'New Mexico', iso2: 'NM' },
                  { name: 'New York', iso2: 'NY' },
                  { name: 'North Carolina', iso2: 'NC' },
                  { name: 'North Dakota', iso2: 'ND' },
                  { name: 'Ohio', iso2: 'OH' },
                  { name: 'Oklahoma', iso2: 'OK' },
                  { name: 'Oregon', iso2: 'OR' },
                  { name: 'Pennsylvania', iso2: 'PA' },
                  { name: 'Rhode Island', iso2: 'RI' },
                  { name: 'South Carolina', iso2: 'SC' },
                  { name: 'South Dakota', iso2: 'SD' },
                  { name: 'Tennessee', iso2: 'TN' },
                  { name: 'Texas', iso2: 'TX' },
                  { name: 'Utah', iso2: 'UT' },
                  { name: 'Vermont', iso2: 'VT' },
                  { name: 'Virginia', iso2: 'VA' },
                  { name: 'Washington', iso2: 'WA' },
                  { name: 'West Virginia', iso2: 'WV' },
                  { name: 'Wisconsin', iso2: 'WI' },
                  { name: 'Wyoming', iso2: 'WY' }
              ];

              var apiKey = 'd0I5NVFjanR2RU82YVk5R1RZUkw4dDEyVjVWYUU3czhFRzE2Ukd5Qw==';
              var stateCode;
              var cities = [];
              var currentIndex = 0;
              var limit = 100;

              $('#stateDropdown').select2();
              $('#cityDropdown').select2({
                  dropdownParent: $('#cityDropdown').parent(),
                  ajax: {
                      delay: 250,
                      processResults: function(data) {
                          return {
                              results: data.items
                          };
                      }
                  }
              });

              // Function to populate state dropdown using the static array
              function populateStates() {
                  $.each(usStates, function(index, state) {
                      var newOption = new Option(state.name, state.iso2, false, false);
                      $('#stateDropdown').append(newOption);
                  });
                  $('#stateDropdown').trigger('change');
              }

              // Function to load cities for the selected state
              function loadCities(stateCode) {
                  $.ajax({
                      url: 'https://api.countrystatecity.in/v1/countries/US/states/' + stateCode + '/cities',
                      method: 'GET',
                      headers: {
                          "X-CSCAPI-KEY": apiKey
                      },
                      success: function(response) {
                          cities = response;
                          var cityData = cities.map(function(city) {
                              return {
                                  id: city.name,
                                  text: city.name
                              };
                          });

                          $('#cityDropdown').empty().select2({
                              data: cityData
                          });
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                          console.error('Failed to load cities:', textStatus, errorThrown);
                          alert('Failed to load cities. Please try again.');
                      }
                  });
              }

              // Populate states on page load
              populateStates();

              // Event listener for state dropdown change
              $('#stateDropdown').on('change', function() {
                  stateCode = $(this).val();
                  if (stateCode) {
                      loadCities(stateCode);
                  } else {
                      $('#cityDropdown').empty().append('<option value="">Select City</option>');
                  }
              });

            // google map auto complte


              var searchInput = 'map_location_autofetch';

              var autocomplete;
              autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
              types: ['geocode'],
              componentRestrictions: {
              country: "USA"
              }
            });
            
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var near_place = autocomplete.getPlace();
            var lat = near_place.geometry.location.lat();
            var lang = near_place.geometry.location.lng();
              
            document.getElementById('loc_lat').value = lat;
            document.getElementById('loc_long').value = lang
		
            // document.getElementById('latitude_view').innerHTML = lat;
            // document.getElementById('longitude_view').innerHTML = lang;
              
            initMap(lat,lang);
    });
       
       
      function initMap(latitude,longitude) {
           if(latitude != null && longitude != null){
            // Create a map centered at the coordinates
            const map = new google.maps.Map(document.getElementById("rendered_map_employer"), {
                center: { lat: latitude, lng: longitude },
                zoom: 12, // Adjust the zoom level as needed
            });

            // Example: Add a marker at the coordinates
            new google.maps.Marker({
                position: { lat: latitude, lng: longitude },
                map: map,
                title: 'Marker Title' // Optional: Add a title for the marker
            });
               
           }
        }



        });
 
  </script>


<?php echo "<div class='employer_onboard'>".ob_get_clean()."</div>";?>