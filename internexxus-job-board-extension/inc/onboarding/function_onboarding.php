<?php 

add_action( 'init', 'create_jobskill_taxonomy');

function create_jobskill_taxonomy() {
   
   $labels = array(
     'name' => _x( 'Skills', 'job_board_internexxus' ),
     'singular_name' => _x( 'Skill', 'job_board_internexxus' ),
     'search_items' =>  __( 'Search  Skills' ),
     'all_items' => __( 'All  Skills' ),
     'parent_item' => __( 'Parent Skill' ),
     'parent_item_colon' => __( 'Parent Skill:' ),
     'edit_item' => __( 'Edit Skill' ), 
     'update_item' => __( 'Update Skill' ),
     'add_new_item' => __( 'Add New Skill' ),
     'new_item_name' => __( 'New Skill Name' ),
     'menu_name' => __( ' Skills' ),
   );    
  
  // Now register the taxonomy
    register_taxonomy('job_skills',array('job_listing','candidate'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'show_in_menu' => true,
      'query_var' => true,
      // 'rewrite' => array( 'slug' => 'bookingtype' ),
    ));
    
  }

  add_action( 'init', 'create_user_ethnicities_taxonomy');

function create_user_ethnicities_taxonomy() {
   
   $labels = array(
     'name' => _x( 'Ethnicities', 'job_board_internexxus' ),
     'singular_name' => _x( 'Ethnicity', 'job_board_internexxus' ),
     'search_items' =>  __( 'Search  Ethnicities' ),
     'all_items' => __( 'All  Ethnicities' ),
     'parent_item' => __( 'Parent Ethnicity' ),
     'parent_item_colon' => __( 'Parent Ethnicity:' ),
     'edit_item' => __( 'Edit Ethnicity' ), 
     'update_item' => __( 'Update Ethnicity' ),
     'add_new_item' => __( 'Add New Ethnicity' ),
     'new_item_name' => __( 'New Ethnicity Name' ),
     'menu_name' => __( ' Ethnicities' ),
   );    
  
  // Now register the taxonomy
    register_taxonomy('user_ethnicities',array('job_listing','candidate'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'show_in_menu' => true,
      'query_var' => true,
      // 'rewrite' => array( 'slug' => 'bookingtype' ),
    ));
    
  }

  add_action( 'init', 'create_listing_company_taxonomy');

function create_listing_company_taxonomy() {
   
   $labels = array(
     'name' => _x( 'Companies', 'job_board_internexxus' ),
     'singular_name' => _x( 'Company', 'job_board_internexxus' ),
     'search_items' =>  __( 'Search  Companies' ),
     'all_items' => __( 'All  Companies' ),
     'parent_item' => __( 'Parent Company' ),
     'parent_item_colon' => __( 'Parent Company:' ),
     'edit_item' => __( 'Edit Company' ), 
     'update_item' => __( 'Update Company' ),
     'add_new_item' => __( 'Add New Company' ),
     'new_item_name' => __( 'New Company Name' ),
     'menu_name' => __( ' Companies' ),
   );    
  
  // Now register the taxonomy
    register_taxonomy('company_listing',array('job_listing','candidate'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'show_in_menu' => true,
      'query_var' => true,
      // 'rewrite' => array( 'slug' => 'bookingtype' ),
    ));
    
  }

  add_action( 'init', 'create_major_minor_taxonomy');

  function create_major_minor_taxonomy() {
   
    $labels = array(
      'name' => _x( 'Major & Minors', 'job_board_internexxus' ),
      'singular_name' => _x( 'Major & Minors', 'job_board_internexxus' ),
      'search_items' =>  __( 'Search  Major & Minors' ),
      'all_items' => __( 'All  Major & Minors' ),
      'parent_item' => __( 'Parent Major & Minors' ),
      'parent_item_colon' => __( 'Parent Major & Minors:' ),
      'edit_item' => __( 'Edit Major & Minors' ), 
      'update_item' => __( 'Update Major & Minors' ),
      'add_new_item' => __( 'Add New Major & Minors' ),
      'new_item_name' => __( 'New Major & Minors Name' ),
      'menu_name' => __( 'Major & Minors' ),
    );    
  
  // Now register the taxonomy
    register_taxonomy('job_major_minors',array('job_listing','candidate'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'show_in_menu' => true,
      'query_var' => true,
      // 'rewrite' => array( 'slug' => 'bookingtype' ),
    ));

  }

  add_action( 'init', 'create_university_taxonomy');

  function create_university_taxonomy() {

  $labels = array(
    'name' => _x( 'Universities', 'job_board_internexxus' ),
    'singular_name' => _x( 'University', 'job_board_internexxus' ),
    'search_items' =>  __( 'Search  Universities' ),
    'all_items' => __( 'All  Universities' ),
    'parent_item' => __( 'Parent University' ),
    'parent_item_colon' => __( 'Parent University:' ),
    'edit_item' => __( 'Edit University' ), 
    'update_item' => __( 'Update University' ),
    'add_new_item' => __( 'Add New University' ),
    'new_item_name' => __( 'New University Name' ),
    'menu_name' => __( 'Universities' ),
  );    

// Now register the taxonomy
  register_taxonomy('university_name',array('job_listing','candidate','university'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'show_in_menu' => true,
    'query_var' => true,
    // 'rewrite' => array( 'slug' => 'bookingtype' ),
  ));

}

    add_action( 'init', 'create_jobsbenifits_taxonomy');

    function create_jobsbenifits_taxonomy() {

    $labels = array(
      'name' => _x( 'Job Benifits', 'job_board_internexxus' ),
      'singular_name' => _x( 'Job Benifit', 'job_board_internexxus' ),
      'search_items' =>  __( 'Search  Job Benifits' ),
      'all_items' => __( 'All  Job Benifits' ),
      'parent_item' => __( 'Parent Job Benifit' ),
      'parent_item_colon' => __( 'Parent Job Benifit:' ),
      'edit_item' => __( 'Edit Job Benifit' ), 
      'update_item' => __( 'Update Job Benifit' ),
      'add_new_item' => __( 'Add New Job Benifit' ),
      'new_item_name' => __( 'New Job Benifit Name' ),
      'menu_name' => __( ' Job Benifits' ),
    );    

    // Now register the taxonomy
    register_taxonomy('job_Job Benifits',array('job_listing'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'show_in_menu' => true,
      'query_var' => true,
    // 'rewrite' => array( 'slug' => 'bookingtype' ),
    ));

}

add_action( 'init', 'create_jobsperk_taxonomy');

  function create_jobsperk_taxonomy() {
  $labels = array(
    'name' => _x( 'Perks', 'job_board_internexxus' ),
    'singular_name' => _x( 'Perk', 'job_board_internexxus' ),
    'search_items' =>  __( 'Search  Perks' ),
    'all_items' => __( 'All  Perks' ),
    'parent_item' => __( 'Parent Perk' ),
    'parent_item_colon' => __( 'Parent Perk:' ),
    'edit_item' => __( 'Edit Perk' ), 
    'update_item' => __( 'Update Perk' ),
    'add_new_item' => __( 'Add New Perk' ),
    'new_item_name' => __( 'New Perk Name' ),
    'menu_name' => __( ' Perks' ),
  );    

  // Now register the taxonomy
  register_taxonomy('job_Perks',array('job_listing'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'show_in_menu' => true,
    'query_var' => true,
  // 'rewrite' => array( 'slug' => 'bookingtype' ),
  ));

  }


add_action('wp_ajax_load_job_taxanomy', 'load_job_taxanomy_cb');
add_action('wp_ajax_nopriv_load_job_taxanomy', 'load_job_taxanomy_cb');


function load_job_taxanomy_cb(){
    $searchQuery = $_GET['q'];
     $targatedTaxanomy = $_GET['taxanomy_term'];


     $args = array(
      'taxonomy'      => $targatedTaxanomy, // taxonomy name
      'orderby'       => 'id', 
      'order'         => 'ASC',
      'hide_empty'    => false,
      'fields'        => 'all',
      'name__like'    => $searchQuery
    ); 
  
    $terms = get_terms($args);

    $targatedTaxanomy = [];

    if(!empty($terms)){
      foreach ($terms as $term) {
        array_push($targatedTaxanomy,   array($term->term_id, $term->name));
      }  
    }
     echo  json_encode($targatedTaxanomy);
      die;
    }
   

    function hide_custom_taxonomies_from_post_edit() {
      // List of custom taxonomies to hide
      $taxonomies = array('university_name','job_major_minors','company_listing','user_ethnicities','job_skills');
      
      foreach ($taxonomies as $taxonomy) {
          $meta_box_id = $taxonomy . '_div';
          remove_meta_box($meta_box_id, 'candidate', 'side');
          
          // Add more remove_meta_box calls for different post types if needed
          // Example: remove_meta_box($meta_box_id, 'page', 'side');
      }
  }
  add_action('admin_menu', 'hide_custom_taxonomies_from_post_edit');




add_action('wp_ajax_resume_file_upload_onboard', 'resume_file_upload_onboard_cb');
add_action('wp_ajax_nopriv_resume_file_upload_onboard', 'resume_file_upload_onboard_cb');


function resume_file_upload_onboard_cb() {
  // Check if a file was uploaded
  if (isset($_FILES['resume_file'])) {
      $uploaded_image = $_FILES['resume_file'];

      // Check for errors during the upload
      if ($uploaded_image['error'] === UPLOAD_ERR_OK) {
          // Handle the uploaded file here
          // For example, move it to a specific directory and update user meta with the attachment ID

          $upload_overrides = array('test_form' => false);
          $file_info = wp_handle_upload($uploaded_image, $upload_overrides);

          if (!isset($file_info['error'])) {
              // File successfully uploaded, now let's add it to the media library
              $attachment = array(
                  'post_mime_type' => $file_info['type'],
                  'post_title' => sanitize_file_name($file_info['file']),
                  'post_content' => '',
                  'post_status' => 'inherit'
              );

              $attach_id = wp_insert_attachment($attachment, $file_info['file']);

              // Check if attachment ID was successfully created
              if (!is_wp_error($attach_id)) {

                  echo $attach_id;

                  $current_user_id = get_current_user_id();


                  $postId = get_user_meta($current_user_id, 'candidate_id', true);

                  update_post_meta($postId, '_candidate_cv_attachment', $attach_id);
                  //update_user_meta($current_user_id, '_candidate_cv_attachment', $attach_id);

                  // setcookie('attchment_id', '', time() + 86400, "/");

                  // setcookie('attchment_id', $attach_id, time() + 86400, "/");

              } else {
                  // Return error response if attachment ID creation fails
                  wp_send_json_error('Error creating attachment.');
              }
          } else {
              // Return error response if file upload fails
              wp_send_json_error('Error uploading file.');
          }
      } else {
          // Return error response if file upload has errors
          wp_send_json_error('File upload error.');
      }
  } else {
      // Return error response if no file was uploaded
      wp_send_json_error('No file uploaded.');
  }

  // Always exit after processing AJAX requests.
  wp_die();
}

function upload_file_from_url($url) {
  $tmp = download_url($url);

  if (is_wp_error($tmp)) {
      return $tmp;
  }

  $file_array = array(
      'name'     => basename($url),
      'tmp_name' => $tmp
  );

  // Check for download errors
  if (is_wp_error($tmp)) {
      @unlink($file_array['tmp_name']); // Clean up
      return $tmp;
  }

  // Handle the upload using WordPress functions
  $id = media_handle_sideload($file_array, 0);

  // Check for sideload errors.
  if (is_wp_error($id)) {
      @unlink($file_array['tmp_name']); // Clean up
      return $id;
  }

  return $id;
}

remove_filter( 'wp-job-board-pro-candidate-fields-admin', array('WP_Job_Board_Pro_Custom_Fields', 'admin_candidate_custom_fields' ), 10 );
