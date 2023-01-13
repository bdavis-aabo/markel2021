<?php
// Theme Functions

/* Remove Admin Bar from Frontend */
// add_action('after_setup_theme', 'remove_admin_bar');
// function remove_admin_bar(){
//   show_admin_bar(false);
// }

if (function_exists('add_theme_support')){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true);  		// Large Thumbnail
  add_image_size('medium', 250, '', true); 		// Medium Thumbnail
  add_image_size('small', 125, '', true);  		// Small Thumbnail
  add_image_size('custom-size', 700, 200, true);  // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'wpt_setup');
if(!function_exists('wpt_setup')):
  function wpt_setup() {
    register_nav_menu('primary', __('Primary Navigation', 'wptmenu'));
  }
endif;

function wpt_register_js(){
  if( !is_admin()){
    //wp_deregister_script('jquery');

    wp_enqueue_script('jquery.min', '//code.jquery.com/jquery-3.5.1.min.js', 'jquery', '', true);
    wp_enqueue_script('popper.min', '//cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.bundle.min', '//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.aos.min', '//unpkg.com/aos@next/dist/aos.js', 'jquery', '', true);
    wp_enqueue_script('fontawesome.min','//kit.fontawesome.com/4a3ca8ad33.js','','',true);
    wp_enqueue_script('js-cookie.min', '//cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js', '', '', true);
		wp_enqueue_script('mapbox.min', '//api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js', 'jquery', '', true);
    wp_enqueue_script(
      'jquery.extras.min',
      get_template_directory_uri() . '/assets/js/main.min.js',
      array(),
      filemtime(get_template_directory().'/assets/js/main.min.js'),
      true
    );
  }
}

function wpt_map_scripts(){
  if(is_page('communities')){
    wp_enqueue_script(
      'maps.min',
      get_template_directory_uri() . '/assets/js/maps.min.js',
      array(),
      filemtime(get_template_directory() . '/assets/js/maps.min.js'),
      true
    );
	}
	if(is_page_child(10)){
		wp_enqueue_script(
	    'commMaps.min',
	    get_template_directory_uri() . '/assets/js/commMaps.min.js',
	    array(),
	    filemtime(get_template_directory() . '/assets/js/commMaps.min.js'),
	    true
	  );
	}
}

function wpt_register_css(){
  wp_enqueue_style('bootstrap.min', '//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
  wp_enqueue_style('aos.min','//unpkg.com/aos@next/dist/aos.css');
	wp_enqueue_style('mapbox.min', '//api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css');
  wp_enqueue_style(
    'main.min',
    get_template_directory_uri() . '/assets/css/main.min.css',
    array(),
    filemtime(get_stylesheet_directory().'/assets/css/main.min.css'),
    'all'
  );
}
add_action('init','wpt_register_js');
add_action('wp_enqueue_scripts', 'wpt_register_css');
add_action('wp_enqueue_scripts','wpt_map_scripts');

// Add Class to Images posted on pages
function add_responsive_class($class){
  $class .= ' img-fluid';
	return $class;
}
add_filter('get_image_tag_class', 'add_responsive_class');

// CUSTOM POST TYPES
add_action('init','create_post_type');
function create_post_type(){
  // Available Homes by Community
  register_post_type('models', array(
	  'label'             => __('Homeplans'),
	  'singular_label' 	  => __('Homeplan'),
	  'public' 			      => true,
	  'show_ui' 			    => true,
	  'capability_type' 	=> 'post',
	  'hierarchical' 		  => true,
	  'rewrite' 			    => array('slug' => 'homeplans'),
	  'supports' 			    => array('title','author','excerpt','thumbnail','custom-fields','order','page-attributes'),
    'menu_position' 	  => 21,
    'menu_icon'			    => 'dashicons-admin-home',
    'has_archive' 		  => true,
  ));

  // Quick Move-In Homes -> Available Now
  // register_post_type('qmihomes', array(
	//   'label' 				    => __('Quick Move-Ins'),
	//   'singular_label' 	  => __('Quick Move-In'),
	//   'public' 			      => true,
	//   'show_ui' 			    => true,
	//   'capability_type' 	=> 'post',
	//   'hierarchical' 		  => true,
	//   'rewrite' 			    => array('slug' => 'qmihomes'),
	//   'supports' 			    => array('title','author','excerpt','thumbnail','custom-fields','order','page-attributes'),
	//   'menu_position' 		=> 22,
	//   'menu_icon'			    => 'dashicons-admin-home',
	//   'has_archive' 		  => true,
  // ));

  flush_rewrite_rules();
}

function location_taxonomies(){
	$_labels = array(
		'name' 				      => 	_x('Communities', 'taxonomy general name'),
		'singular_name'		  => 	_x('Community', 'taxonomy singular name'),
		'search_items'		  =>	__('Search Communities'),
		'all_items'			    =>	__('All Communities'),
		'parent_item'		    =>	__('Parent Community'),
		'parent_item_colon'	=>	__('Parent Community:'),
		'edit_item'			    =>	__('Edit Community'),
		'update_item'		    =>	__('Update Community'),
		'add_new_item'		  =>	__('Add New Community'),
		'new_item_name'		  =>	__('New Community Name'),
		'menu_name'			    =>	__('Communities'),
		);
	$_args = array(
		'hierarchical'		  =>	true,
		'labels'			      =>	$_labels,
		'show_ui'			      =>	true,
		'show_admin_column'	=>	true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'			    =>	true,
		'rewrite'			      =>	array('slug' => 'community'),
		);
	register_taxonomy('community', array('models','qmihomes'), $_args);
}
add_action('init', 'location_taxonomies', 0);

// Widgets
if(function_exists('register_sidebar')){
  register_sidebar(array(
    'name'          => __('Footer SEO Text', 'footer-seo'),
	  'description'   => __('Widget to display seo content on homepage.', 'footer-seo'),
	  'id'            => 'footer-seo',
	  'before_widget' => '<div class="footer-contents">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3>',
	  'after_title'   => '</h3>'
  ));

  register_sidebar(array(
		'name'            => __('Contact Form Address', 'contact-address'),
		'description'     => __('Displays address information on contact page.', 'contact-address'),
		'id'              => 'contact-address',
		'before_widget'   => '',
		'after_widget'    => '',
		'before_title'    => '<h3>',
		'after_title'     => '</h3>'
	));

  register_sidebar(array(
		'name'			      =>	__('News Sidebar', 'news-sidebar'),
		'description'	    =>	__('Displays categories, archives and recent posts', 'news-sidebar'),
		'id'			        =>	'news-sidebar',
		'class'			      =>	'sidebar-menu',
		'before_widget'	  =>	'<div class="news-sidebar">',
		'after_widget'	  =>	'</div>',
		'before_title'	  =>	'<h3 class="green-txt">',
		'after_title'	    =>	'</h3>'
	));

  register_sidebar(array(
		'name'			      =>	__('Homepage Popup', 'homepage-popup'),
		'description'	    =>	__('Displays a popup message on the homepage', 'homepage-popup'),
		'id'			        =>	'homepage-popup',
		'class'			      =>	'popup-content',
		'before_widget'	  =>	'<div class="covid-sidebar">',
		'after_widget'	  =>	'</div>',
		'before_title'	  =>	'<h3 class="green-txt">',
		'after_title'	    =>	'</h3>'
	));
}

if(function_exists('register_sidebar'))
{
  register_sidebar(array(
		'name'            => __('Contact Form Address', 'contact-address'),
		'description'     => __('Displays address information on contact page & footer.', 'contact-address'),
		'id'              => 'contact-address',
		'before_widget'   => '',
		'after_widget'    => '',
		'before_title'    => '<h3>',
		'after_title'     => '</h3>'
	));

  register_sidebar(array(
    'name'            =>  __('Contact Form Disclaimer', 'contact-disclaimer'),
    'description'     =>  __('Display disclaimer content below forms', 'contact-disclaimer'),
    'id'              =>  'contact-disclaimer',
    'before_widget'   => '',
		'after_widget'    => '',
		'before_title'    => '<h3>',
		'after_title'     => '</h3>'
  ));
}

function custom_more_link(){
  return '<a class="more-link btn btn-red" href="'.get_permalink().'">Read More <i class="fa fa-chevron-right"></i></a>';
}
add_filter('the_content_more_link','custom_more_link');

function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}

add_action('pre_get_posts', 'change_post_order');
function change_post_order($query){
  if(is_archive()){
    $query->set('order', 'DESC');
    $query->set('orderby', 'date');
  }
}

function is_page_child($pid){
	global $post;
	$anc = get_post_ancestors($post->ID);
	foreach($anc as $ancestor){
		if(is_page() && $ancestor == $pid){
			return true;
		}
	}
	if(is_page() && (is_page($pid))){
		return true;
	} else {
		return false;
	}
}
















?>
