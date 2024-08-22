<?php 
  $uploadResume = $_GET['upload-resume'] ? $_GET['upload-resume'] : '';
  $personalDetails = $_GET['personal-details'] ? $_GET['personal-details'] : '';
  $educationDetails = $_GET['education-details'] ? $_GET['education-details'] : '';
  $workExperience = $_GET['work-experience'] ? $_GET['work-experience'] : '';
  $eeo            = $_GET['eeo'] ? $_GET['eeo'] : '';
  $otherDetails = $_GET['other-details'] ? $_GET['other-details'] : '';
  $careerInterest = $_GET['career-interest'] ? $_GET['career-interest'] : '';
  $opportunity = $_GET['opportunity'] ? $_GET['opportunity'] : '';


  if(!empty($uploadResume) && $uploadResume == "true"){
    $uploadResumeClass = 'active_step';
  } else {
    $uploadResumeClass = '';
    $progressBarClass = 'active_step';
  }
  if(!empty($personalDetails) && $personalDetails == "true"){
    $personalDetailsClass = 'active_step';

  } else {
    $personalDetailsClass = '';
  }
  if(!empty($educationDetails) && $educationDetails == "true"){
    $educationDetailsClass = 'active_step';
    $educationDetailsStepClass = 'active_step';
  } else {
    $educationDetailsClass = '';
  }
  if(!empty($workExperience) && $workExperience == "true"){
    $workExperienceClass = 'active_step';
    $educationDetailsStepClass = 'active_step';
    $workExperienceStepClass = 'active_step';
  } else {
    $workExperienceClass = '';
    $progressBarClass = '';
  }
  if(!empty($eeo) && $eeo == "true"){
    $eeoClass = 'active_step';
    $educationDetailsStepClass = 'active_step';
    $workExperienceStepClass = 'active_step';
    $eeoStepClass = 'active_step';
  } else {
    $eeoClass = '';
  }
  if(!empty($otherDetails) && $otherDetails == "true"){
    $otherDetailsClass = 'active_step';
    $educationDetailsStepClass = 'active_step';
    $workExperienceStepClass = 'active_step';
    $eeoStepClass = 'active_step';
    $otherDetailsStepClass = 'active_step';
  } else {
    $otherDetailsClass = '';
  }
  if(!empty($careerInterest) && $careerInterest == "true"){
    $careerInterestClass = 'active_step';
    $educationDetailsStepClass = 'active_step';
    $workExperienceStepClass = 'active_step';
    $eeoStepClass = 'active_step';
    $otherDetailsStepClass = 'active_step';
    $careerInterestStepClass = 'active_step';
  } else {
    $careerInterestClass = '';
  }
  if(!empty($opportunity) && $opportunity == "true"){
    $opportunityClass = 'active_step';
    
  } else {
    $opportunityClass = "";
  }

  if((!empty($uploadResume) && $uploadResume == "true") || (!empty($opportunity) && $opportunity == "true") ){
    $progressBarClass = '';
  }else{
    $progressBarClass = 'active_step';
  }

?>

  <style>
  .form_parent-row,
  .custom-card-container,
  .step-form_navigation{
    display: none;
  }

  .form_parent-row.active_step,
  .custom-card-container.active_step,
  .step-form_navigation.active_step{
    display: block;
  }

  </style>

<div class="container">
      <!-- upload resume starts -->
      <form id="upload_resume_co" class="form_parent-row <?php echo $uploadResumeClass; ?>">
        <h2 class="title">Upload Resume</h2>
        <div class="form_child-colmn">
          <h4 class="form-title">Upload Options</h4>
          <div class="upload-resume-form">
            <div class="">
              <div class="upload-btn-wrapper">
                <div class="upload-btn">
                  <img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/material-symbols_upload.svg" alt=""> Upload Resume
                  From Computer
                  <p id="file_name_co_resume" class="file_name"></p>
                </div> 
               
                <input type="file" name="myfile" id="resume-file_co" />
                
              </div>
            </div>
            <div class="">
              <div class="upload-btn-wrapper resume_url-box">
                <label for="myfile_url"><img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/ph_copy.svg" alt="">Paste Your Resume Url Here</label>
                <input type="text" name="myfile_url" id="myfile_url" placeholder="" />
              </div>
            </div>
          </div>
          <div class="loader_upload_cv">
              <span class="loader"></span>
          </div>
          <div class="desc">
            <p>We accept resume in PDF, Doc, Docx, PPT, TXT format only with file size below 2 MB.</p>
            <p>We do not accept scanned document of resume with images and icons </p>
            <p>It is recommended that you keep your resume below 5 Pages</p>
          </div>
          <div class="checkbox-wrapper" style="margin-bottom:20px;">
              <input type="checkbox" id="enter_manually" name="enter_manually" value="enter_manually">
              <label for="enter_manually">I will enter my information manually.</label>
            </div>
            <h4 class="form-title">Resume Privacy</h4>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="checkbox1" name="checkbox1" required>
              <label for="checkbox1">Public resume visible to employers to view, download. <span>
                <a href="<?php echo home_url('/privacy-policy/')?>">Review
                    Privacy Policy</a></span> </label>
            </div>
          </div>
        <div class="stb-4 text-center">
          <button id="upload_cv_onboarding" type="submit" class="btnStepForm">Upload Your Resume</button>
        </div>
    </form>
      <!-- upload resume ends -->



    <!-- form navigation starts -->

    <div class="step-form_navigation <?php echo $progressBarClass;?>">
    <ul class="step__navigate">
        <li id="steps_counter" class="active_step">
          <div class="step_icon">
            <img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/step-icons/user.svg" alt="" class="icon_img">
          </div>
          <label class="step_label">Personal Details</label>
        </li>
        <li id="steps_counter" class="<?php echo $educationDetailsStepClass; ?>">
          <div class="step_icon">
            <img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/step-icons/career.svg" class="icon_img" alt="">
          </div>
          <label class="step_label">Education Details</label>
        </li>
        <li id="steps_counter" class="<?php echo $workExperienceStepClass; ?>">
          <div class="step_icon">
            <img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/step-icons/envelope.svg" class="icon_img" alt="">
          </div>
          <label class="step_label">Work Experience</label>
        </li>
        <li id="steps_counter" class="<?php echo $eeoStepClass; ?>">
          <div class="step_icon">
            <img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/step-icons/eeo-work.svg" class="icon_img" alt="">
          </div>
          <label class="step_label">EEO &  Work Authorization</label>
        </li>
        <li id="steps_counter" class="<?php echo $otherDetailsStepClass; ?>">
          <div class="step_icon">
            <img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/step-icons/paper.svg" class="icon_img" alt="">
          </div>
          <label class="step_label">Other Details</label>
        </li>
        <li id="steps_counter" class="<?php echo $careerInterestStepClass; ?>">
          <div class="step_icon">
            <img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/step-icons/career-interest.svg" class="icon_img" alt="">
          </div>
          <label class="step_label">Career Interest</label>
        </li>
      </ul>
    </div>
    <!-- form navigation ends -->
    <div class="step_form-wrapper">

      <?php //if (have_rows('candidate_onboarding_main')): while (have_rows('candidate_onboarding_main')): the_row(); ?>
        <!--personal details starts -->
        <div class="form_parent-row <?php echo $personalDetailsClass; ?>">
          <h2 class="title">Personal Details</h2>
          <div class="form_child-colmn">
          <?php echo do_shortcode('[frontend_admin form=41028]') ?>
          </div>
        </div>
        <!-- personal details ends -->
      <?php // endwhile; endif; ?>

      <div class="form_parent-row <?php echo $educationDetailsClass; ?>">
          <h2 class="title">Education Details</h2>
          <div class="form_child-colmn">
          <?php echo do_shortcode('[frontend_admin form=41059]') ?>
          </div>
        </div>


        <div class="form_parent-row <?php echo $workExperienceClass; ?>">
          <h2 class="title">Work Experience</h2>
          <div class="form_child-colmn">
          <?php echo do_shortcode('[frontend_admin form=41069]') ?>
          </div>
        </div>


        <div class="form_parent-row <?php echo $eeoClass; ?>">
          <h2 class="title">EEO &  Work Authorization</h2>
          <div class="form_child-colmn">
          <?php echo do_shortcode('[frontend_admin form=41078]') ?>
          </div>
        </div>


        <div class="form_parent-row <?php echo $otherDetailsClass; ?>">
          <h2 class="title">Other Details</h2>
          <div class="form_child-colmn">
          <?php echo do_shortcode('[frontend_admin form=41111]') ?>
          </div>
        </div>


        <div class="form_parent-row <?php echo $careerInterestClass; ?>">
          <h2 class="title">Career Interest</h2>
          <div class="form_child-colmn">
          <?php echo do_shortcode('[frontend_admin form=41121]') ?>
          </div>
        </div>
    </div>
     
      <!-- Recommended Opportunity  -->
      <div class="custom-card-container <?php echo $opportunityClass; ?>">
        <h2 class="form-titl">Recommended Opportunity</h2>
        <?php 
            $args = array(
              'post_type' => 'job_listing', 
              'posts_per_page' => 10, 
              'orderby' => 'date', 
              'order' => 'DESC', 
            );

            $query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $post_id = get_the_ID();
      $author_id = get_post_field('post_author', $post_id);
      $employerId = get_user_meta($author_id, 'employer_id', true);

       $dumyUrl = 'https://dev.internexxus.com/wp-content/uploads/2024/06/buildings-2.png';
 
      ?>

        <div class="custom-card dis-flex ">
          <div class="dis-flex">
            <figure>
              <img src="<?php echo get_the_post_thumbnail_url($employerId) ? get_the_post_thumbnail_url($employerId) : $dumyUrl; ?>" alt="<?php the_title(); ?>" class="employer-logo">
            </figure>
            <div class="card-content">
              <p class="card-title"><?php the_title(); ?></p>
              <?php 
            
              $salary = get_post_meta($post_id, '_job_max_salary', true);
              $jobCategory = wp_get_post_terms($post_id, 'job_listing_category');

              $jobCategories = [];

              if (!empty($jobCategory) && !is_wp_error($jobCategory)) {
                foreach ($jobCategory as $category) {
                  array_push($jobCategories, $category->name);
                }
              }

              
              ?>
              <div class="dis-flex">
              <?php if(!empty($jobCategory)) { ?>
                <p><img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/briefcase.svg" alt=""> 
                <?php echo implode(', ', $jobCategories); ?>
                </p>
                <?php } ?>
               <?php if(!empty($salary)) { ?>
                <p><img src="<?php echo Internexxus_JobBoard_Extension_URL; ?>/assets/images/price.svg" alt="">
                <?php echo  $salary; ?>
              </p>
              <?php } ?>
              </div>
            </div>
          </div>
          <a href="<?php the_permalink(); ?>" class="applyBtn">Apply Now</a>
        </div>
        <?php }
          }
        ?>
      </div>

    </div>
  </div>



  <!-- Custom MODALS -->

    <div class="custom_alert_box">
    <div id="alert_fire" class="modal-wrapper">
        <div class="modal">
            <a href="#close" title="Close" class="alert_close"><i class="fa-solid fa-xmark"></i></a>
            <div class="modal-header">
              <h2>Warning!!</h2>
            </div>
            <div class="modal-alert-content">
            <i class="icon-alert fa-solid fa-exclamation"></i>
              <p class="alert alert-warning required_text" role="role"></p>
            </div>
        </div>
      </div>
  </div>
<?php 
  if(!empty($personalDetails) && $personalDetails == "true"){

    $current_user_id = get_current_user_id();
    $postId = get_user_meta($current_user_id, 'candidate_id', true);
    $cvId = get_post_meta($postId, '_candidate_cv_attachment', true);

    if(!empty($cvId)){

      $attachment_url = wp_get_attachment_url($cvId);
      $path = parse_url($attachment_url, PHP_URL_PATH);
      $file_info = pathinfo($path);
      $file_extension = isset($file_info['extension']) ? $file_info['extension'] : 'unknown';
      
      $data = array(
        'url' => $attachment_url,
        'file_type' => $file_extension
      );
    
    // Encode the array to JSON format
      $json_body = json_encode($data);

      $curl = curl_init();
      
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mpubhfdmaa.execute-api.us-west-1.amazonaws.com/default/resume_parser',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>  $json_body,
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      
      $userInformation = json_decode($response, true);
      
      if (!empty($userInformation) && $userInformation['statusCode'] == 200) {
        $full_name = isset($userInformation['Full Name']) ? $userInformation['Full Name'] : 'Not available';
        $contact_number = isset($userInformation['Contact Number']) ? $userInformation['Contact Number'] : 'Not available';
        $email = isset($userInformation['Email']) ? $userInformation['Email'] : 'Not available';
        ?>
        <script>
        jQuery(document).ready(function($) {

          var name = '<?php echo  $full_name; ?>';
          var cn = '<?php echo  $contact_number; ?>';
          var email = '<?php echo  $email; ?>';

          $("#acff-post-field_66b04a12c2c11").val(name);
          $("#acff-post-field_66a8d25bfc4f8").val(cn);
          $("#acff-post-field_66b0507ebe0c6").val(email);
          
        });

        </script>
      

      <?php
       }




       }

  } 
?>
  <script>
    jQuery(document).ready(function($) {
      $(".acf-repeater-add-row").click();

 //location state city dropdown  
              // Static array of US states
              // var usStates = [
              //     { name: 'Alabama', iso2: 'AL' },
              //     { name: 'Alaska', iso2: 'AK' },
              //     { name: 'Arizona', iso2: 'AZ' },
              //     { name: 'Arkansas', iso2: 'AR' },
              //     { name: 'California', iso2: 'CA' },
              //     { name: 'Colorado', iso2: 'CO' },
              //     { name: 'Connecticut', iso2: 'CT' },
              //     { name: 'Delaware', iso2: 'DE' },
              //     { name: 'Florida', iso2: 'FL' },
              //     { name: 'Georgia', iso2: 'GA' },
              //     { name: 'Hawaii', iso2: 'HI' },
              //     { name: 'Idaho', iso2: 'ID' },
              //     { name: 'Illinois', iso2: 'IL' },
              //     { name: 'Indiana', iso2: 'IN' },
              //     { name: 'Iowa', iso2: 'IA' },
              //     { name: 'Kansas', iso2: 'KS' },
              //     { name: 'Kentucky', iso2: 'KY' },
              //     { name: 'Louisiana', iso2: 'LA' },
              //     { name: 'Maine', iso2: 'ME' },
              //     { name: 'Maryland', iso2: 'MD' },
              //     { name: 'Massachusetts', iso2: 'MA' },
              //     { name: 'Michigan', iso2: 'MI' },
              //     { name: 'Minnesota', iso2: 'MN' },
              //     { name: 'Mississippi', iso2: 'MS' },
              //     { name: 'Missouri', iso2: 'MO' },
              //     { name: 'Montana', iso2: 'MT' },
              //     { name: 'Nebraska', iso2: 'NE' },
              //     { name: 'Nevada', iso2: 'NV' },
              //     { name: 'New Hampshire', iso2: 'NH' },
              //     { name: 'New Jersey', iso2: 'NJ' },
              //     { name: 'New Mexico', iso2: 'NM' },
              //     { name: 'New York', iso2: 'NY' },
              //     { name: 'North Carolina', iso2: 'NC' },
              //     { name: 'North Dakota', iso2: 'ND' },
              //     { name: 'Ohio', iso2: 'OH' },
              //     { name: 'Oklahoma', iso2: 'OK' },
              //     { name: 'Oregon', iso2: 'OR' },
              //     { name: 'Pennsylvania', iso2: 'PA' },
              //     { name: 'Rhode Island', iso2: 'RI' },
              //     { name: 'South Carolina', iso2: 'SC' },
              //     { name: 'South Dakota', iso2: 'SD' },
              //     { name: 'Tennessee', iso2: 'TN' },
              //     { name: 'Texas', iso2: 'TX' },
              //     { name: 'Utah', iso2: 'UT' },
              //     { name: 'Vermont', iso2: 'VT' },
              //     { name: 'Virginia', iso2: 'VA' },
              //     { name: 'Washington', iso2: 'WA' },
              //     { name: 'West Virginia', iso2: 'WV' },
              //     { name: 'Wisconsin', iso2: 'WI' },
              //     { name: 'Wyoming', iso2: 'WY' }
              // ];

              // var apiKey = 'd0I5NVFjanR2RU82YVk5R1RZUkw4dDEyVjVWYUU3czhFRzE2Ukd5Qw==';
              // var stateCode;
              // var cities = [];
              // var currentIndex = 0;
              // var limit = 100;

              // $('#acff-post-field_66b053617dd4c').select2();
              // $('#acff-post-field_66b4c61214e33').select2({
              //     dropdownParent: $('#acff-post-field_66b4c61214e33').parent(),
              //     ajax: {
              //         delay: 250,
              //         processResults: function(data) {
              //             return {
              //                 results: data.items
              //             };
              //         }
              //     }
              // });

              // // Function to populate state dropdown using the static array
              // function populateStates() {
              //     $.each(usStates, function(index, state) {
              //         var newOption = new Option(state.name, state.iso2, false, false);
              //         $('#acff-post-field_66b053617dd4c').append(newOption);
              //     });
              //     $('#acff-post-field_66b053617dd4c').trigger('change');
              // }

              // // Function to load cities for the selected state
              // function loadCities(stateCode) {
              //     $.ajax({
              //         url: 'https://api.countrystatecity.in/v1/countries/US/states/' + stateCode + '/cities',
              //         method: 'GET',
              //         headers: {
              //             "X-CSCAPI-KEY": apiKey
              //         },
              //         success: function(response) {
              //             cities = response;
              //             var cityData = cities.map(function(city) {
              //                 return {
              //                     id: city.name,
              //                     text: city.name
              //                 };
              //             });

              //             $('#acff-post-field_66b4c61214e33').empty().select2({
              //                 data: cityData
              //             });
              //         },
              //         error: function(jqXHR, textStatus, errorThrown) {
              //             console.error('Failed to load cities:', textStatus, errorThrown);
              //             alert('Failed to load cities. Please try again.');
              //         }
              //     });
              // }

              // // Populate states on page load
              // populateStates();

              // // Event listener for state dropdown change
              // $('#acff-post-field_66b053617dd4c').on('change', function() {
              //     stateCode = $(this).val();
              //     if (stateCode) {
              //         loadCities(stateCode);
              //     } else {
              //         $('#acff-post-field_66b4c61214e33').empty().append('<option value="">Select City</option>');
              //     }
              // });


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

// Function to populate state dropdown using the static array
function populateStates() {
    var $stateSelect = $('#acff-post-field_66b053617dd4c');
    $stateSelect.empty(); // Clear existing options
    $.each(usStates, function(index, state) {
        var newOption = $('<option></option>').val(state.iso2).text(state.name);
        $stateSelect.append(newOption);
    });
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
            var $citySelect = $('#acff-post-field_66b4c61214e33');
            $citySelect.empty(); // Clear existing options
            $citySelect.append($('<option></option>').val('').text('Select City')); // Default option
            $.each(cities, function(index, city) {
                var newOption = $('<option></option>').val(city.name).text(city.name);
                $citySelect.append(newOption);
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
$('#acff-post-field_66b053617dd4c').on('change', function() {
    stateCode = $(this).val();
    if (stateCode) {
        loadCities(stateCode);
    } else {
        $('#acff-post-field_66b4c61214e33').empty().append('<option value="">Select City</option>');
    }
});








    });
  </script>