<?php
function velou_register_custom_post_types() {
// Register Stylists
$labels = array(
    'name'                  => _x( 'Stylist', 'post type general name' ),
    'singular_name'         => _x( 'Stylist', 'post type singular name'),
    'menu_name'             => _x( 'Stylists', 'admin menu' ),
    'name_admin_bar'        => _x( 'Stylist', 'add new on admin bar' ),
    'add_new'               => _x( 'Add New', 'stylist' ),
    'add_new_item'          => __( 'Add New Stylist' ),
    'new_item'              => __( 'New Stylist' ),
    'edit_item'             => __( 'Edit Stylist' ),
    'view_item'             => __( 'View Stylist' ),
    'all_items'             => __( 'All Stylists' ),
    'search_items'          => __( 'Search Stylists' ),
    'parent_item_colon'     => __( 'Parent Stylists:' ),
    'not_found'             => __( 'No stylists found.' ),
    'not_found_in_trash'    => __( 'No stylists found in Trash.' ),
    'archives'              => __( 'Stylist Archives'),
    'insert_into_item'      => __( 'Insert into stylist'),
    'uploaded_to_this_item' => __( 'Uploaded to this stylist'),
    'filter_item_list'      => __( 'Filter stylists list'),
    'items_list_navigation' => __( 'Stylists list navigation'),
    'items_list'            => __( 'Stylists list'),
    'featured_image'        => __( 'Stylist featured image'),
    'set_featured_image'    => __( 'Set stylist featured image'),
    'remove_featured_image' => __( 'Remove stylist featured image'),
    'use_featured_image'    => __( 'Use as featured image'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'stylists' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-groups',
    'supports'           => array( 'title', 'thumbnail'),
);

register_post_type( 'velou-stylist', $args );

// Register Services CPT

$labels = array(
    'name'                  => _x( 'Service', 'post type general name' ),
    'singular_name'         => _x( 'Service', 'post type singular name'),
    'menu_name'             => _x( 'Services', 'admin menu' ),
    'name_admin_bar'        => _x( 'Service', 'add new on admin bar' ),
    'add_new'               => _x( 'Add New', 'service' ),
    'add_new_item'          => __( 'Add New Service' ),
    'new_item'              => __( 'New Service' ),
    'edit_item'             => __( 'Edit Service' ),
    'view_item'             => __( 'View Service' ),
    'all_items'             => __( 'All Services' ),
    'search_items'          => __( 'Search Services' ),
    'parent_item_colon'     => __( 'Parent Services:' ),
    'not_found'             => __( 'No services found.' ),
    'not_found_in_trash'    => __( 'No services found in Trash.' ),
    'insert_into_item'      => __( 'Insert into service'),
    'uploaded_to_this_item' => __( 'Uploaded to this service'),
    'filter_item_list'      => __( 'Filter services list'),
    'items_list_navigation' => __( 'Services list navigation'),
    'items_list'            => __( 'Services list'),
    'featured_image'        => __( 'Service featured image'),
    'set_featured_image'    => __( 'Set service featured image'),
    'remove_featured_image' => __( 'Remove service featured image'),
    'use_featured_image'    => __( 'Use as featured image'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'service' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-id-alt',
    'supports'           => array( 'title' ),
);

register_post_type( 'velou-service', $args );

// Register Gallery CPT

$labels = array(
    'name'                  => _x( 'Gallery', 'post type general name' ),
    'singular_name'         => _x( 'Gallery', 'post type singular name'),
    'menu_name'             => _x( 'Gallery', 'admin menu' ),
    'name_admin_bar'        => _x( 'Gallery', 'add new on admin bar' ),
    'add_new'               => _x( 'Add New', 'gallery' ),
    'add_new_item'          => __( 'Add New Gallery' ),
    'new_item'              => __( 'New Gallery' ),
    'edit_item'             => __( 'Edit Gallery' ),
    'view_item'             => __( 'View Gallery' ),
    'all_items'             => __( 'All Gallery' ),
    'search_items'          => __( 'Search Gallery' ),
    'parent_item_colon'     => __( 'Parent Gallery:' ),
    'not_found'             => __( 'No gallery found.' ),
    'not_found_in_trash'    => __( 'No gallery found in Trash.' ),
    'insert_into_item'      => __( 'Insert into gallery'),
    'uploaded_to_this_item' => __( 'Uploaded to this gallery'),
    'filter_item_list'      => __( 'Filter gallery list'),
    'items_list_navigation' => __( 'Gallery list navigation'),
    'items_list'            => __( 'Gallery list'),
    'featured_image'        => __( 'Gallery featured image'),
    'set_featured_image'    => __( 'Set gallery featured image'),
    'remove_featured_image' => __( 'Remove gallery featured image'),
    'use_featured_image'    => __( 'Use as featured image'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'gallery' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-format-gallery',
    'supports'           => array( 'title', 'thumbnail'),
);

register_post_type( 'velou-gallery', $args );

//Register Testimonial Posts Type
$labels = array(
    'name'               => _x( 'Testimonials', 'post type general name'  ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name'  ),
    'menu_name'          => _x( 'Testimonials', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'testimonial' ),
    'add_new_item'       => __( 'Add New Testimonial' ),
    'new_item'           => __( 'New Testimonial' ),
    'edit_item'          => __( 'Edit Testimonial' ),
    'view_item'          => __( 'View Testimonial'  ),
    'all_items'          => __( 'All Testimonials' ),
    'search_items'       => __( 'Search Testimonials' ),
    'parent_item_colon'  => __( 'Parent Testimonials:' ),
    'not_found'          => __( 'No testimonials found.' ),
    'not_found_in_trash' => __( 'No testimonials found in Trash.' ),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'testimonials' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-heart',
    'supports'           => array( 'title', 'thumbnail' ),
    'template'           => array( array( 'core/quote' ) ),
    'template_lock'      => 'all'
);

register_post_type( 'velou-testimonial', $args );

//Register Brand List Posts Type
$labels = array(
    'name'               => _x( 'Brand List', 'post type general name'  ),
    'singular_name'      => _x( 'Brand List', 'post type singular name'  ),
    'menu_name'          => _x( 'Brand List', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Brand List', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'brand list' ),
    'add_new_item'       => __( 'Add New Brand List' ),
    'new_item'           => __( 'New Brand List' ),
    'edit_item'          => __( 'Edit Brand List' ),
    'view_item'          => __( 'View Brand List'  ),
    'all_items'          => __( 'All Brand List' ),
    'search_items'       => __( 'Search Brand List' ),
    'parent_item_colon'  => __( 'Parent Brand List:' ),
    'not_found'          => __( 'No brand list found.' ),
    'not_found_in_trash' => __( 'No brand list found in Trash.' ),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'brand-list' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-columns',
    'supports'           => array( 'title', 'thumbnail' ),
    
);

register_post_type( 'velou-brand-list', $args );





}
add_action( 'init', 'velou_register_custom_post_types' );

// Taxonomies (categories and tags)

function velou_register_taxonomies() {

    // Add Stylist Speciality taxonomy

    $labels = array(
        'name'              => _x( 'Stylist Speciality', 'taxonomy general name' ),
        'singular_name'     => _x( 'Stylist Speciality', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Stylist Speciality' ),
        'all_items'         => __( 'All Stylist Speciality' ),
        'parent_item'       => __( 'Parent Stylist Speciality' ),
        'parent_item_colon' => __( 'Parent Stylist Speciality:' ),
        'edit_item'         => __( 'Edit Stylist Speciality' ),
        'view_item'         => __( 'Vview Stylist Speciality' ),
        'update_item'       => __( 'Update Stylist Speciality' ),
        'add_new_item'      => __( 'Add New Stylist Speciality' ),
        'new_item_name'     => __( 'New Stylist Speciality Name' ),
        'menu_name'         => __( 'Stylist Speciality' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'stylist-speciality' ),
    );
    register_taxonomy( 'velou-stylist-speciality', array( 'velou-stylist' ), $args );

    // Add Service Type taxonomy

    $labels = array(
        'name'              => _x( 'Service Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Service Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Service Type' ),
        'all_items'         => __( 'All Service Type' ),
        'parent_item'       => __( 'Parent Service Type' ),
        'parent_item_colon' => __( 'Parent Service Type:' ),
        'edit_item'         => __( 'Edit Service Type' ),
        'view_item'         => __( 'Vview Service Type' ),
        'update_item'       => __( 'Update Service Type' ),
        'add_new_item'      => __( 'Add New Service Type' ),
        'new_item_name'     => __( 'New Service Type Name' ),
        'menu_name'         => __( 'Service Type' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'service-type' ),
    );
    register_taxonomy( 'velou-service-type', array( 'velou-gallery' ), $args );

    // Add Stylist Name taxonomy

    $labels = array(
        'name'              => _x( 'Stylist Name', 'taxonomy general name' ),
        'singular_name'     => _x( 'Stylist Name', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Stylist Name' ),
        'all_items'         => __( 'All Stylist Name' ),
        'parent_item'       => __( 'Parent Stylist Name' ),
        'parent_item_colon' => __( 'Parent Stylist Name:' ),
        'edit_item'         => __( 'Edit Stylist Name' ),
        'view_item'         => __( 'Vview Stylist Name' ),
        'update_item'       => __( 'Update Stylist Name' ),
        'add_new_item'      => __( 'Add New Stylist Name' ),
        'new_item_name'     => __( 'New Stylist Name Name' ),
        'menu_name'         => __( 'Stylist Name' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'stylist-name' ),
    );
    register_taxonomy( 'velou-stylist-name', array( 'velou-testimonial' ), $args );
}

add_action( 'init', 'velou_register_taxonomies');


// Flush permalinks after activating the theme
function velou_rewrite_flush() {
    velou_register_custom_post_types();
    velou_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'velou_rewrite_flush' );
