<?php ob_start(); 


$job_types = get_terms( array(
  'taxonomy' => 'job_listing_type', // Replace 'category' with your taxonomy name
  'hide_empty' => false,
));

$job_catagories = get_terms( array(
  'taxonomy' => 'job_listing_category', // Replace 'category' with your taxonomy name
  'hide_empty' => false,
));

?>

<!-- html code start-->
<input type="hidden" class="site_url" value="<?php echo home_url(); ?>">
<div class="container">
    <div class="step_form-wrapper">
  
        <div class="form_parent-row">
            <h2 class="title">Basic Information</h2>
           <div class="form_child-colmn">
                <div class="row">
                   <div class="col-md-12">
                     <div class="form__group">
                       <label class="field_label">Type of Role</label>

                         <select class="form-field-control">
                          <?php 
                        if ( ! empty( $job_types ) && ! is_wp_error( $job_types ) ) {
                            foreach ( $job_types as $term ) {
                                echo '<option value"'.$term->slug.'">'.$term->name.'</option>';
                            }
                        }
                          ?>
                         
                         </select>
                     </div>
                   </div>
                   <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Title</label>
                      <input type="text" class="form-field-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Description</label>
                      <textarea class="text_field-control"></textarea>
                    </div>
                  </div>

                    <div class="col-md-6">
                     <div class="form__group">
                       <label class="field_label">Industry<span>*</span></label>
                       <select class="form-field-control">
                        <?php if ( ! empty( $job_catagories ) && ! is_wp_error( $job_catagories ) ) {
                            foreach ( $job_catagories as $term ) {
                                echo '<option value"'.$term->slug.'">'.$term->name.'</option>';
                            }
                        }
                          ?>
                         
                       </select>
                     </div>
                   </div>

                   <div class="col-md-6">
                    <div class="form__group">
                      <label class="field_label">Type<span>*</span></label>
                      <select class="form-field-control">
                        <option value="Remote">Remote</option>
                        <option value="In-Person">In-Person</option>
                        <option value="Hybrid">Hybrid</option>
                      </select>
                    </div>
                  </div>

                   <div class="col-md-12">
                       <div class="form__group">
                         <label class="field_label">Location<span>*</span></label>
                          <select id="job_locations_dropdown" class="form-field-control"></select>
                       </div>
                     </div>

                     
                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">Apply Type<span>*</span></label>
                         <select class="form-field-control">
                            <option value="internal">Internal</option>
                            <option value="external" selected="selected">External URL</option>
                            <option value="with_email">By Email</option>
                            <option value="call">Call To Apply</option>
                         </select>
                       </div>
                     </div>

                     <div class="col-md-6">
                       <div class="form__group">
                         <label class="field_label">External Apply Link<span>*</span></label>
                           <input type="text" class="form-field-control">
                       </div>
                     </div>
                     <div class="col-md-12">
                      <div class="form__group-checkbox">
                       <input type="checkbox" id="workstudy"> 
                       <label for="html">Work Study Program</label>
                      </div>
                    </div>
 

                </div>
           </div>
           <div class="stb-4 text-center">
            <button class="btnStepForm">Next</button>
           </div>          
        </div> 

        <div class="form_parent-row">
            <h2 class="title">Time Requirement</h2>
           <div class="form_child-colmn">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Type<span>*</span></label>
                      <select class="form-field-control">
                       <option>Part Time</option>
                      </select>
                    </div>
                  </div>

                    <div class="col-md-12">
                     <div class="form__group">
                       <label class="field_label">Type<span>*</span></label>
                       <div class="radio_btn-groups">

                        <div class="radio__btn"> 
                          <input type="radio" id="Permanent" name="radio-group" checked>
                          <label for="Permanent">Permanent</label>
                        </div>

                        <div class="radio__btn"> 
                          <input type="radio" id="Temporary" name="radio-group" checked>
                          <label for="Temporary">Temporary</label>
                        </div>
                        <div class="radio__btn"> 
                          <input type="radio" id="Seasonal" name="radio-group" checked>
                          <label for="Seasonal">Seasonal</label>
                        </div>
                        
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
                                <input type="number" class="form-field-control" placeholder="25">
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
                                <input type="number" class="form-field-control" placeholder="25">
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
            <button class="btnStepForm">Next</button>
           </div>          
        </div> 

        <div class="form_parent-row">
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
                                            <select class="form-field-control">
                                                <option>Fixed</option>
                                            </select>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control">
                                                <option>Yearly</option>
                                            </select>
                                    </div>
                                    </div>
                                    <div class="col-md-1">  </div>
                                    <div class="col-md-5">
                                    <div class="field_wrap">
                                        <input type="text" class="form-field-control" placeholder="" value="$120,000">
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row_space">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control">
                                                <option>Range</option>
                                            </select>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                            <select class="form-field-control">
                                                <option>Hourly</option>
                                            </select>
                                    </div>
                                    </div>
                                    <div class="col-md-1">  </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                             <div class="col-md-5">
                                                <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="" value="$60">
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                             <div class="text-center field_devider-2">To</div>
                                             </div>
                                             <div class="col-md-5">
                                             <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="" value="$65">
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
                                            <select class="form-field-control">
                                                <option>Performance</option>
                                            </select>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="field_wrap">
                                        <input type="text" class="form-field-control" placeholder="Base Pay" >
                                    </div>
                                    </div>
                                    <div class="col-md-1"> <div class="text-center field_devider-2">+</div>  </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                             <div class="col-md-5">
                                                <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="" value="$60">
                                                </div>
                                             </div>
                                             <div class="col-md-2">
                                             <div class="text-center field_devider-2">Per</div>
                                             </div>
                                             <div class="col-md-5">
                                             <div class="field_wrap">
                                                 <input type="text" class="form-field-control" placeholder="Lead, Sale" >
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
                    <select id="mySelect" multiple="multiple" style="width: 100%">
                        <option value="AL">Signing Bonus</option>
                        <option value="WY">Commission</option>
                        <option value="CA">Equity Package</option>
                        <option value="TX">Medical</option>
                        <option value="NY">Bonus</option>
                  </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Perks<span>*</span></label>
                    <select id="mySelect-2" multiple="multiple" style="width: 100%">
                        <option value="AL">Learning Stipend</option>
                        <option value="WY">Home Office Stipend</option>
                        <option value="CA">Career Development</option>
                        <option value="TX">Gym Membership</option>
                        
                  </select>
                  </div>
                </div>

               

                
              </div>
         </div>
         <div class="stb-4 text-center">
          <button class="btnStepForm">Next</button>
         </div>          
      </div> 


      <div class="form_parent-row">
          <h2 class="title">Skills & Qualification</h2>
         <div class="form_child-colmn">
              <div class="row">
              <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Skills<span>*</span></label>
                    <select id="skills_post_internship" multiple="multiple" style="width: 100%"></select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">University/College<span>*</span></label>
                    <select id="university_pi" multiple="multiple" style="width: 100%"></select>
                  </div>
                </div>
              <div class="col-md-6">
                    <div class="form__group">
                      <label class="field_label">School Year<span>*</span></label>
                        <select class="form-field-control">
                         <option>Bachelors</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form__group">
                      <label class="field_label">GPA</label>
                      <input type="number" class="form-field-control" placeholder="">
                    </div>
                  </div>

                  <div class="col-md-12">
                  <div class="form__group">
                    <label class="field_label">Majors<span>*</span></label>
                    <select id="mySelect-5" multiple="multiple" style="width: 100%">
                        <option value="AL">Masters of Business Administration</option>
                        <option value="WY">Electrical Engineering Technologies & Technicians</option>
                        <option value="CA">Environmental Control and Systems Technologies & Technicians</option>
                        <option value="TX">Industrial Production Technologies & Technicians</option>
                        
                  </select>
                  </div>
                </div>

                <div class="col-md-12">
                    <div class="form__group">
                      <label class="field_label">Date of Graduation<span>*</span></label>
                      <div class="row">
                         <div class="col-md-4">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control">
                                  <option>October</option>
                               </select>
                            </div>                 
                          </div>
                         </div>
                         <div class="col-md-4">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control">
                                  <option>2026</option>
                               </select>
                            </div>                 
                          </div>
                         </div>
                        
                      </div>
                    </div>
                  </div>


               

               

                
              </div>
         </div>
         <div class="stb-4 text-center">
          <button class="btnStepForm">Next</button>
         </div>          
      </div> 

      <div class="form_parent-row">
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
                            <input type="text" class="form-field-control" placeholder="5" >
                            </div>                 
                          </div>
                         </div>
                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control">
                                  <option>December</option>
                               </select>
                            </div>                 
                          </div>
                         </div>

                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control">
                                  <option>2024</option>
                               </select>
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
                            <input type="text" class="form-field-control" placeholder="5" >
                            </div>                 
                          </div>
                         </div>
                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control">
                                  <option>December</option>
                               </select>
                            </div>                 
                          </div>
                         </div>

                         <div class="col-md-3">
                          <div class="form__group">        
                            <div class="field_wrap">
                                <select class="form-field-control">
                                  <option>2024</option>
                               </select>
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
                            <input type="text" class="form-field-control" placeholder="5" >
                            </div>                 
                          </div>
                         </div>
                       

                        
                      </div>
                    </div>
                  </div>
           
               

               

                
              </div>
         </div>
         <div class="stb-4 text-center">
          <button class="btnStepForm">Next</button>
         </div>          
      </div> 

      <div class="form_parent-row">
          <h2 class="title">Select Plan</h2>
         <div class="form_child-colmn">
           
         </div>
               
      </div> 



<!-- html code end-->







<?php echo "<div class='post_internships'>".ob_get_clean()."</div>";?>