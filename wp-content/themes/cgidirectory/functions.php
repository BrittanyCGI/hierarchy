<?php
/**
 * cgidirectory functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cgidirectory
 */

if ( ! function_exists( 'cgidirectory_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cgidirectory_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cgidirectory, use a find and replace
	 * to change 'cgidirectory' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cgidirectory', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'cgidirectory' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cgidirectory_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'cgidirectory_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cgidirectory_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cgidirectory_content_width', 640 );
}
add_action( 'after_setup_theme', 'cgidirectory_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cgidirectory_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cgidirectory' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cgidirectory' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cgidirectory_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cgidirectory_scripts() {
	

	wp_enqueue_script( 'cgidirectory-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cgidirectory-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//include Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );
	
	//make stylesheet override Bootstrap.css
	wp_enqueue_style( 'cgidirectory-style', get_stylesheet_uri() );

	//add table magic
	wp_enqueue_script('table-info', get_template_directory_uri().'/js/table-info.js', array('jquery') );

	//add hierarchy js
	wp_enqueue_script('hierarchy-js', get_template_directory_uri().'/js/hierarchy.js', array('jquery') );

	//add cookie plugin js
	wp_enqueue_script('cookie-js', get_template_directory_uri().'/js/cookie.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'cgidirectory_scripts' );





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';



// Register Hierarchy Custom Post Type 

/*register_post_type( 'hierarchy',
    array(
        'labels' => array(
            'name' => __( 'Hierarchy' ),
            'singular_name' => __( 'Hierarchy Branch' )
        ),
        'menu_icon'     => 'dashicons-networking',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'hierarchy' ),
        'supports' => array( 'title', 'editor','thumbnail', 'author', 'page-attributes')
    )
);
*/
// Register Custom Post Type
function employees_post_type() {

	$labels = array(
		'name'                  => 'Employees',
		'singular_name'         => 'Employee',
		'menu_name'             => 'Employees',
		'name_admin_bar'        => 'Employee',
		'archives'              => 'Employee Archives',
		'attributes'            => 'Employee Attributes',
		'parent_item_colon'     => 'Parent Employee:',
		'all_items'             => 'All Employees',
		'add_new_item'          => 'Add New Employee',
		'add_new'               => 'New Employee',
		'new_item'              => 'New Employees',
		'edit_item'             => 'Edit Employee',
		'update_item'           => 'Update Employee',
		'view_item'             => 'View Employee',
		'view_items'            => 'View Employees',
		'search_items'          => 'Search employees',
		'not_found'             => 'No employees found',
		'not_found_in_trash'    => 'No employees found in Trash',
		'featured_image'        => 'Portrait',
		'set_featured_image'    => 'Set portrait',
		'remove_featured_image' => 'Remove portrait',
		'use_featured_image'    => 'Use as portrait',
		'insert_into_item'      => 'Insert into employee',
		'uploaded_to_this_item' => 'Uploaded to this employee',
		'items_list'            => 'Employees list',
		'items_list_navigation' => 'Employees list navigation',
		'filter_items_list'     => 'Filter employees list',
	);
	$args = array(
		'label'                 => 'Employee',
		'description'           => 'Employee information',
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'				=> true,
	);
	register_post_type( 'employee', $args );

}
add_action( 'init', 'employees_post_type', 0 );



// change title on custom post type
function change_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'employee' == $screen->post_type ) {
          $title = 'Employee Name';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_default_title' );




// add custom taxonomies
// Register Custom Taxonomy
function department_taxonomy() {

	$labels = array(
		'name'                       => 'Departments',
		'singular_name'              => 'Department',
		'menu_name'                  => 'Departments',
		'all_items'                  => 'All Departments',
		'parent_item'                => 'Parent Department',
		'parent_item_colon'          => 'Parent Department:',
		'new_item_name'              => 'New Department',
		'add_new_item'               => 'Add New Department',
		'edit_item'                  => 'Edit Department',
		'update_item'                => 'Update Department',
		'view_item'                  => 'View Department',
		'separate_items_with_commas' => 'Separate department with commas',
		'add_or_remove_items'        => 'Add or remove departments',
		'choose_from_most_used'      => 'Choose from the most used departments',
		'popular_items'              => 'Popular Departments',
		'search_items'               => 'Search departments',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No foors',
		'items_list'                 => 'Departments list',
		'items_list_navigation'      => 'Departments list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'department', array( 'employee' ), $args );

}
add_action( 'init', 'department_taxonomy', 0 );


// Register Custom Taxonomy
function floor_taxonomy() {

	$labels = array(
		'name'                       => 'Floors',
		'singular_name'              => 'Floor',
		'menu_name'                  => 'Floors',
		'all_items'                  => 'All Floors',
		'parent_item'                => 'Parent Floor',
		'parent_item_colon'          => 'Parent Floor:',
		'new_item_name'              => 'New Floor',
		'add_new_item'               => 'Add New Floor',
		'edit_item'                  => 'Edit Floor',
		'update_item'                => 'Update Floor',
		'view_item'                  => 'View Floor',
		'separate_items_with_commas' => 'Separate floors with commas',
		'add_or_remove_items'        => 'Add or remove floors',
		'choose_from_most_used'      => 'Choose from the most used floors',
		'popular_items'              => 'Popular Floors',
		'search_items'               => 'Search floors',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No foors',
		'items_list'                 => 'Floors list',
		'items_list_navigation'      => 'Floors list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'floor', array( 'employee' ), $args );

}
add_action( 'init', 'floor_taxonomy', 0 );


// Register Custom Taxonomy
function supervisor_taxonomy() {

	$labels = array(
		'name'                       => 'Supervisors',
		'singular_name'              => 'Supervisor',
		'menu_name'                  => 'Supervisors',
		'all_items'                  => 'All Supervisors',
		'parent_item'                => 'Parent Supervisor',
		'parent_item_colon'          => 'Parent Supervisor:',
		'new_item_name'              => 'New Supervisor',
		'add_new_item'               => 'Add New Supervisor',
		'edit_item'                  => 'Edit Supervisor',
		'update_item'                => 'Update Supervisor',
		'view_item'                  => 'View Supervisor',
		'separate_items_with_commas' => 'Separate supervisors with commas',
		'add_or_remove_items'        => 'Add or remove supervisors',
		'choose_from_most_used'      => 'Choose from the most used supervisors',
		'popular_items'              => 'Popular Supervisors',
		'search_items'               => 'Search Supervisors',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Supervisors',
		'items_list'                 => 'Supervisors list',
		'items_list_navigation'      => 'Supervisors list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'description'           	 => 'Select only one supervisor.',
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' 					 => array('slug' => 'supervisor', 'with_front' => false),
	);
	register_taxonomy( 'supervisor', array( 'employee' ), $args );

}
add_action( 'init', 'supervisor_taxonomy', 0 );



/**
 * Prepend taxonomy descriptions to taxonomy metaboxes
 */
function append_taxonomy_descriptions_metabox() {
    $post_types = array( 'employee' );          // Array of Accepted Post Types
    $screen     = get_current_screen();     // Get current user screen

    if( 'edit' !== $screen->parent_base ) { // IF we're not on an edit page - just return
        return;
    }

    // IF the current post type is in our array
    if( in_array( $screen->post_type, $post_types ) ) {
        $taxonomies = get_object_taxonomies( $screen->post_type, 'objects' );   // Grab all taxonomies for that post type

        // Ensure taxonomies are not empty
        if( ! empty( $taxonomies ) ) : ?>

            <script type="text/javascript">

              <?php foreach( $taxonomies as $taxonomy ) : ?>

                var tax_slug = '<?php echo $taxonomy->name; ?>';
                var tax_desc = '<?php echo $taxonomy->description; ?>';

                // Add the description via jQuery
                jQuery( '#' + tax_slug + 'div div.inside' ).prepend( '<p>' + tax_desc + '</p>' );

              <?php endforeach; ?>

            </script>

        <?php endif;
    }
}
add_action( 'admin_footer', 'append_taxonomy_descriptions_metabox' );






// add custom meta boxes

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function employee_title_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function employee_title_add_meta_box() {
	add_meta_box(
		'employee_title-employee-title',
		__( 'Employee Title', 'employee_title' ),
		'employee_title_html',
		'employee',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'employee_title_add_meta_box' );

function employee_title_html( $post) {
	wp_nonce_field( '_employee_title_nonce', 'employee_title_nonce' ); ?>

	<p>
		<label style="width:100%;" for="employee_title_title"><?php _e( 'Title', 'employee_title' ); ?></label><br>
		<input style="width:100%;" type="text" name="employee_title_title" id="employee_title_title" value="<?php echo employee_title_get_meta( 'employee_title_title' ); ?>">
	</p><?php
}

function employee_title_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['employee_title_nonce'] ) || ! wp_verify_nonce( $_POST['employee_title_nonce'], '_employee_title_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['employee_title_title'] ) )
		update_post_meta( $post_id, 'employee_title_title', esc_attr( $_POST['employee_title_title'] ) );
}
add_action( 'save_post', 'employee_title_save' );

/*
	Usage: employee_title_get_meta( 'employee_title_title' )
*/


/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function contact_information_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function contact_information_add_meta_box() {
	add_meta_box(
		'contact_information-contact-information',
		__( 'Contact Information', 'contact_information' ),
		'contact_information_html',
		'employee',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'contact_information_add_meta_box' );

function contact_information_html( $post) {
	wp_nonce_field( '_contact_information_nonce', 'contact_information_nonce' ); ?>

	<p>
		<label style="width:100%;" for="contact_information_email"><?php _e( 'Email', 'contact_information' ); ?></label><br>
		<input style="width:100%;" type="text" name="contact_information_email" id="contact_information_email" value="<?php echo contact_information_get_meta( 'contact_information_email' ); ?>">
	</p>	<p>
		<label style="width:100%;" for="contact_information_phone_extention"><?php _e( 'Phone Extention', 'contact_information' ); ?></label><br>
		<input style="width:100%;" type="text" name="contact_information_phone_extention" id="contact_information_phone_extention" value="<?php echo contact_information_get_meta( 'contact_information_phone_extention' ); ?>">
	</p><?php
}

function contact_information_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['contact_information_nonce'] ) || ! wp_verify_nonce( $_POST['contact_information_nonce'], '_contact_information_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['contact_information_email'] ) )
		update_post_meta( $post_id, 'contact_information_email', esc_attr( $_POST['contact_information_email'] ) );
	if ( isset( $_POST['contact_information_phone_extention'] ) )
		update_post_meta( $post_id, 'contact_information_phone_extention', esc_attr( $_POST['contact_information_phone_extention'] ) );
}
add_action( 'save_post', 'contact_information_save' );

/*
	Usage: contact_information_get_meta( 'contact_information_email' )
	Usage: contact_information_get_meta( 'contact_information_phone_extention' )
*/



/* Hierarchy Functions */
	function get_name($group){
		foreach($group as $employee) {
			$slug=$employee->post_name;
			echo '<h4>' . get_the_title($employee) . ' <a href="../#' . $slug .'"><i class="fa fa-info-circle"></i></a></h4>';
		}
	};

	function name_and_position($group){
		foreach($group as $employee) {
			$meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
			$slug=$employee->post_name;
			echo '<h5 class="heading group-heading">' . $job_title . '</h5>';
			echo '<h4>' . get_the_title($employee) . ' <a href="../#' . $slug .'"><i class="fa fa-info-circle"></i></a></h4>';
			
		}
	}

	function execs($group, $position_title){
		if (!empty($group)) :?>
			<div class="flex tier-3-4-row">
				<div class="col-xs-4 tier-3 empty"></div>
				<div class="col-xs-6 col-sm-4 tier-4 execs">
					<h5 class="heading group-heading"><?php echo $position_title ?></h5>
					<ul>
						<?php get_name($group) ?>
					</ul>
				</div>
				<div class="col-xs-2 col-sm-4 blank"></div>
			</div>
		<?php endif; 
	}


	function assc($group, $position_title){
		if (!empty($group)) :?>
			<div class="flex tier-3-4-row">
				<div class="col-xs-6 col-sm-7 tier-3 empty"></div>
				<div class="col-xs-6 col-sm-5 tier-4 execs">
					<h5 class="heading group-heading"><?php echo $position_title ?></h5>
					<ul>
						<?php get_name($group) ?>
					</ul>
				</div>
			</div>
		<?php endif; 
	}

	function misc($group){
		if (!empty($group)) :?>
			<div class="flex tier-3-4-row">
				<div class="col-xs-4 tier-3 empty"></div>
				<div class="col-xs-6 col-sm-4 tier-4 execs">
					<ul>
						<?php name_and_position($group) ?>
					</ul>
				</div>
				<div class="col-xs-2 col-sm-4 blank"></div>
			</div>
		<?php endif; 
	}

	function get_employees($slug){
			return get_posts( 
				array(
				 'post_type' => 'employee',
				 'supervisor' => "$slug",
				 'posts_per_page'=>-1,
				 'orderby'=> 'date',
				 'order'=> 'ASC',
			));
	}



	function slug($employee){
		    $meta = get_metadata('post', $employee->ID);
			$job_title = $meta['employee_title_title'][0];
		    $slug=$employee->post_name;
		    $supervisees = get_employees($slug);

	}

	function media($group, $group_title) {
		if (!empty($group)) :?>
		<div class="tier-3-4-row flex">
			<div class="col-xs-4 col-sm-5 tier-3 empty"></div>
			<div class="col-xs-8 col-sm-7 tier-4">
				<h5 class="heading group-heading"><?php echo $group_title ?></h5>
				<ul>
					<?php 
						get_name($group);

						?>
				</ul>
			</div>
		</div>
	<?php endif;
	}

function snap($group, $group_title) { ?>
	<div class="row branch flex">
		<div class="col-sm-6 col-xs-12 tier-2 flex flex-col no-children">
			<h3><?php echo $group_title ?></h3>
			<?php if(!empty($group)) {
				foreach ($group as $post) : 
					$SNPposition = get_field('snapnation_job_title');
					$meta = get_metadata('post', $post->ID);
					$job_title = $meta['employee_title_title'][0];

					if ($SNPposition) {
						$title = $SNPposition;
					} else {
						$title = $job_title;
					}
					?>

					<h4><?php echo get_the_title($post);?> <a href="../#<?php echo $slug ?>"> <i class="fa fa-info-circle"></i></a> <span class="sub-heading-2"><?php echo $title ?></span></h4> 
				<?php endforeach;
			} else { ?>
			<h3>TBD</h3>

			<?php }; ?>
		</div>
		<div class="col-sm-6 hidden-xs"></div>
	</div>
<?php } ?>

