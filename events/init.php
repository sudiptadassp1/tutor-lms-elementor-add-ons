<?php
namespace Events;

final class Course_Events {

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

    public function __construct(){
        add_action('init', [$this, 'register_event_post_type']); // Register event post type
        add_action('init', [$this, 'register_event_post_type_taxonomy']); // Register event post type taxonomy
    }

    public function register_event_post_type(){
        $labels = array(
            'name'                  => _x( 'Events', 'tutor' ),
            'singular_name'         => _x( 'Event', 'tutor' ),
            'menu_name'             => _x( 'Events', 'tutor' ),
            'name_admin_bar'        => _x( 'Event', 'tutor' ),
            'add_new'               => __( 'Add New', 'tutor' ),
            'add_new_item'          => __( 'Add New Event', 'tutor' ),
            'new_item'              => __( 'New Event', 'tutor' ),
            'edit_item'             => __( 'Edit Event', 'tutor' ),
            'view_item'             => __( 'View Event', 'tutor' ),
            'all_items'             => __( 'All Events', 'tutor' ),
            'search_items'          => __( 'Search Events', 'tutor' ),
            'parent_item_colon'     => __( 'Parent Events:', 'tutor' ),
            'not_found'             => __( 'No Events found.', 'tutor' ),
            'not_found_in_trash'    => __( 'No Events found in Trash.', 'tutor' ),
            'featured_image'        => _x( 'Event Cover Image', 'tutor' ),
            'set_featured_image'    => _x( 'Set cover image', 'tutor' ),
            'remove_featured_image' => _x( 'Remove cover image', 'tutor' ),
            'use_featured_image'    => _x( 'Use as cover image', 'tutor' ),
            'archives'              => _x( 'Event archives', 'tutor' ),
            'insert_into_item'      => _x( 'Insert into Event', 'tutor' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Event', 'tutor' ),
            'filter_items_list'     => _x( 'Filter Events list', 'tutor' ),
            'items_list_navigation' => _x( 'Events list navigation', 'tutor' ),
            'items_list'            => _x( 'Events list', 'tutor' ),
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'course_event' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
        );
     
        register_post_type( 'course_event', $args );
    }

    public function register_event_post_type_taxonomy(){
        // Register Event Category
        $labels = array(
            'name'              => _x( 'Event Categories', 'tutor' ),
            'singular_name'     => _x( 'Event Category', 'tutor' ),
            'search_items'      => __( 'Search Event Categories', 'tutor' ),
            'all_items'         => __( 'All Event Categories', 'tutor' ),
            'parent_item'       => __( 'Parent Event Category', 'tutor' ),
            'parent_item_colon' => __( 'Parent Event Category:', 'tutor' ),
            'edit_item'         => __( 'Edit Event Category', 'tutor' ),
            'update_item'       => __( 'Update Event Category', 'tutor' ),
            'add_new_item'      => __( 'Add New Event Category', 'tutor' ),
            'new_item_name'     => __( 'New Event Category Name', 'tutor' ),
            'menu_name'         => __( 'Event Category', 'tutor' ),
        );
     
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'event_category' ),
        );
     
        register_taxonomy( 'event_category', array( 'course_event' ), $args );
     
        unset( $args );
        unset( $labels );


        // Register Event Tags
        $labels = array(
            'name'                       => _x( 'Event Tags', 'tutor' ),
            'singular_name'              => _x( 'Event Tag', 'tutor' ),
            'search_items'               => __( 'Search Event Tags', 'tutor' ),
            'popular_items'              => __( 'Popular Event Tags', 'tutor' ),
            'all_items'                  => __( 'All Event Tags', 'tutor' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Event Tag', 'tutor' ),
            'update_item'                => __( 'Update Event Tag', 'tutor' ),
            'add_new_item'               => __( 'Add New Event Tag', 'tutor' ),
            'new_item_name'              => __( 'New Event Tag Name', 'tutor' ),
            'separate_items_with_commas' => __( 'Separate Event Tags with commas', 'tutor' ),
            'add_or_remove_items'        => __( 'Add or remove Event Tags', 'tutor' ),
            'choose_from_most_used'      => __( 'Choose from the most used Event Tags', 'tutor' ),
            'not_found'                  => __( 'No Event Tags found.', 'tutor' ),
            'menu_name'                  => __( 'Event Tags', 'tutor' ),
        );
     
        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'event_tag' ),
        );
     
        register_taxonomy( 'event_tag', 'course_event', $args );
     
    }

}
Course_Events::instance();