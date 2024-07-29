<?php
/**
 * Plugin Name: Internexxus Job Board Extension
 * Plugin URI: https://dev-internexxus.elvirainfotech.live//
 * Description: Custom Extension For Job Board Plugin.
 * Author: Raihan Reza
 * Version: 1.0.0
 * Requires at least: 5.6
 * Tested up to: 6.4.2
 * Text Domain: job_board_internexxus
 * License: GPL v2 or later
 * License URI:https://www.gnu.org/licenses/gpl-2.0.html
 * @author    Raihan Reza
 * @category  Genarel
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

 /*
Internexxus Job Board Extension is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Internexxus Job Board Extensions. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'Internexxus_JobBoard_Extension' )){
    class Internexxus_JobBoard_Extension {
        function __construct() {
			$this->define_constants(); 

            require_once( Internexxus_JobBoard_Extension_PATH . 'inc/additional_functions.php' ); 
            require_once( Internexxus_JobBoard_Extension_PATH . 'inc/internships/function_internships.php' );  
            require_once( Internexxus_JobBoard_Extension_PATH . 'inc/employer_function.php' );
            require_once( Internexxus_JobBoard_Extension_PATH . 'inc/shortcodes/employer-onboard.php' );
            $Internexxus_Employer_onboarding_Shortcodes = new Internexxus_Employer_onboarding_Shortcodes();

            require_once( Internexxus_JobBoard_Extension_PATH . 'inc/shortcodes/post_internships.php' );
            $Internexxus_Post_Internships_Shortcodes = new Internexxus_Post_Internships_Shortcodes();

            add_action( 'wp_enqueue_scripts', array( $this, 'internexxus_jobboard_extension'));
            
        }

        public function define_constants(){
			define( 'Internexxus_JobBoard_Extension_PATH', plugin_dir_path( __FILE__ ) );
			define( 'Internexxus_JobBoard_Extension_URL', plugin_dir_url( __FILE__ ) );
			define( 'Internexxus_JobBoard_Extension_VERSION', '1.0.0' );
		}

        public static function activate(){
        }

        public static function deactivate(){
            flush_rewrite_rules();
        }

        public function internexxus_jobboard_extension(){
            //style sheets
            wp_enqueue_style( 'internexxus_jobboard_ui_js', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', [],1.0);
            wp_enqueue_style( 'font-awesome_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', [],time());
            wp_enqueue_style( 'internexxus_jobboard_renovate_css', Internexxus_JobBoard_Extension_URL.'/assets/css/renovate.css', [],time());

            
            //scripts
            
            wp_enqueue_script('internexxus_jobboard_googlemap', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBn7lQ3EpDRDudz9BK7Nl2flp3YkaKfqxw', [],1.0, true); 
            wp_enqueue_script('internexxus_jobboard_ui_js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', [],1.0, false); 
            wp_enqueue_script('internexxus_jobboard_renovate_js', Internexxus_JobBoard_Extension_URL.'/assets/js/renovate.js', [],time(), false); 
        }
        
    }   
}

if( class_exists( 'Internexxus_JobBoard_Extension' ) ){
    register_activation_hook( __FILE__, array( 'Internexxus_JobBoard_Extension', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'Internexxus_JobBoard_Extension', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'Internexxus_JobBoard_Extension', 'uninstall' ) );

    $Internexxus_JobBoard_Extension = new Internexxus_JobBoard_Extension();
}