<?php
function school_register_custom_post_types() {
    
    // Register Students
    $labels = array(
        'name'                  => _x( 'Students', 'post type general name' ),
        'singular_name'         => _x( 'Student', 'post type singular name'),
        'menu_name'             => _x( 'Students', 'admin menu' ),
        'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'student' ),
        'add_new_item'          => __( 'Add New Student' ),
        'new_item'              => __( 'New Student' ),
        'edit_item'             => __( 'Edit Student' ),
        'view_item'             => __( 'View Student' ),
        'all_items'             => __( 'All Students' ),
        'search_items'          => __( 'Search Students' ),
        'parent_item_colon'     => __( 'Parent Students:' ),
        'not_found'             => __( 'No students found.' ),
        'not_found_in_trash'    => __( 'No students found in Trash.' ),
        'archives'              => __( 'Student Archives'),
        'insert_into_item'      => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'      => __( 'Filter students list'),
        'items_list_navigation' => __( 'Students list navigation'),
        'items_list'            => __( 'Students list'),
        'featured_image'        => __( 'Students featured image'),
        'set_featured_image'    => __( 'Set student featured image'),
        'remove_featured_image' => __( 'Remove student featured image'),
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
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );

    register_post_type( 'school-student', $args );
    
    //Register for Staff
    
    $labels = array(
        'name'                  => _x( 'Staff', 'post type general name' ),
        'singular_name'         => _x( 'Staff', 'post type singular name'),
        'menu_name'             => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'        => _x( 'Staff', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Staff' ),
        'add_new_item'          => __( 'Add New Staff' ),
        'new_item'              => __( 'New Staff' ),
        'edit_item'             => __( 'Edit Staff' ),
        'view_item'             => __( 'View Staff' ),
        'all_items'             => __( 'All Staffs' ),
        'search_items'          => __( 'Search Staffs' ),
        'parent_item_colon'     => __( 'Parent Staffs:' ),
        'not_found'             => __( 'No Staffs found.' ),
        'not_found_in_trash'    => __( 'No Staffs found in Trash.' ),
        'archives'              => __( 'Staff Archives'),
        'insert_into_item'      => __( 'Insert into Staff'),
        'uploaded_to_this_item' => __( 'Uploaded to this Staff'),
        'filter_item_list'      => __( 'Filter Staffs list'),
        'items_list_navigation' => __( 'Staffs list navigation'),
        'items_list'            => __( 'Staffs list'),
        'featured_image'        => __( 'Staff featured image'),
        'set_featured_image'    => __( 'Set Staff featured image'),
        'remove_featured_image' => __( 'Remove Staff featured image'),
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
        'rewrite'            => array( 'slug' => 'staffs' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-forms',
        'supports'           => array( 'title', 'editor' ),
    );

    register_post_type( 'school-staff', $args );

    

}
add_action( 'init', 'school_register_custom_post_types' );

// Add Student Category taxonomy
function school_register_taxonomies() {
    $labels = array(
        'name'              => _x( 'Student Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Categories' ),
        'all_items'         => __( 'All Student Category' ),
        'parent_item'       => __( 'Parent Student Category' ),
        'parent_item_colon' => __( 'Parent Student Category:' ),
        'edit_item'         => __( 'Edit Student Category' ),
        'view_item'         => __( 'View Student Category' ),
        'update_item'       => __( 'Update Student Category' ),
        'add_new_item'      => __( 'Add New Student Category' ),
        'new_item_name'     => __( 'New Student Category Name' ),
        'menu_name'         => __( 'Student Category' ),
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
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );
    register_taxonomy( 'school-student-category', array( 'school-student' ), $args );

    // Add Featured taxonomy
    $labels = array(
        'name'              => _x( 'Featured', 'taxonomy general name' ),
        'singular_name'     => _x( 'Featured', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Featured' ),
        'all_items'         => __( 'All Featured' ),
        'parent_item'       => __( 'Parent Featured' ),
        'parent_item_colon' => __( 'Parent Featured:' ),
        'edit_item'         => __( 'Edit Featured' ),
        'update_item'       => __( 'Update Featured' ),
        'add_new_item'      => __( 'Add New Featured' ),
        'new_item_name'     => __( 'New Work Featured' ),
        'menu_name'         => __( 'Featured' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'featured' ),
    );

    register_taxonomy( 'school-featured', array( 'school-work' ), $args );
    
        // Register taxonomy for staff CPT (Yilin did)
        $labels = array(
            'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
            'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Staff' ),
            'all_items'         => __( 'All Staff' ),
            'parent_item'       => __( 'Parent Staff' ),
            'parent_item_colon' => __( 'Parent Staff:' ),
            'edit_item'         => __( 'Edit Staff' ),
            'update_item'       => __( 'Update Staff' ),
            'add_new_item'      => __( 'Add New Staff' ),
            'new_item_name'     => __( 'New Work Staff' ),
            'menu_name'         => __( 'Staff' ),
        );
    
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'staff-categories' ),
        );
    
        register_taxonomy( 'school-staff-category', array( 'school-staff' ), $args );

}
add_action( 'init', 'school_register_taxonomies');
//flush parmalink
function school_rewrite_flush() {
    school_register_custom_post_types();
    school_register_taxonomies();    
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'school_rewrite_flush' );




