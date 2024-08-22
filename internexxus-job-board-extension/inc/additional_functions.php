<?php 

//acf theme page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Job Board Additional',
		'menu_title'	=> 'Job Board Additional',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> 'false'
	));

}	


// function add_employer_onboard_link() {
//     $employer_onBoard_link = get_field('employer_on_bord_link_options','options');
//     // Your custom data or script
//     echo '<input type="hidden" value="'. $employer_onBoard_link.'" class="employe_onboard_link">';
// }
// add_action('wp_head', 'add_employer_onboard_link');
// 


// add_action('rest_api_init', function () {
//     register_rest_route('custom/v1', '/university_list', array(
//         'methods' => 'GET',
//         'callback' => 'get_university_list',
//     ));
// });

// // Define the callback function for the endpoint
// function get_university_list() {
//     // Path to your PHP file
//     $file_path = get_stylesheet_directory() . '/university/university_lists_sorted.php';
    
//     // Check if the file exists
//     if (!file_exists($file_path)) {
//         return new WP_Error('file_not_found', 'File not found', array('status' => 404));
//     }

//     // Include the PHP file
//     ob_start();
//     include($file_path);
//     $content = ob_get_clean();

//     // Return the content as JSON
//     return json_decode($content);
// }


/* modify the photos ACF felid for the employers */ 

// Load existing serialized data into the ACF field
function load_existing_photos($value, $post_id, $field) {
    // Debug: Check the post ID
   // error_log('load_existing_photos - post ID: ' . $post_id);

    // Get the existing serialized data from post meta
    $image_data = get_post_meta($post_id, '_job_photos', true);
    // if(!empty($image_data) && )
    if (isset($image_data) && is_array($image_data) && count($image_data) > 0 && is_valid_job_img_url(reset($image_data))) {

    
	$acf_images = [];
        // Check if unserialized data is an array
        if (is_array($image_data)) {
            foreach ($image_data as $id => $url) {
				array_push( $acf_images,  $id);
            }
    }

    return $acf_images;
}else{
    return $value; 
}



}


add_filter('acf/load_value/name=_job_photos', 'load_existing_photos', 10, 3);

function is_valid_job_img_url($url) {
    return filter_var($url, FILTER_VALIDATE_URL);
}

// Save the ACF field data back to the serialized format
function save_photos_to_serialized_meta($value, $post_id, $field) {
   

    // Initialize $image_data as an empty array
    $image_data = array();

		$image_urls = array();

		foreach ($value as $id) {
			$image_urls[$id] = wp_get_attachment_url($id);
		}


    //   print_r($image_urls);
    //   exit;
    update_post_meta($post_id, '_job_photos', $image_urls);

    return $image_urls;
}
add_filter('acf/update_value/name=_job_photos', 'save_photos_to_serialized_meta', 10, 3);

/* modify the photos ACF felid for the Post Author JOBs */ 

// Load existing serialized data into the ACF field
// function add_user_box($value, $post_id, $field) {

//     $image_urls = get_the_post_thumbnail_url($value, 'small');
//     $the_title =  get_the_title($value);
    
//     echo '
//         <div class="user-wrapper clearfix" bis_skin_checked="1">
//         <div class="user-avatar" bis_skin_checked="1">
//         <img width="150" height="150" src="'.$image_urls.'" class="attachment-thumbnail size-thumbnail wp-post-image" alt="'.$the_title.'">
//         </div>
//         <div class="user-text" bis_skin_checked="1">'.$the_title.'</div>
//         </div>

//     ';

//     return $value;

// }

// // add_filter('acf/load_value/name=_job_employer_posted_by', 'add_user_box', 10, 3);
// function add_user_box($value, $post_id, $field) {

//     // var_dump($field['key']);
//     // Check if the ACF field key matches the expected field key
//     if ($field == 'field_668293872b0ca') { // Replace 'field_key_here' with your actual ACF field key
//         $image_url = get_the_post_thumbnail_url($value, 'small');
//         $the_title = get_the_title($value);

//         // Output the HTML structure
//         echo '
//             <div class="user-wrapper clearfix">
//                 <div class="user-avatar">
//                     <img width="150" height="150" src="' . $image_url . '" class="attachment-thumbnail size-thumbnail wp-post-image" alt="' . $the_title . '">
//                 </div>
//                 <div class="user-text">' . $the_title . '</div>
//             </div>
//         ';
//     }

//     return $value;
// }

// add_filter('acf/load_value/name=_job_employer_posted_by', 'add_user_box', 10, 3);

function my_acf_prepare_field( $field ) {
    if ( is_admin() ) :
        $dynamic = 'dynamic';
        ?>
        <p style="padding: 1em;">
            This is <?= $dynamic ?> content
        </p>
        <?php
    endif;
    return $field;
}

add_filter('acf/prepare_field/name=_author_box_jobs', 'my_acf_prepare_field');






remove_filter( 'wp-job-board-pro-candidate-fields-admin', array( 'WP_Job_Board_Pro_Custom_Fields', 'admin_candidate_custom_fields' ), 2 );

//remove_filter( 'wp-job-board-pro-job_listing-fields-admin', array( 'WP_Job_Board_Pro_Custom_Fields', 'admin_job_listing_custom_fields' ), 2 );

// remove_action( 'wjbp_ajax_wp_job_board_pro_ajax_create_meeting',  array('WP_Job_Board_Pro_Meeting', 'process_create_meeting'));

// add_action('wjbp_ajax_wp_job_board_pro_ajax_create_meeting', 'theme_process_create_meeting_new');
// add_action('wjbp_ajax_wp_job_board_pro_ajax_create_meeting', 'theme_process_create_meeting_new');

function theme_process_create_meeting_new() {
    if ( !isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'wp-job-board-pro-create-meeting-nonce' )  ) {
        $return = array( 'status' => false, 'msg' => esc_html__('Your nonce did not verify.', 'wp-job-board-pro') );
        echo wp_json_encode($return);
        exit;
    }

    if ( !is_user_logged_in() || !WP_Job_Board_Pro_User::is_employer() ) {
        $return = array( 'status' => false, 'msg' => esc_html__('Please login as "Employer" to create meeting.', 'wp-job-board-pro') );
        echo wp_json_encode($return);
        exit;
    }

    $application_id = !empty($_POST['application_id']) ? $_POST['application_id'] : '';
    $application = get_post($application_id);

    if ( !$application || empty($application->ID) ) {
        $return = array( 'status' => false, 'msg' => esc_html__('Application doesn\'t exist', 'wp-job-board-pro') );
        echo wp_json_encode($return);
        exit;
    }

    $date = sanitize_text_field(!empty($_POST['date']) ? $_POST['date'] : '');
    $time = sanitize_text_field(!empty($_POST['time']) ? $_POST['time'] : '');
    $time_duration = sanitize_text_field(!empty($_POST['time_duration']) ? $_POST['time_duration'] : '');
    $message = wp_kses_post(!empty($_POST['message']) ? $_POST['message'] : '');
    if ( empty($date) || empty($time) || empty($time_duration) ) {
        $return = array( 'status' => false, 'msg' => esc_html__('Fill all fields', 'wp-job-board-pro') );
        echo wp_json_encode($return);
        exit;
    }

    $user_id = WP_Job_Board_Pro_User::get_user_id();
    $employer_id = WP_Job_Board_Pro_User::get_employer_by_user_id($user_id);

    $candidate_id = WP_Job_Board_Pro_Applicant::get_post_meta($application_id, 'candidate_id');
    $job_id = WP_Job_Board_Pro_Applicant::get_post_meta($application_id, 'job_id');

    $post_args = array(
        'post_title' => sanitize_text_field( get_the_title($candidate_id)),
        'post_type' => 'job_meeting',
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => $user_id,
    );
    $post_args = apply_filters('wp-job-board-pro-create-meeting-data', $post_args);
    do_action('wp-job-board-pro-before-create-meeting');

    $meeting_platform = 'onboard';
    
    $meet_exct_stime = strtotime($date . ' ' . $time);
    
    $zoom_email = WP_Job_Board_Pro_Employer::get_post_meta($employer_id, 'zoom_email', true);
    $zoom_client_id = WP_Job_Board_Pro_Employer::get_post_meta($employer_id, 'zoom_client_id', true);
    $zoom_client_secret = WP_Job_Board_Pro_Employer::get_post_meta($employer_id, 'zoom_client_secret', true);

    if ( !empty($zoom_email) && !empty($zoom_client_id) && !empty($zoom_client_secret) && !empty($_POST['zoom_meeting']) ) {
        
        $access_token = WP_Job_Board_Pro_Meeting_Zoom::user_zoom_access_token($user_id);
        $data = array(
            'schedule_for' => $zoom_email,
            'topic' => sprintf(esc_html__('Interview meeting for job - %s', 'wp-job-board-pro'), get_the_title($job_id)),
            'start_time' => date('Y-m-d', $meet_exct_stime) . 'T' . date('H:i:s', $meet_exct_stime),
            'timezone' => wp_timezone_string(),
            'duration' => $time_duration,
            'agenda' => $message,
        );
        $data_str = json_encode($data);

        $url = 'https://api.zoom.us/v2/users/' . $zoom_email . '/meetings';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token,
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);
        if (isset($result['id'])) {
            $zoom_meeting_id = $result['id'];
            $meeting_platform = 'zoom';
            
            $zoom_meeting_url = isset($result['join_url']) ? $result['join_url'] : '';
        }
    }

    // Insert the post into the database
    $meeting_id = wp_insert_post($post_args);

    if ( $meeting_id ) {
        update_post_meta($meeting_id, 'candidate_id', $candidate_id);
        update_post_meta($meeting_id, 'application_id', $application_id);
        update_post_meta($meeting_id, 'date', $date);
        update_post_meta($meeting_id, 'time', $time);
        update_post_meta($meeting_id, 'time_duration', $time_duration);
        
        update_post_meta($meeting_id, 'meeting_platform', $meeting_platform);
        
        if ($meeting_platform == 'zoom') {
            update_post_meta($meeting_id, 'zoom_meeting_id', $zoom_meeting_id);
            update_post_meta($meeting_id, 'zoom_meeting_url', $zoom_meeting_url);
        }

        // messages
        $messages = array(array(
            'type' => 'create',
            'date' => strtotime('now'),
            'message' => $message,
        ));
        update_post_meta($meeting_id, 'messages', $messages);

        // send email
        $email = WP_Job_Board_Pro_Candidate::get_post_meta($candidate_id, 'email', true);

        $email_args = array(
            'user_name' => get_the_title($candidate_id),
            'date' => date( get_option('date_format'), $meet_exct_stime),
            'time' => $time." ".wp_timezone_string(),
            'time_duration' => $time_duration,
            'message' => $message,
            'job_title' => get_the_title($job_id),
            'employer_name' => get_the_title($employer_id),
            'zoom_meeting_url' => $zoom_meeting_url,
        );

        $email_subject = WP_Job_Board_Pro_Email::render_email_vars( $email_args, 'meeting_create', 'subject');
        $email_content = WP_Job_Board_Pro_Email::render_email_vars( $email_args, 'meeting_create', 'content');

        $headers = sprintf( "From: %s <%s>\r\n Content-type: text/html", get_bloginfo('name'), get_option( 'admin_email', false ) );
        
       // $result = WP_Job_Board_Pro_Email::wp_mail( $email, $email_subject, $email_content, $headers );
        // end send email

        $notify_args = array(
            'post_type' => 'candidate',
            'user_post_id' => $candidate_id,
            'type' => 'create_meeting',
            'application_id' => $application_id,
            'employer_id' => $employer_id,
            'job_id' => $job_id,
            'meeting_id' => $meeting_id,
        );
        WP_Job_Board_Pro_User_Notification::add_notification($notify_args);

        do_action('wp-job-board-pro-before-after-create-meeting', $meeting_id);

        $return = array( 'status' => true, 'msg' => esc_html__('You have successfully created a meeting', 'wp-job-board-pro') );
        echo wp_json_encode($return);
        exit;
    }

    $return = array( 'status' => false, 'msg' => esc_html__('Error occurred when creating a meeting', 'wp-job-board-pro') );
    echo wp_json_encode($return);
    exit;
}

// Hook the function to an appropriate action or filter







?>

