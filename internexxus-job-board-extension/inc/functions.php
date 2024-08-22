<?php 



add_action('wp_ajax_upload_file_from_url', 'handle_upload_file_from_url');
add_action('wp_ajax_nopriv_upload_file_from_url', 'handle_upload_file_from_url');

function handle_upload_file_from_url() {
  if (!isset($_POST['url'])) {
      wp_send_json_error('No URL provided');
  }

  $url = esc_url_raw($_POST['url']);
  $attachment_id = upload_file_from_url($url);


  $current_user_id = get_current_user_id();


  $postId = get_user_meta($current_user_id, 'candidate_id', true);

  update_post_meta($postId, '_candidate_cv_attachment', $attachment_id);

  if (is_wp_error($attachment_id)) {
      wp_send_json_error($attachment_id->get_error_message());
  } else {
      wp_send_json_success(array(
          'attachment_id' => $attachment_id,
          'url' => wp_get_attachment_url($attachment_id)
      ));
  }
}

add_action('wp_ajax_job_posting_form_submission', 'job_posting_form_submission_cb');
add_action('wp_ajax_nopriv_job_posting_form_submission', 'job_posting_form_submission_cb');

function job_posting_form_submission_cb(){

// Basic Information
$type_of_job_role = $_POST['type_of_job_role'];
$job_title = $_POST['job_title'];
$job_description = $_POST['job_description'];
$job_industry = $_POST['job_industry'];
$job_type = $_POST['job_type'];
$job_location = $_POST['job_location'];
$job_application_type = $_POST['job_application_type'];
$job_work_study = $_POST['job_work_study'];

$userId = get_current_user_id();


// print_r($job_location);

// echo $type_of_job_role;

// exit;

// Create a new post
$new_post = array(
    'post_title'    => $job_title,
    'post_content'  => $job_description,
    'post_status'   => 'pending',
    'post_author'   => $userId,
    'post_type'     => 'job_listing',
  );
  
  // Insert the post into the database
  $post_id = wp_insert_post($new_post);
  

    $term_ids = array($type_of_job_role); 
    $taxonomy = 'job_listing_type'; 
    wp_set_post_terms($post_id, $term_ids, $taxonomy);

    $term_ids = array($job_industry); 
    $taxonomy = 'job_listing_category'; 
    wp_set_post_terms($post_id, $term_ids, $taxonomy);


    update_post_meta($post_id, '_job_apply_type', $job_type);
    update_post_meta($post_id, 'work_study_program', $job_type);

    // Time Requirement
    $type_time_requirement = $_POST['type_time_requirement'];
    $type_period_requirement = $_POST['type_period_requirement'];
    $time_requirement_min = $_POST['time_requirement_min'];
    $time_requirement_max = $_POST['time_requirement_max'];

    update_post_meta($post_id, '_type_1_jobs', $type_time_requirement);
    update_post_meta($post_id, '_type_2_jobs', $type_period_requirement);
    update_post_meta($post_id, '_min_hour_jobs', $time_requirement_min);
    update_post_meta($post_id, '_max_hour_jobs', $time_requirement_max);


    //Compensation & Benefits

    $compensation_type_one = $_POST['compensation_type_one'];
    $compensation_time_one = $_POST['compensation_time_one'];
    $compensation_amount_one = $_POST['compensation_amount_one'];
    $compensation_type_two = $_POST['compensation_type_two'];
    $compensation_time_two = $_POST['compensation_time_two'];
    $compensation_amount_two = $_POST['compensation_amount_two'];
    $compensation_amount_three = $_POST['compensation_amount_three'];
    $compensation_type_three = $_POST['compensation_type_three'];
    $compensation_amount_four = $_POST['compensation_amount_four'];
    $compensation_amount_five = $_POST['compensation_amount_five'];
    $compensation_amount_six = $_POST['compensation_amount_six'];
    $job_additional_benefits = $_POST['job_additional_benefits'];
    $jobs_perks = $_POST['jobs_perks'];



    update_post_meta($post_id, 'c1_type_jp',    $compensation_type_one);
    update_post_meta($post_id, 'c1_duration_jp', $compensation_time_one);
    update_post_meta($post_id, 'c1_ammount_job', $compensation_amount_one);
    update_post_meta($post_id, 'c2_type_job',     $compensation_type_two);
    update_post_meta($post_id, 'c2_duration_jp', $compensation_time_two);
    update_post_meta($post_id, 'c2_ammount_jp_1', $compensation_amount_two);
    update_post_meta($post_id, 'c2_ammount_jp_2', $compensation_amount_three);
    update_post_meta($post_id, 'c3_type_job',     $compensation_type_three);
    update_post_meta($post_id, 'c3_ammount_jp_1', $compensation_amount_four);
    update_post_meta($post_id, 'c3_ammount_jp_2', $compensation_amount_five);
    update_post_meta($post_id, 'c3_ammount_jp_3', $compensation_amount_six);


    update_post_meta($post_id, 'additional_benefits_jp', $job_additional_benefits);
    update_post_meta($post_id, 'perks_jp', $jobs_perks);

        $term_ids = $job_additional_benefits; 
        $taxonomy = 'job_Job Benifits'; 
        wp_set_post_terms($post_id, $term_ids, $taxonomy);

        $term_ids = $jobs_perks; 
        $taxonomy = 'job_Perks'; 
        wp_set_post_terms($post_id, $term_ids, $taxonomy);


        //Skills & Qualification

        $skills_post_internship = $_POST['skills_post_internship'];
        $university_post_internship = $_POST['university_post_internship'];
        $school_year_job = $_POST['school_year_job'];
        $gpa_job = $_POST['gpa_job'];
        $job_majors = $_POST['job_majors'];
        $job_minors = $_POST['job_minors'];
        $graduation_month = $_POST['graduation_month'];
        $graduation_year = $_POST['graduation_year'];


        update_post_meta($post_id, '_universtity_selcted_jobs', $university_post_internship);
        update_post_meta($post_id, '_jobs_selcted_skills', $skills_post_internship);
        update_post_meta($post_id, '_school_year_jobs', $school_year_job);
        update_post_meta($post_id, '_gpa_jobs', $gpa_job);
        update_post_meta($post_id, '_majors_jobs', $job_majors);
        update_post_meta($post_id, '_minors_jobs', $job_minors);


        $graduation_month = date('m', strtotime($graduation_month));

        // Format the date as YYYYMMDD
        $graduationDate = sprintf('%04d%02d%02d', $graduation_year, $graduation_month, "01");

        update_post_meta($post_id, '_date_of_graduation_month_jobs', $graduationDate);


        // echo $graduation_month;
        // echo $graduation_year;
        // echo $start_month_number;

        //   exit;
        $term_ids = $skills_post_internship; 
        $taxonomy = 'job_skills'; 
        wp_set_post_terms($post_id, $term_ids, $taxonomy);

        $term_ids = $jobs_perks; 
        $taxonomy = 'job_Perks'; 
        wp_set_post_terms($post_id, $term_ids, $taxonomy);


        $term_ids = $jobs_perks; 
        $taxonomy = 'job_Perks'; 
        wp_set_post_terms($post_id, $term_ids, $taxonomy);


        //Application Process

        $job_application_start_day = $_POST['job_application_start_day'];
        $job_application_start_month = $_POST['job_application_start_month'];
        $job_application_start_year = $_POST['job_application_start_year'];
        $job_application_end_day = $_POST['job_application_end_day'];
        $job_application_end_month = $_POST['job_application_end_month'];
        $job_application_end_year = $_POST['job_application_end_year'];
        $job_application_hold_position = $_POST['job_application_hold_position'];

        $job_application_start_day = $_POST['job_application_start_day'];


        // Convert month name to a numeric value
        $start_month_number = date('m', strtotime($job_application_start_month));

        // Format the date as YYYYMMDD
        $job_start_date = sprintf('%04d%02d%02d', $job_application_start_year, $start_month_number, $job_application_start_day);

        update_post_meta($post_id, '_job_start_date', $job_start_date);


        $end_month_number = date('m', strtotime($job_application_end_month));

        // Format the date as YYYYMMDD
        $job_expiry_date = sprintf('%04d%02d%02d', $job_application_end_year, $end_month_number, $job_application_end_day);

        update_post_meta($post_id, '_job_expiry_date', $job_expiry_date);

        update_post_meta($post_id, '_number_of_position_jobs', $job_application_hold_position);

        // Output a confirmation message (or redirect, etc.)
        echo "Job posting for $job_title has been submitted successfully!";
}