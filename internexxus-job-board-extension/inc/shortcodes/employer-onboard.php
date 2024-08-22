<?php 
if( !class_exists( 'Internexxus_Employer_onboarding_Shortcodes') ){

    class Internexxus_Employer_onboarding_Shortcodes {
        public function __construct(){
            add_shortcode('employer_onboard', array($this,'employer_onboard_cb')); 
            add_shortcode('candidate_onboard', array($this,'candidate_onboard_cb')); 
        }


        function employer_onboard_cb(){
            require_once( Internexxus_JobBoard_Extension_PATH . 'views/employer-onboard.php' );
        }

        function candidate_onboard_cb(){
            require_once( Internexxus_JobBoard_Extension_PATH . 'views/candidate-onboard.php' );
        }


    }
}