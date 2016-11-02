<?php

function zet_portfolio_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'portfolio', 'zet' ),
		'singular_name' 		=> esc_html__( 'portfolio', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new Portfolio entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new Portfolio entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit Portfolio entry', 'zet' ),
		'new_item' 				=> esc_html__( 'New Portfolio entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All Portfolio entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View Portfolio entry', 'zet' ),
		'search_items' 			=> esc_html__( 'Search Portfolio entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not Portfolio entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No Education entries found in Trash', 'zet' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'PORTFOLIO', 'zet' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'rewrite' 				=> array( 'slug'=>'portfolio', 'with_front'=>false ),
		'menu_icon' 			=> 'dashicons-id-alt',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_position' 		=> 108,
		'taxonomies' 			=> array( 'zet_tax' ),
		'supports' 				=> array( 'title', 'thumbnail', 'custom-fields' )
	);
	register_post_type( 'zet_portfolio', $data );
};

function zet_about_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'About me', 'zet' ),
		'singular_name' 		=> esc_html__( 'About me', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new About me entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new About me entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit About me entry', 'zet' ),
		'new_item'				=> esc_html__( 'New About me entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All About me entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View About me entry', 'zet' ),
		'search_items' 			=> esc_html__( 'Search About me entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not About me entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No About me entries found in Trash', 'zet' ),
		'parent_item_colon' 	=> '',
		'menu_name'             => esc_html__( 'ABOUT ME', 'zet' )
		
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 101,
		'rewrite' 				=> array( 'slug'=>'about', 'with_front'=>false ),
		'menu_icon' 			=> 'dashicons-id-alt',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'taxonomies' 			=> array( 'zet_tax' ),
		'supports' 				=> array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'zet_about_me', $data );
};

function zet_contact_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'contact', 'zet' ),
		'singular_name' 		=> esc_html__( 'contact', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new Contact entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new Contact entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit Contact entry', 'zet' ),
		'new_item' 				=> esc_html__( 'New Contact entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All Contact entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View Contact entry', 'zet' ),
		'search_items' 			=> esc_html__( 'Search Contact entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not Contact entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No Contact entries found in Trash', 'zet' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'CONTACT', 'zet' )
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 108,
		'rewrite' 				=> array( 'slug'=>'contact', 'with_front'=>false ),
		'capability_type' 		=> 'post',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-id-alt',
		'taxonomies' 			=> array( 'zet_tax' ),
		'supports' 				=> array( 'title', 'editor' )
	);
	register_post_type( 'zet_contact', $data );
};

function zet_education_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'education', 'zet' ),
		'singular_name' 		=> esc_html__( 'education', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new Education entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new Education entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit Education entry', 'zet' ),
		'new_item' 				=> esc_html__( 'New Education entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All Education entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View Education entry', 'zet' ),
		'search_items' 			=> esc_html__( 'Search Education entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not Education entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No Education entries found in Trash', 'zet' ),
		'parent_item_colon'		=> '',
		'menu_name' 			=> esc_html__( 'EDUCATION', 'zet' )
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 106,
		'rewrite' 				=> array( 'slug'=>'education', 'with_front'=>false ),
		'capability_type' 		=> 'post',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-id-alt',
		'taxonomies' 			=> array( 'zet_tax' ),
		'supports' 				=> array( 'title', 'editor', 'thumbnail', 'custom-fields' )
	);
	register_post_type( 'zet_education', $data );
};

function zet_experience_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'experience', 'zet' ),
		'singular_name' 		=> esc_html__( 'experience', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new Experience entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new Experience entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit Experience entry', 'zet' ),
		'new_item' 				=> esc_html__( 'New Experience entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All Experience entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View Experience entry', 'zet' ),
		'search_items' 			=> esc_html__( 'Search Experience entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not Experience entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No Experience entries found in Trash', 'zet' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'EXPERIENCE', 'zet' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 105,
		'rewrite' 				=> array( 'slug'=>'experience', 'with_front'=>false ),
		'capability_type' 		=> 'post',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-id-alt',
		'taxonomies' 			=> array( 'category' ),
		'supports' 				=> array( 'title', 'editor', 'thumbnail', 'custom-fields' )
	);
	register_post_type( 'zet_experience', $data );
};

function zet_knowledge_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'Knowledge', 'zet' ),
		'singular_name' 		=> esc_html__( 'Knowledge', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new Knowledge entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new Knowledge entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit Knowledge entry', 'zet' ),
		'new_item' 				=> esc_html__( 'New Knowledge entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All Knowledge entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View Knowledge entry', 'zet' ),
		'search_items' 			=> esc_html__( 'Search Knowledge entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not Knowledge entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No Knowledge entries found in Trash', 'zet' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'KNOWLEDGE', 'zet' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 103,
		'rewrite' 				=> array( 'slug'=>'knowledge', 'with_front'=>false),
		'capability_type' 		=> 'post',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-id-alt',
		'taxonomies'			=> array( 'zet_tax' ),
		'supports' 				=> array( 'title', 'editor', 'custom-fields' )
	);
	register_post_type( 'zet_knowledge', $data );
};

function zet_professional_skills_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'Professional skills', 'zet' ),
		'singular_name' 		=> esc_html__( 'Professional skill', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new Professional skills entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new Professional skills entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit Professional skills', 'zet' ),
		'new_item' 				=> esc_html__( 'New Professional skills entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All Professional skills entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View Professional skills entry', 'zet' ),
		'search_items' 			=> esc_html__( 'Search Professional skills entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not Professional skills entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No Professional skills entries found in Trash', 'zet' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'PROFESSIONAL SKILLS', 'zet' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 102,
		'rewrite' 				=> array( 'slug'=>'professional_skills', 'with_front'=>false),
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-id-alt',
		'taxonomies' 			=> array( 'zet_tax' ),
		'supports' 				=> array( 'title', 'editor', 'custom-fields' )
	);
	register_post_type( 'zet_pro_skills', $data );
};

function zet_language_post_type(){
	$labels = array(
		'name' 					=> esc_html__( 'language', 'zet' ),
		'singular_name' 		=> esc_html__( 'Language', 'zet' ),
		'add_new' 				=> esc_html__( 'Add new Language entry', 'zet' ),
		'add_new_item' 			=> esc_html__( 'Add new Language entry', 'zet' ),
		'edit_item' 			=> esc_html__( 'Edit Language entry', 'zet' ),
		'new_item' 				=> esc_html__( 'New Language entry', 'zet' ),
		'all_items' 			=> esc_html__( 'All Language entries', 'zet' ),
		'view_items' 			=> esc_html__( 'View Language entry', 'zet' ),
		'search_items'			=> esc_html__( 'Search Language entry', 'zet' ),
		'not found' 			=> esc_html__( 'Not Language entries found', 'zet' ),
		'not_found_in_trash' 	=> esc_html__( 'No Language entries found in Trash', 'zet' ),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> esc_html__( 'LANGUAGE SKILLS', 'zet' ) 
	);	
	$data = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'menu_position' 		=> 104,
		'capability_type' 		=> 'post',
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'show_in_nav_menus'		=> false,
		'query_var' 			=> true,
		'menu_icon' 			=> 'dashicons-id-alt',
		'taxonomies' 			=> array( 'zet_tax' ),
		'supports' 				=> array( 'title', 'editor', 'custom-fields' )
	);
	register_post_type( 'zet_language', $data );
};