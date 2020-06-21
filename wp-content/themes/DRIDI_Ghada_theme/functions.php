<?php

function load_stylesheets(){


    
    wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css',
    array(),false,'all');
    wp_enqueue_style('bootstrap');


        wp_register_style('style',get_template_directory_uri().'/style.css',
        array(),false,'all');
        wp_enqueue_style('style');

}

add_action('wp_enqueue_scripts','load_stylesheets');


function include_jquery(){

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery',get_template_directory_uri().'/js/jquery-3.3.1.js','',1,
    true);

    add_action('wp_enqueue_scripts','jquery');
}

add_action('wp_enqueue_scripts','include_jquery');



function loadjs(){

    wp_register_script('customjs', get_template_directory_uri(). 'js/scripts.js','',1,true );
    wp_enqueue_script('customjs');

}

add_action('wp_enqueue_scripts','loadjs');

add_theme_support('menus');

add_theme_support('post-thumbnails');

register_nav_menus(

    array(

            'top-menu' => __('Top Menu','theme'),
            'footer-menu' => __('Footer Menu', 'theme'),

    )
    );

    add_image_size('smallest',300,300,true);
	add_image_size('largest',800,800,true);
	
	
add_filter('wp_nav_menu_items', 'gkp_add_index', 10, 2);
function gkp_add_index($items, $args) {
      ob_start();
      ?>
      <li id="home_link"><a href="<?php echo home_url(); ?> ">Concert & Artists</a></li>
      <li id="archive_artist"><a href="<?php echo get_post_type_archive_link('artists'); ?> ">  List of artists</a></li>
      <li id="archive_concert"><a href="<?php echo  get_post_type_archive_link('concerts'); ?> "> List of concerts</a></li>
      <?php
    	$output = ob_get_clean();
    return $output . $items;
}



// Custom Taxonomy : Genre musical
function Genre_musical() {

	$labels = array(
		'name'                       => _x( 'genre', 'Taxonomy General Name', 'tax_domain' ),
		'singular_name'              => _x( 'genre', 'Taxonomy Singular Name', 'tax_domain' ),
		'menu_name'                  => __( 'Genre', 'tax_domain' ),
		'all_items'                  => __( 'All genres', 'tax_domain' ),
		'parent_item'                => __( 'Parent Item', 'tax_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'tax_domain' ),
		'new_item_name'              => __( 'New genre', 'tax_domain' ),
		'add_new_item'               => __( 'Add new genre', 'tax_domain' ),
		'edit_item'                  => __( 'Edit genre', 'tax_domain' ),
		'update_item'                => __( 'Update genre', 'tax_domain' ),
		'view_item'                  => __( 'View genre', 'tax_domain' ),
		'separate_items_with_commas' => __( 'Separate genres with \",\"', 'tax_domain' ),
		'add_or_remove_items'        => __( 'Add or remove genre', 'tax_domain' ),
		'choose_from_most_used'      => __( 'Choose from most used genres', 'tax_domain' ),
		'popular_items'              => __( 'Popular genres', 'tax_domain' ),
		'search_items'               => __( 'Search genre', 'tax_domain' ),
		'not_found'                  => __( 'Genre not Found', 'tax_domain' ),
		'no_terms'                   => __( 'No genre', 'tax_domain' ),
		'items_list'                 => __( 'Liste of genres', 'tax_domain' ),
		'items_list_navigation'      => __( 'Genres list navigation', 'tax_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'genre', array( 'concerts', 'artists' ), $args );

}
add_action( 'init', 'Genre_musical', 0 );


    // Register Custom Post Type
function concerts() {

	$labels = array(
		'name'                  => _x( 'Concerts', 'Post Type General Name', 'concert_domain' ),
		'singular_name'         => _x( 'Concert', 'Post Type Singular Name', 'concert_domain' ),
		'menu_name'             => __( 'Concerts', 'concert_domain' ),
		'name_admin_bar'        => __( 'Concert', 'concert_domain' ),
		'archives'              => __( 'Concert Archives', 'concert_domain' ),
		'attributes'            => __( 'Concert Attributes', 'concert_domain' ),
		'parent_item_colon'     => __( 'Parent Concert:', 'concert_domain' ),
		'all_items'             => __( 'All Concerts', 'concert_domain' ),
		'add_new_item'          => __( 'Add New Concert', 'concert_domain' ),
		'add_new'               => __( 'Add New', 'concert_domain' ),
		'new_item'              => __( 'New Concert', 'concert_domain' ),
		'edit_item'             => __( 'Edit Concert', 'concert_domain' ),
		'update_item'           => __( 'Update Concert', 'concert_domain' ),
		'view_item'             => __( 'View Concert', 'concert_domain' ),
		'view_items'            => __( 'View Concerts', 'concert_domain' ),
		'search_items'          => __( 'Search Concert', 'concert_domain' ),
		'not_found'             => __( 'Not found', 'concert_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'concert_domain' ),
		'featured_image'        => __( 'Featured Image', 'concert_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'concert_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'concert_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'concert_domain' ),
		'insert_into_item'      => __( 'Insert into Concert', 'concert_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Concert', 'concert_domain' ),
		'items_list'            => __( 'Concerts list', 'concert_domain' ),
		'items_list_navigation' => __( 'Concerts list navigation', 'concert_domain' ),
		'filter_items_list'     => __( 'Filter Concerts list', 'concert_domain' ),
	);
	$args = array(
		'label'                 => __( 'Concert', 'concert_domain' ),
		'description'           => __( 'Creates concerts', 'concert_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'concerts', $args );

}
add_action( 'init', 'concerts', 0 );

// Register Custom Post Type
function artists() {

	$labels = array(
		'name'                  => _x( 'Artists', 'Post Type General Name', 'artist_domain' ),
		'singular_name'         => _x( 'Artist', 'Post Type Singular Name', 'artist_domain' ),
		'menu_name'             => __( 'Artists', 'artist_domain' ),
		'name_admin_bar'        => __( 'Artist', 'artist_domain' ),
		'archives'              => __( 'Artist Archives', 'artist_domain' ),
		'attributes'            => __( 'Artist Attributes', 'artist_domain' ),
		'parent_item_colon'     => __( 'Parent Artist:', 'artist_domain' ),
		'all_items'             => __( 'All Artists', 'artist_domain' ),
		'add_new_item'          => __( 'Add New Artist', 'artist_domain' ),
		'add_new'               => __( 'Add New', 'artist_domain' ),
		'new_item'              => __( 'New Artist', 'artist_domain' ),
		'edit_item'             => __( 'Edit Artist', 'artist_domain' ),
		'update_item'           => __( 'Update Artist', 'artist_domain' ),
		'view_item'             => __( 'View Artist', 'artist_domain' ),
		'view_items'            => __( 'View Artists', 'artist_domain' ),
		'search_items'          => __( 'Search Artist', 'artist_domain' ),
		'not_found'             => __( 'Not found', 'artist_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'artist_domain' ),
		'featured_image'        => __( 'Featured Image', 'artist_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'artist_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'artist_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'artist_domain' ),
		'insert_into_item'      => __( 'Insert into Artist', 'artist_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Artist', 'artist_domain' ),
		'items_list'            => __( 'Artists list', 'artist_domain' ),
		'items_list_navigation' => __( 'Artists list navigation', 'artist_domain' ),
		'filter_items_list'     => __( 'Filter Artists list', 'artist_domain' ),
	);
	$args = array(
		'label'                 => __( 'Artist', 'artist_domain' ),
		'description'           => __( 'Creates artists', 'artist_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'artists', $args );

}
add_action( 'init', 'artists', 0 );




function mostRecentConcerts(){
	$args = array(
	  'post_type' => 'concerts',
	  'posts_per_page' => 2,
	  'orderby' => 'date',
	  'order' => 'DESC'
	);
	$query = new WP_Query($args);
	ob_start();
	?>
	<h3 class="mt-3">Most recent concerts</h3>
	<?php
	foreach ($query -> posts as $post) :
	  ?>
	  <p>
		<a href="<?php echo get_the_permalink($post); ?>">
		  <?php  echo get_the_title($post); ?>
		</a>
	  </p>
	  <?php
	endforeach;
	$output = ob_get_clean();
	return $output;
  }
  add_shortcode('mostRecentConcerts', 'mostRecentConcerts');
  
  
  ?>
  