<?php 
if( !class_exists( 'Internexxus_Post_Internships_Shortcodes') ){

    class Internexxus_Post_Internships_Shortcodes {
        public function __construct(){
            add_shortcode('post_internships', array($this,'post_internships_cb')); 
        }


        function post_internships_cb(){
            require_once( Internexxus_JobBoard_Extension_PATH . 'views/post_internships.php' );
        }


    }
}