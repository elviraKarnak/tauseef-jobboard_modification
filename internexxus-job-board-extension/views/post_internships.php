<?php ob_start(); 


$job_types = get_terms( array(
  'taxonomy' => 'job_listing_type', // Replace 'category' with your taxonomy name
  'hide_empty' => false,
));

$job_catagories = get_terms( array(
  'taxonomy' => 'job_listing_category', // Replace 'category' with your taxonomy name
  'hide_empty' => false,
));

$months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

?>

<!-- html code start-->
<input type="hidden" class="site_url" value="<?php echo home_url(); ?>">

<div class="container">

    <div class="step_form-wrapper">
      <form id="post_interneship_from" >
        <input type="hidden" name="action" value="job_posting_form_submission">
        <!-- step 1 -->
        <div id="step1" class="step form_parent-row" >
          <h2 class="title">Basic Information</h2>
           <div class="form_child-colmn">
                <div class="row">
                   <div class="col-md-12">
                     <div class="form__group">
                       <label class="field_label">Type of Role</label>
                         <select class="form-field-control" name="type_of_job_role" required>
                            <?php 
                              if (!empty( $job_types ) && ! is_wp_error( $job_types ) ) {
                                  foreach ( $job_types as $term ) {
                                    echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
                                  }
                                }
                            ?>
                         </select>
                         <span class="error-message"></span>
                     </div>
                   </div>
                   <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Title<span>*</span></label>
                      <input type="text" class="form-field-control" name="job_title" required>
                      <span class="error-message"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Description<span>*</span></label>
                      <textarea class="text_field-control" name="job_description" required></textarea>
                      <span class="error-message"></span>
                    </div>
                  </div>

                    <div class="col-md-6">
                     <div class="form__group">
                       <label class="field_label">Industry<span>*</span></label>
                       <select class="form-field-control" name="job_industry" required>
                        <?php if ( ! empty( $job_catagories ) && ! is_wp_error( $job_catagories ) ) {
                            foreach ( $job_catagories as $term ) {
                                echo '<option value"'.$term->term_id.'">'.$term->name.'</option>';
                            }
                        }
                          ?>
                         
                       </select>
                       <span class="error-message"></span>
                     </div>
                   </div>

                   <div class="col-md-6">
                    <div class="form__group">
                      <label class="field_label">Type<span>*</span></label>
                      <select class="form-field-control" name="job_type" required>
                        <option value="Remote">Remote</option>
                        <option value="In-Person">In-Person</option>
                        <option value="Hybrid">Hybrid</option>
                      </select>
                      <span class="error-message"></span>
                    </div>
                  </div>

                   <div class="col-md-12">
                       <div class="form__group">
                         <label class="field_label">Location<span>*</span></label>
                          <select id="job_locations_dropdown" multiple="multiple" class="form-field-control" name="job_location[]" required></select>
                          <span class="error-message"></span>
                        </div>
                     </div>

                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Apply Type<span>*</span></label>
                         <select class="form-field-control" name="job_application_type" required>
                            <option value="internal">Internal</option>
                            <option value="external" selected="selected">External URL</option>
                            <option value="with_email">By Email</option>
                            <option value="call">Call To Apply</option>
                         </select>
                         <span class="error-message"></span>
                       </div>
                     </div>

                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">External Apply Link<span>*</span></label>
                           <input type="text" class="form-field-control" name="job_application_type">
                           <span class="error-message"></span>
                       </div>
                     </div>
                     <div class="col-md-12">
                      <div class="form__group-checkbox">
                       <input type="checkbox" id="workstudy" name="job_work_study"> 
                       <label for="html">Work Study Program</label>
                       <span class="error-message"></span>
                      </div>
                    </div>
 

                </div>
           </div>
           <div class="stb-4 text-center">
            <button type="button" class="next-button btnStepForm" data-next="step2">Next</button>
           </div>          
        </div> 

        <!-- step 2 -->

        <div id="step2" class="step form_parent-row">
            <h2 class="title">Time Requirement</h2>
           <div class="form_child-colmn">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Type<span>*</span></label>
                      <select class="form-field-control" name="type_time_requirement" required>
                       <option>Full Time</option>
                       <option>Part Time</option>
                      </select>
                      <span class="error-message"></span>
                    </div>
                  </div>

                    <div class="col-md-12">
                     <div class="form__group">
                       <label class="field_label">Type<span>*</span></label>
                       <div class="radio_btn-groups">

                        <div class="radio__btn"> 
                          <input type="radio" value="Permanent" id="Permanent" name="type_period_requirement" checked required>
                          <label for="Permanent">Permanent</label>
                        </div>

                        <div class="radio__btn"> 
                          <input type="radio" value="Temporary" id="Temporary" name="type_period_requirement" required>
                          <label for="Temporary">Temporary</label>
                        </div>
                        <div class="radio__btn"> 
                          <input type="radio" value="Seasonal" id="Seasonal" name="type_period_requirement" required>
                          <label for="Seasonal">Seasonal</label>
                        </div>
                        <span class="error-message"></span>
                       </div>
                       
                     </div>
                   </div>

                   <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Hours<span>*</span></label>
                      <div class="row align-items-center">
                         <div class="col-md-5">
                          <div class="form__group">        
                            <div class="minMax-group">
                              <div class="text">
                                Min
                              </div>
                               <div class="field_wrap">
                                <input type="number" class="form-field-control" name="time_requirement_min" placeholder="25" required>
                                <span class="error-message"></span>
                               </div>
                            </div>                 
                           
                          </div>
                         </div>
                         <div class="col-md-2">
                          <div class="text-center mt-4 field_devider">To</div>
                         </div>
                         <div class="col-md-5">
                          <div class="form__group">        
                            <div class="minMax-group">
                              <div class="text">
                                Max
                              </div>
                               <div class="field_wrap">
                                  <input type="number" class="form-field-control" name="time_requirement_max" placeholder="25" required />
                                  <span class="error-message"></span>
                                </div>
                          </div>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
                      </div>
                      </div>
           <div class="stb-4 text-center">
            <button type="button" class="next-button btnStepForm" data-next="step3">Next</button>
           </div>          
        </div> 
                      
          <!-- step 3 -->
        <div id="step3" class="step form_parent-row">
          <h2 class="title">Compensation & Benefits</h2>
         <div class="form_child-colmn">
              <div class="row">
                <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Compensation<span>*</span></label>
                        <div class="row_space">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control" name="compensation_type_one" required>
                                                <option>Fixed</option>
                                            </select>
                                            <span class="error-message"></span>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control" name="compensation_time_one" required>
                                                <option>Yearly</option>
                                            </select>
                                            <span class="error-message"></span>
                                    </div>
                                    </div>
                                    <div class="col-md-1">  </div>
                                    <div class="col-md-5">
                                    <div class="field_wrap">
                                        <input type="text" class="form-field-control" placeholder="$120,000" name="compensation_amount_one" required>
                                        <span class="error-message"></span>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row_space">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control" name="compensation_type_two" required>
                                                <option>Range</option>
                                            </select>
                                            <span class="error-message"></span>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control" name="compensation_time_one" required>
                                                <option>Hourly</option>
                                            </select>
                                            <span class="error-message"></span>
                                    </div>
                                    </div>
                                    <div class="col-md-1">  </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                             <div class="col-md-5">
                                                <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="$60" name="compensation_amount_two" required>
                                                 <span class="error-message"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                             <div class="text-center field_devider-2">To</div>
                                             </div>
                                             <div class="col-md-5">
                                             <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="" value="$65" name="compensation_amount_three" required>
                                                 <span class="error-message"></span>
                                                </div>
                                             </div>
                                        </div>
                                   
                                    </div>
                                </div>
                        </div>
                        <div class="row_space">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control" name="compensation_type_three" require>
                                                <option>Performance</option>
                                            </select>
                                            <span class="error-message"></span>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                        <input type="text" class="form-field-control" placeholder="Base Pay" name="compensation_amount_four" required>
                                        <span class="error-message"></span>
                                    </div>
                                    </div>
                                    <div class="col-md-1"> <div class="text-center field_devider-2">+</div>  </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                             <div class="col-md-5">
                                                <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="" value="$60" name="compensation_amount_five" required>
                                                 <span class="error-message"></span>
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                             <div class="text-center field_devider-2">Per</div>
                                             </div>
                                             <div class="col-md-5">
                                             <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="Lead, Sale" name="compensation_amount_six" required>
                                                 <span class="error-message"></span>
                                                </div>
                                             </div>
                                        </div>
                                   
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Additional Benefits<span>*</span></label>
                    <select id="job_additional_benefits" multiple="multiple" style="width: 100%" name="job_additional_benefits" required></select>
                    <span class="error-message"></span>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Perks<span>*</span></label>
                    <select id="jobs_perks" multiple="multiple" style="width: 100%" name="jobs_perks" required></select>
                    <span class="error-message"></span>
                  </div>
                </div>

               

                
              </div>
         </div>
         <div class="stb-4 text-center">
          <button type="button" class="next-button btnStepForm" data-next="step4">Next</button>
         </div>          
      </div> 

       <!-- step4   -->

      <div id="step4" class="step form_parent-row" >
          <h2 class="title">Skills & Qualification</h2>
         <div class="form_child-colmn">
              <div class="row">
              <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Skills<span>*</span></label>
                    <select id="skills_post_internship" multiple="multiple" style="width: 100%" name="skills_post_internship" required></select>
                    <span class="error-message"></span>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">University/College<span>*</span></label>
                    <select id="university_pi" multiple="multiple" style="width: 100%" name="university_post_internship" required></select>
                    <span class="error-message"></span>
                  </div>
                </div>
              <div class="col-md-6">
                    <div class="form__group">
                      <label class="field_label">School Year<span>*</span></label>
                        <select class="form-field-control" name="school_year_job" required>
                          <option value="Freshman">Freshman</option>
                          <option value="Sophomore">Sophomore</option>
                          <option value="Junior">Junior</option>
                          <option value="Senior">Senior</option>
                          <option value="Masters">Masters</option>
                          <option value="MBA">Masters of Business Administration</option>
                          <option value="Doctorate">Doctorate</option>
                          <option value="Postdoc">Postdoctoral Studies</option>
                          <option value="Certificate">Certificate Program</option>
                          <option value="FirstYearCTC">First Year Community / Technical College</option>
                          <option value="SecondYearCTC">Second Year Community / Technical College</option>
                          <option value="Alumni">Alumni</option>
                        </select>
                        <span class="error-message"></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form__group">
                      <label class="field_label">GPA</label>
                      <input type="number" class="form-field-control" placeholder="" name="gpa_job" required>
                      <span class="error-message"></span>
                    </div>
                  </div>

                  <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Majors<span>*</span></label>
                    <select id="job_majors" multiple="multiple" style="width: 100%" name="job_majors" required>
                      
                    </select>
                    <span class="error-message"></span>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Minors<span>*</span></label>
                    <select id="job_minors" multiple="multiple" style="width: 100%" name="job_minors" required>
                    </select>
                    <span class="error-message"></span>
                  </div>
                </div>

                <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Date of Graduation<span>*</span></label>
                      <div class="row">
                         <div class="col-md-4">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control" name="graduation_month" required>
                                  <?php foreach($months as $month){
                                    echo "<option value='".$month."'>".$month."</option>";
                                  } ?>
                               </select>
                               <span class="error-message"></span>
                            </div>                 
                          </div>
                         </div>
                         <div class="col-md-4">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control year_select2" name="graduation_year" required>
                                  <option><?php echo Date('Y');?></option>
                               </select>
                               <span class="error-message"></span>
                            </div>                 
                          </div>
                         </div>
                        
                      </div>
                    </div>
                  </div>
              </div>
         </div>
         <div class="stb-4 text-center">
          <button type="button" class="next-button btnStepForm" data-next="step5">Next</button>
         </div>          
      </div> 

        <!-- step 5   -->

      <div id="step5" class="step form_parent-row">
          <h2 class="title">Application Process</h2>
         <div class="form_child-colmn">
              <div class="row">         


                <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Application Start Date<span>*</span></label>
                      <div class="row">
                         <div class="col-md-2">
                          <div class="form__group">        
                            <div class="field_wrap">
                            <input type="text" class="form-field-control" placeholder="00" name="job_application_start_day" required>
                            </div>                 
                          </div>
                         </div>
                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                              <select class="form-field-control" name="job_application_start_month" required>
                                    <?php foreach($months as $month){
                                      echo "<option value='".$month."'>".$month."</option>";
                                    } ?>
                                </select>
                                <span class="error-message"></span>
                            </div>                 
                          </div>
                         </div>

                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control year_select2" name="job_application_start_year" required>
                                  <option><?php echo Date('Y');?></option>
                               </select>
                               <span class="error-message"></span>
                            </div>                 
                          </div>
                         </div>
                        
                      </div>
                    </div>
                  </div>



                  <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Application End Date<span>*</span></label>
                      <div class="row">
                         <div class="col-md-2">
                          <div class="form__group">        
                            <div class="field_wrap">
                            <input type="text" class="form-field-control" placeholder="5" name="job_application_end_day" required>
                            </div>                 
                          </div>
                         </div>
                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control" name="job_application_end_month" required>
                                  <?php foreach($months as $month){
                                    echo "<option value='".$month."'>".$month."</option>";
                                  } ?>
                               </select>
                               <span class="error-message"></span>
                            </div>                 
                          </div>
                         </div>

                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control year_select2" name="job_application_end_year" required>
                                  <option><?php echo Date('Y');?></option>
                                </select>
                                <span class="error-message"></span>
                            </div>                 
                          </div>
                         </div>
                        
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">No. of Positions<span>*</span></label>
                      <div class="row">
                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                            <input type="text" class="form-field-control" placeholder="5"  name="job_application_hold_position" required>
                            <span class="error-message"></span>  
                          </div>                 
                          </div>
                         </div>
                      </div>
                    </div>
                   </div>
              </div>
         </div>
         <div class="stb-4 text-center">
            <button type="button" class="next-button btnStepForm" data-next="step6">Next</button>
         </div>  
      </div> 

      <div id="step6" class=" form_parent-row">
    <?php 
      $prefix = WP_JOB_BOARD_PRO_WC_PAID_LISTINGS_PREFIX;

     echo $prefix;
      ?>

          <h2 class="title">Select Plan</h2>
         <div class="form_child-colmn">
              <div class="row"> 
                    <?php 
                  $args = array(
                  'post_type'      => 'product',
                  'posts_per_page' => 10, 
                  'meta_key'       => '_price',
                  'orderby'        => 'meta_value_num',
                  'meta_type'      => 'NUMBER',
                  'order'          => 'ASC',
                  'tax_query'      => array(
                      array(
                          'taxonomy' => 'product_type',
                          'field'    => 'slug',
                          'terms'    => 'job_package', // Replace 'simple' with the desired product type (e.g., 'variable', 'grouped')
                      ),
                  ),
              );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $product_id = get_the_ID();
                $product = wc_get_product($product_id);
                $price = $product->get_price(); // Get the price
                $currency_symbol = get_woocommerce_currency_symbol();
                ?>
                <div class="col-md-6">
                <div class="card" >
                  <div class="card-body">
                    <h3 class="card-title"><?php the_title(); ?> - <?php echo $currency_symbol.$price; ?> /Month</h3>
                    <div class="product_description">
                      <?php  the_content(); ?>
                    </div>
                     <label for="<?php echo $product_id; ?>">Select</label>
                     <input type="radio" id="<?php echo $product_id; ?>" name="job_posting_plan_id" value="<?php echo $product_id; ?>">
                  </div>
                </div>
                </div>
           <?php }
            wp_reset_postdata();
        } else {
            echo 'No Package found';
        }

?>
</div>
        </div> 

        <div class="stb-4 text-center">
            <button type="button" id="submitButton" class="btnStepForm">Next</button>
         </div>  

      </form>
<!-- html code end-->

<script>
jQuery(document).ready(function($){

  function validateStep(stepId) {
        let isValid = true;
        $(`#${stepId} input[required], #${stepId} select[required], #${stepId} textarea[required]`).each(function() {
            let value = $(this).val();
            let errorMessage = $(this).parent().find('.error-message');

            if ($(this).hasClass('select2-hidden-accessible')) {
                // Special handling for Select2 elements

                var select2_selector = $(this).parent().find('textarea');

                if (select2_selector.val() === null || select2_selector.val() === '') {
                  if ($(this).val() === null || $(this).val().length === 0) {
                    isValid = false;
                    errorMessage.text('This field is required').css('color', 'red');
                  } else {
                      errorMessage.text('');
                  }
                }
            } else if ($(this).is(':checkbox, :radio')) {
                // Special handling for checkboxes and radio buttons
                if (!$(`input[name="${$(this).attr('name')}"]:checked`).length) {
                    isValid = false;
                    errorMessage.text('This field is required').css('color', 'red');
                } else {
                    errorMessage.text('');
                }
            } else if (value === '') {
                isValid = false;
                errorMessage.text('This field is required').css('color', 'red');
            } else {
                errorMessage.text('');
            }
        });

        return isValid;
    }

    function showStep(stepId) {
        $('.step').hide();
        $(`#${stepId}`).show();
        console.log(stepId);
    }

    showStep('step1');

    $('.next-button').click(function() {
        let currentStep = $(this).closest('.step').attr('id');
        let nextStep = $(this).data('next');

        if (validateStep(currentStep)) {
            showStep(nextStep);
        }
    });

  

   

  var siteUrl = '<?php echo home_url(); ?>'

  $("#post_interneship_from").on('submit', function(e){

    e.preventDefault(); // Prevent form submission


    console.log();

    if (validateStep('step6')) {

      let formData = {};
        $(this).find(":input[name]").each(function() {
            formData[this.name] = $(this).val();
        });

        console.log(formData);

        // $.ajax({
        //     url: siteUrl+'/wp-admin/admin-ajax.php',
        //     type: 'POST',
        //     data: formData,
        //     success: function(response) {
        //         console.log("Form submitted successfully:", response);
        //         // Add any additional action after successful submission
        //     },
        //     error: function(error) {
        //         console.error("Error submitting form:", error);
        //     }
        // });

        alert('Form submitted successfully.');

      }

     
  });



})


</script>




<?php echo "<div class='post_internships'>".ob_get_clean()."</div>";?>