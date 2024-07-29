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
   register_taxonomy('job_skills',array('job_listing'), array(
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
   

 // Array of skills


// // Function to add skills to the taxonomy
// function add_skills_to_taxonomy() {
//     global $skills;

//     $skills = [
//         "Python", "Java", "JavaScript", "C++", "Ruby",
//         "HTML/CSS", "React.js", "Angular", "Node.js", "Django",
//         "SQL", "MongoDB", "PostgreSQL", "Oracle", "MySQL",
//         "Docker", "Kubernetes", "Jenkins", "AWS", "Azure",
//         "R", "Tableau", "Power BI", "Pandas", "NumPy",
//         "Swift", "Kotlin", "Flutter", "React Native", "Xamarin",
//         "Ethical Hacking", "Network Security", "Encryption", "SIEM", "Firewall Management",
//         "TensorFlow", "PyTorch", "Scikit-Learn", "NLP", "Computer Vision",
//         "Verbal Communication", "Written Communication", "Presentation Skills", "Active Listening", "Negotiation",
//         "Team Management", "Decision Making", "Conflict Resolution", "Mentoring", "Strategic Planning",
//         "Time Management", "Risk Management", "Agile Methodologies", "Scrum", "Budgeting",
//         "Empathy", "Collaboration", "Adaptability", "Relationship Building", "Customer Service",
//         "Problem Solving", "Analytical Skills", "Creativity", "Innovation", "Research",
//         "Multitasking", "Attention to Detail", "Prioritization", "Workflow Management", "Documentation",
//         "Sales Strategies", "Digital Marketing", "Market Research", "CRM", "Brand Management",
//         "Financial Analysis", "Budgeting and Forecasting", "Accounting", "Cost Management", "Investment Analysis"
//     ];

//     foreach ( $skills as $skill ) {
//         if ( !term_exists( $skill, 'job_skills' ) ) {
//             $taxonomy = 'job_skills';

//             $args = array(
//                 'description' => $skill,
//                 'slug' => sanitize_title( $skill ),
//                 'parent' => 0
//             );

//             $result = wp_insert_term( $skill, $taxonomy, $args );

//             if ( is_wp_error( $result ) ) {
//                 // Handle the error
//                 $error_message = $result->get_error_message();
//                 echo "Error: $error_message";
//             } else {
//                 // Term was successfully inserted
//                 $term_id = $result['term_id'];
//                 $term_taxonomy_id = $result['term_taxonomy_id'];
//                 echo "Term inserted with ID: $term_id and Taxonomy ID: $term_taxonomy_id<br>";
//             }
//         }
//     }
// }
// add_action( 'init', 'add_skills_to_taxonomy', 10 );