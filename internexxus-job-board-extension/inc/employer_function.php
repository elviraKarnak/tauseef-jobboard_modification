<?php
remove_action( 'user_register', array('WP_Job_Board_Pro_User', 'registration_save' ), 10, 1 );
add_action( 'user_register',  'registration_save_renovate');

function registration_save_renovate($user_id) {

    global $wp_job_board_pro_stop_process;
    if ( $wp_job_board_pro_stop_process ) {
        return true;
    }

    $wp_job_board_pro_stop_process = true;

    $action = isset($_REQUEST['action']) && $_REQUEST['action'] != '' ? $_REQUEST['action'] : '';
    $user_role = isset($_POST['role']) && $_POST['role'] != '' ? $_POST['role'] : '';
    $user_obj = get_user_by('ID', $user_id);

    $hereAbout = isset($_POST['hear_about_us']) && $_POST['hear_about_us'] != '' ? $_POST['hear_about_us'] : '';

    if ($user_role == 'wp_job_board_pro_employer') {

        $prefix = WP_JOB_BOARD_PRO_EMPLOYER_PREFIX;

        $post_title = str_replace(array('-', '_'), array(' ', ' '), $user_obj->display_name);
        $display_name = $user_obj->display_name;
        if ( !empty($_POST[$prefix.'title']) ) {
            $post_title = $display_name = sanitize_text_field($_POST[$prefix.'title']);
            
            $user_def_array = array(
                'ID' => $user_id,
                'display_name' => $display_name,
            );
            wp_update_user($user_def_array);
        }

        $post_args = array(
            'post_title' => $post_title,
            'post_type' => 'employer',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => $user_id,
        );

        if ( !empty($_POST[$prefix . 'description']) ) {
            $post_args['post_content'] = wp_kses_post($_POST[$prefix . 'description']);
        }

        if ( wp_job_board_pro_get_option('employers_requires_approval', 'auto') != 'auto' && ($action == 'wp_job_board_pro_ajax_register' || $action == 'wp_job_board_pro_ajax_registernew') ) {
            $post_args['post_status'] = 'pending';
        }

        if ( wp_job_board_pro_get_option('employer_slug_employer') == 'number' ) {
            $rand_num = mt_rand(100000000000,999999999999);
            $post_args['post_name'] = $rand_num;
        }

        $post_args = apply_filters('wp-job-board-pro-create-employer-post-args', $post_args, $user_obj);

        // Insert the post into the database
        $employer_id = wp_insert_post($post_args);

        $post_id = $employer_id;
        update_post_meta($employer_id, $prefix . 'user_id', $user_id);
        update_post_meta($employer_id, $prefix . 'display_name', $display_name);
        update_post_meta($employer_id, $prefix . 'email', $user_obj->user_email);
        update_post_meta($employer_id, $prefix . 'show_profile', 'show');
        
        update_post_meta($employer_id, 'post_date', strtotime(current_time('d-m-Y H:i:s')));

        //
        update_user_meta($user_id, 'employer_id', $employer_id);



        if ( wp_job_board_pro_get_option('employers_requires_approval', 'auto') != 'auto' && ($action == 'wp_job_board_pro_ajax_register' || $action == 'wp_job_board_pro_ajax_registernew') ) {
            $code = WP_Job_Board_Pro_Mixes::random_key();
            update_user_meta($user_id, 'account_approve_key', $code);
            update_user_meta($user_id, 'user_account_status', 'pending');

            if ( wp_job_board_pro_get_option('employers_requires_approval', 'auto') == 'email_approve' ) {
                $user_email = stripslashes( $user_obj->user_email );
            } else {
                $user_email = get_option( 'admin_email', false );
            }

            $email_key = apply_filters('wp_job_board_pro_email_key_employer_user_register_need_approve', 'user_register_need_approve');

            $subject = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'subject');
            //$content = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'content');
            
            $content = '
            <div style="background-color: #eeeeef; padding: 50px 0;">
                <table align="center" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px;">
                    <tbody>
                        <tr>
                            <td valign="top" align="center">
                                <p></p>
                                <table cellpadding="0" cellspacing="0" width="100%" border="0" id="template_body">
                                    <tbody>
                                        <tr>
                                            <td valign="top" style="background-color: #fafafa;" id="mailtpl_body_bg">
                                                <p></p>
                                                <table cellpadding="20" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top">
                                                                Hello
                                                                <p></p>
                                                                <p>Your new account has been successfully registered to our website Internexxus. You can log in to our website by using this site URL: <a href="' . $site_url . '">' . $site_url . '</a>.</p>
                                                                <h5>Information</h5>
                                                                <table class="blueTable">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Username</td>
                                                                            <td>' . $user_obj->user_login . '</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>User Email</td>
                                                                            <td>' . $user_obj->user_email . '</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Heard About Us From: </td>
                                                                            <td>' . $hereAbout . '</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="center">
                                <table cellpadding="10" cellspacing="0" width="100%" border="0" style="border-top: 1px solid #E2E2E2; background: #eee; border-radius: 0px 0px 6px 6px;" id="template_footer">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <table cellpadding="10" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="middle" colspan="2" style="border: 0; color: #777; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" id="credit">
                                                                <a href="' . $site_url . '" rel="noreferrer nofollow noopener" target="_blank">' . $site_name . '</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';
            $email_from = get_option( 'admin_email', false );
            $headers = sprintf( "From: %s <%s>\r\n Content-type: text/html", get_bloginfo('name'), $email_from );
            // send the mail
            WP_Job_Board_Pro_Email::wp_mail( $user_email, $subject, $content, $headers );
        } else {

           // wp_redirect(home_url());
            $user_email = stripslashes( $user_obj->user_email );

            $email_key = apply_filters('wp_job_board_pro_email_key_employer_user_register_auto_approve', 'user_register_auto_approve');
            $subject = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'subject');
            //$content = //WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj,'custom' => "<p>Known From: ".$hereAbout."</p>"), $email_key, 'content');

            $content = $content = '
            <div style="background-color: #eeeeef; padding: 50px 0;">
                <table align="center" cellpadding="0" cellspacing="0" border="0" style="max-width: 640px;">
                    <tbody>
                        <tr>
                            <td valign="top" align="center">
                                <p></p>
                                <table cellpadding="0" cellspacing="0" width="100%" border="0" id="template_body">
                                    <tbody>
                                        <tr>
                                            <td valign="top" style="background-color: #fafafa;" id="mailtpl_body_bg">
                                                <p></p>
                                                <table cellpadding="20" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top">
                                                                Hello
                                                                <p></p>
                                                                <p>Your new account has been successfully registered to our website Internexxus. You can log in to our website by using this site URL: <a href="' . $site_url . '">' . $site_url . '</a>.</p>
                                                                <h5>Information</h5>
                                                                <table class="blueTable">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Username</td>
                                                                            <td>' . $user_obj->user_login . '</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>User Email</td>
                                                                            <td>' . $user_obj->user_email . '</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Heard About Us From: </td>
                                                                            <td>' . $hereAbout . '</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="center">
                                <table cellpadding="10" cellspacing="0" width="100%" border="0" style="border-top: 1px solid #E2E2E2; background: #eee; border-radius: 0px 0px 6px 6px;" id="template_footer">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <table cellpadding="10" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="middle" colspan="2" style="border: 0; color: #777; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" id="credit">
                                                                <a href="' . $site_url . '" rel="noreferrer nofollow noopener" target="_blank">' . $site_name . '</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';

            $email_from = get_option( 'admin_email', false );
            $headers = sprintf( "From: %s <%s>\r\n Content-type: text/html", get_bloginfo('name'), $email_from );
            // send the mail
            WP_Job_Board_Pro_Email::wp_mail( $user_email, $subject, $content, $headers );
        }

        if ( isset($_POST['phone']) ) {
            update_post_meta($employer_id, $prefix . 'phone', $_POST['phone']);
        }

        if (isset($_POST['employer_category'])) {
            $employer_category = sanitize_text_field($_POST['employer_category']);
            wp_set_post_terms($employer_id, array($employer_category), 'employer_category', false);
        }

        // custom fields saving
        do_action('wp_job_board_pro_employer_signup_custom_fields_save', $employer_id);

        do_action('wp_job_board_pro_signup_custom_fields_save', 'employer', $employer_id);

        
    } elseif ( $user_role == 'wp_job_board_pro_employee' ) {
        
        $email_key = apply_filters('wp_job_board_pro_email_key_employee_user_register_auto_approve', 'user_register_auto_approve');
        $user_email = stripslashes( $user_obj->user_email );
        $subject = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'subject');
        $content = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'content');

        $email_from = get_option( 'admin_email', false );
        $headers = sprintf( "From: %s <%s>\r\n Content-type: text/html", get_bloginfo('name'), $email_from );
        // send the mail
        WP_Job_Board_Pro_Email::wp_mail( $user_email, $subject, $content, $headers );
    

        do_action('wp_job_board_pro_signup_custom_fields_save', 'employee');

    } elseif ( $user_role != 'administrator' && apply_filters('wp_job_board_pro_candidate_user_role_excludes', true, $user_role, $user_id) ) {
        
        $prefix = WP_JOB_BOARD_PRO_CANDIDATE_PREFIX;
        global $wp_job_board_pro_socials_register;

        $post_title = str_replace(array('-', '_'), array(' ', ' '), $user_obj->display_name);
        $display_name = $user_obj->display_name;
        if ( !empty($_POST[$prefix.'title']) ) {
            $post_title = $display_name = sanitize_text_field($_POST[$prefix.'title']);
            
            $user_def_array = array(
                'ID' => $user_id,
                'display_name' => $display_name,
            );
            wp_update_user($user_def_array);
        }

        $post_args = array(
            'post_title' => $post_title,
            'post_type' => 'candidate',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => $user_id,
        );
        if ( !empty($_POST[$prefix.'description']) ) {
            $post_args['post_content'] = wp_kses_post($_POST[$prefix.'description']);
        }

        $post_status = 'publish';
        if ( wp_job_board_pro_get_option('candidates_requires_approval', 'auto') != 'auto' && ($action == 'wp_job_board_pro_ajax_register' || $action == 'wp_job_board_pro_ajax_registernew' || $wp_job_board_pro_socials_register ) ) {
            $post_status = 'pending';
        }
        if ( wp_job_board_pro_get_option('resumes_requires_approval', 'auto') != 'auto' && ($action == 'wp_job_board_pro_ajax_register' || $action == 'wp_job_board_pro_ajax_registernew' || $wp_job_board_pro_socials_register ) ) {
            $post_status = 'pending_approve';
        }
        $post_args['post_status'] = $post_status;
        
        if ( wp_job_board_pro_get_option('candidate_slug_candidate') == 'number' ) {
            $rand_num = mt_rand(100000000000,999999999999);
            $post_args['post_name'] = $rand_num;
        }

        $post_args = apply_filters('wp-job-board-pro-create-candidate-post-args', $post_args, $user_obj);

        // Insert the post into the database
        $candidate_id = wp_insert_post($post_args);
        
        $post_id = $candidate_id;

        update_post_meta($candidate_id, $prefix . 'user_id', $user_id);
        update_post_meta($candidate_id, $prefix . 'display_name', $display_name);
        update_post_meta($candidate_id, $prefix . 'email', $user_obj->user_email);
        update_post_meta($candidate_id, $prefix . 'show_profile', 'show');

        update_user_meta($user_id, 'candidate_id', $candidate_id);
        

        if ( wp_job_board_pro_get_option('candidates_requires_approval', 'auto') != 'auto' && ($action == 'wp_job_board_pro_ajax_register' || $action == 'wp_job_board_pro_ajax_registernew') ) {
            $code = WP_Job_Board_Pro_Mixes::random_key();
            update_user_meta($user_id, 'account_approve_key', $code);
            update_user_meta($user_id, 'user_account_status', 'pending');

            if ( wp_job_board_pro_get_option('candidates_requires_approval', 'auto') == 'email_approve' ) {
                $user_email = stripslashes( $user_obj->user_email );
            } else {
                $user_email = get_option( 'admin_email', false );
            }

            $email_key = apply_filters('wp_job_board_pro_email_key_candidate_user_register_need_approve', 'user_register_need_approve');

            $subject = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'subject');
            $content = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'content');

            $email_from = get_option( 'admin_email', false );
            $headers = sprintf( "From: %s <%s>\r\n Content-type: text/html", get_bloginfo('name'), $email_from );
            // send the mail
            WP_Job_Board_Pro_Email::wp_mail( $user_email, $subject, $content, $headers );
        } else {
            $email_key = apply_filters('wp_job_board_pro_email_key_candidate_user_register_auto_approve', 'user_register_auto_approve');

            $user_email = stripslashes( $user_obj->user_email );
            $subject = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'subject');
            $content = WP_Job_Board_Pro_Email::render_email_vars(array('user_obj' => $user_obj), $email_key, 'content');

            $email_from = get_option( 'admin_email', false );
            $headers = sprintf( "From: %s <%s>\r\n Content-type: text/html", get_bloginfo('name'), $email_from );
            // send the mail
            WP_Job_Board_Pro_Email::wp_mail( $user_email, $subject, $content, $headers );
        }

        update_post_meta($candidate_id, 'post_date', strtotime(current_time('d-m-Y H:i:s')));

        if ( isset($_POST['phone']) ) {
            update_post_meta($candidate_id, $prefix . 'phone', $_POST['phone']);
        }
        if (isset($_POST['candidate_category'])) {
            $candidate_category = sanitize_text_field($_POST['candidate_category']);
            wp_set_post_terms($candidate_id, array($candidate_category), 'candidate_category', false);
        }

        // custom fields saving
        do_action('wp_job_board_pro_candidate_signup_custom_fields_save', $candidate_id);
         
        do_action('wp_job_board_pro_signup_custom_fields_save', 'candidate', $candidate_id);
        
        $wp_job_board_pro_socials_register = false;
    }

    do_action('wp_job_board_pro_member_after_making_cand_or_emp', $user_id, $user_role);

    //remove user admin bar
    update_user_meta($user_id, 'show_admin_bar_front', false);
}


add_action( 'wp_ajax_nopriv_add_employe_data', 'add_employe_data_cb' );
add_action( 'wp_ajax_add_employe_data', 'add_employe_data_cb' );

function add_employe_data_cb(){

    $company_name = $_POST['company_name'];
    $founded_date = $_POST['founded_date'];
    $website = $_POST['website'];
    $company_email = $_POST['email_id'];
    $company_size = $_POST['company_size'];
    $phone_number = $_POST['phone_number'];
    $email_id = $_POST['email_id'];
    $about_company = $_POST['about_company'];
    $company_profile_image_id = $_POST['company_profile_image_id'];
    $representative = $_POST['representative'];
    $job_title = $_POST['job_title'];
    $representative_phone_number = $_POST['representative_phone_number'];
    $representative_email_id = $_POST['representative_email_id'];

    $current_user_id = get_current_user_id();
    $get_employerId = get_user_meta( $current_user_id, 'employer_id', true );

    //$new_title = 'My New Post Title';
    // echo  $current_user_id;
    // echo $get_employerId;
    // return;

    $post_id = $get_employerId;

    // Prepare the post data array
    $post_data = array(
        'ID'         => $post_id,
        'post_title' => $company_name,
        'post_content' => $about_company,
    );

    // Update the post

    $result = wp_update_post( $post_data, true );

    update_post_meta( $post_id, '_employer_display_name',  $company_name);
    update_post_meta( $post_id, 'custom-date-19831395',    $founded_date);
    update_post_meta( $post_id, '_employer_company_size',  $company_size);
    update_post_meta( $post_id, '_employer_website',       $website);
    update_post_meta( $post_id, '_employer_phone',         $phone_number);
    update_post_meta( $post_id, '_employer_email',        $company_email);

    update_post_meta( $post_id, 'name_of_representative_emp',  $representative);
    update_post_meta( $post_id, 'job_title_rep_emp', $job_title);
    update_post_meta( $post_id, 'phone_no_res_emp',  $representative_phone_number);
    update_post_meta( $post_id, 'email_id_res_emp',  $representative_email_id);

    set_post_thumbnail($post_id, $company_profile_image_id);
    
    echo "200";

    exit;


}

add_action('wp_ajax_upload_file_company_logo', 'upload_file_company_logo_cb');
add_action('wp_ajax_nopriv_upload_file_company_logo', 'upload_file_company_logo_cb');

function upload_file_company_logo_cb() {
    // Nonce verification for logged-in users

    // Handle file upload logic
    if (isset($_FILES['file'])) {
       // $file = $_FILES['file'];

        require( ABSPATH.'wp-load.php' );

        // it allows us to use wp_handle_upload() function
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        
        // you can add some kind of validation here
        if( empty( $_FILES[ 'file' ] ) ) {
            wp_die( 'No files selected.' );
        }
        
        $upload = wp_handle_upload( 
            $_FILES[ 'file' ], 
            array( 'test_form' => false ) 
        );
        
        if( ! empty( $upload[ 'error' ] ) ) {
            wp_die( $upload[ 'error' ] );
        }
        
        // it is time to add our uploaded image into WordPress media library
        $attachment_id = wp_insert_attachment(
            array(
                'guid'           => $upload[ 'url' ],
                'post_mime_type' => $upload[ 'type' ],
                'post_title'     => basename( $upload[ 'file' ] ),
                'post_content'   => '',
                'post_status'    => 'inherit',
            ),
            $upload[ 'file' ]
        );
        
        if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
            wp_die( 'Upload error.' );
        }
        
        // update medatata, regenerate image sizes
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        
        wp_update_attachment_metadata(
            $attachment_id,
            wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
        );
        echo $attachment_id;
        // just redirect to the uploaded file
        //wp_safe_redirect( $upload[ 'url' ] );
        exit;
    }
       
}



add_action( 'wp_ajax_nopriv_add_employe_loc_data', 'add_employe_loc_data_cb' );
add_action( 'wp_ajax_add_employe_loc_data', 'add_employe_loc_data_cb' );


function add_employe_loc_data_cb(){

    $city = $_POST['city'];
    $state = $_POST['state'];
    $maps_location = $_POST['maps_location'];
    $latitude_emp = $_POST['latitude_emp'];
    $longitude_emp = $_POST['longitude_emp'];

    $current_user_id = get_current_user_id();
    $get_employerId = get_user_meta( $current_user_id, 'employer_id', true );

    //$new_title = 'My New Post Title';
    // echo  $current_user_id;
    // echo $get_employerId;
    // return;

    $post_id = $get_employerId;

    $address = [];

    $address['address'] = $maps_location;
    $address['latitude'] = $latitude_emp;
    $address['longitude'] = $longitude_emp;



    update_post_meta( $post_id, '_employer_state',  $state);
    update_post_meta( $post_id, '_employer_city',    $city);
    update_post_meta( $post_id, '_employer_map_location_address', $maps_location);
    update_post_meta( $post_id, '_employer_map_location_latitude', $latitude_emp);
    update_post_meta( $post_id, '_employer_map_location_longitude', $longitude_emp);
    update_post_meta( $post_id, '_employer_map_location', $address);




    echo "200";
    exit;

}
add_action( 'wp_ajax_nopriv_upload_social_icon', 'upload_social_icon_cb' );
add_action( 'wp_ajax_upload_social_icon', 'upload_social_icon_cb' );

function upload_social_icon_cb(){

    $platform = $_POST['platform'];
    $url = $_POST['url'];

    $current_user_id = get_current_user_id();
    $get_employerId = get_user_meta( $current_user_id, 'employer_id', true );
    
    $post_id =  $get_employerId;

    $socialArray =  get_post_meta( $post_id, '_employer_socials', true);

    //print_r($socialArray);

    // return;

    $temp = [];

    $temp['network'] = $platform;
    $temp['url'] = $url;

        if($socialArray && !empty($socialArray)){
            array_push($socialArray, $temp);
            update_post_meta( $post_id, '_employer_socials', $socialArray);
        }else{
           update_post_meta( $post_id, '_employer_socials', $temp);
        }
        
}



