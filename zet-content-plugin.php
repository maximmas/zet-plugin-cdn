<?php
/*
Plugin Name: ZET Theme Content Plugin
Plugin URI: http://zet.netgon.ru
Description: Create a Custom posts for ZET Theme
Version: 1.0
Author: Netgon Team
Author URI: http://netgon.ru
License: GPLv2
Text domain: zet
Domain Path: /languages
*/

/*  Copyright 2016  Netgon Team  (email : support@netgon.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once( ABSPATH . '/wp-admin/includes/taxonomy.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/zet-custom-posts.php' );

// create taxonomy for custom posts
add_action( 'init', 'zet_add_tax', 0 );
function zet_add_tax() {
    $labels = array(
        'name'                   => esc_html__( 'Resume Page categories', 'zet' ),
        'singular_name'          => esc_html__( 'Resume Page category', 'zet' ),
        'menu_name'              => esc_html__( 'Categories', 'zet' ),
        'all_items'              => esc_html__( 'Categories', 'zet' ),
        'parent_item'            => esc_html__( 'Parent Resume page category', 'zet' ),
        'parent_item_colon'      => esc_html__( 'Parent Resume page category:', 'zet' ),
        'new_item_name'          => esc_html__( 'New category', 'zet' ),
        'add_new_item'           => esc_html__( 'Add new category', 'zet' ),
        'edit_item'              => esc_html__( 'Edit new category', 'zet' ),
        'update_item'            => esc_html__( 'Update category', 'zet' ),
        'search_items'           => esc_html__( 'Search', 'zet' ),
        'add_or_remove_items'    => esc_html__( 'Add or remove category', 'zet' ),
        'choose_from_most_used'  => esc_html__( 'Find from most used', 'zet' ),
        'not_found'              => esc_html__( 'Not found', 'zet' )
    );
    $args = array(
        'labels'                 => $labels,
        'hierarchical'           => true,
        'public'                 => true,
    );
    register_taxonomy( 'zet_tax', array( 'zet_about_me', 'zet_contact', 'zet_education', 'zet_experience', 'zet_knowledge', 'zet_language', 'zet_pro_skills', 'zet_portfolio' ), $args );
}

// add custom categories
add_action( 'init', 'zet_categories' );
function zet_categories(){

    wp_insert_category( array(
                        'cat_name'              => 'zet_description',
                        'category_description'  => 'Category for resume page posts with text content',
                        'category_nicename'     => 'zet_description',
                        'taxonomy'              => 'zet_tax'
                        ) );

    wp_insert_category( array( 
                        'cat_name'              => 'zet_item',
                        'category_description'  => 'Category for resume page posts with item content',
                        'category_nicename'     => 'zet_item',
                        'taxonomy'              => 'zet_tax'
                        ) );

    $zet_desc_id = get_term_by( 'name', 'zet_description', 'zet_tax' );
    $zet_item_id = get_term_by( 'name', 'zet_item', 'zet_tax' );

    $GLOBALS[ "zet_cat_description_id" ] = $zet_desc_id->term_id;
    $GLOBALS[ "zet_cat_item_id" ] = $zet_item_id->term_id; 

};




// create custom posts
add_action( 'init', 'zet_custom_posts' );
function zet_custom_posts(){

    zet_about_post_type();
    zet_professional_skills_post_type();
    zet_education_post_type();
    zet_experience_post_type();
    zet_knowledge_post_type();
    zet_language_post_type();
    zet_portfolio_post_type();
    zet_contact_post_type();
};


// blog page creation
// if( null == get_page_by_title( 'Blog Page', OBJECT, 'page' ) ){
//     $page_data = array(
//             'post_title'    => esc_html__( 'Blog Page', 'zet' ),
//             'post_content'  => esc_html__( 'Don&#8216;t remove this page!', 'zet' ),
//             'post_status'   => 'publish',
//             'post_type'     => 'page',
//             'post_name'     => 'blog'
//         );
//     $page_id = wp_insert_post( wp_slash( $page_data ) );
// };  


function zet_show_resume_contactform(){

    $zet_resume_contactform = '<form id="contact-form" method="POST" class="contact-form">';
    $zet_resume_contactform .= '<input type="text" name="visitor-name" placeholder="%1$s" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{1,20}$">';
    $zet_resume_contactform .= '<input type="email" name="visitor-email" placeholder="%2$s">';
    $zet_resume_contactform .= '<textarea name="visitor-message" placeholder="%3$s"></textarea>';
    $zet_resume_contactform .= '<button id="contact-form-btn" type="button" name="submit" data-style="fill" data-horizontal class="progress-button">';
    $zet_resume_contactform .= '<span class="content">%4$s</span>';
    $zet_resume_contactform .= '<span class="progress">';
    $zet_resume_contactform .= '<span class="progress-inner"></span></span></button>';
    $zet_resume_contactform .= '<input type="hidden" name="user" value="%5$s" />';
    $zet_resume_contactform .= '<input type="hidden" name="user_email" value="%6$s" />';
    $zet_resume_contactform .= '<input type="hidden" name="user_url" value="%7$s" />';
    $zet_resume_contactform .= '</form>';

    return $zet_resume_contactform;
};

// sendmail handler
add_action( 'wp_ajax_sendmail', 'zet_sendmail_contact' );
add_action( 'wp_ajax_nopriv_sendmail', 'zet_sendmail_contact' );
function zet_sendmail_contact(){
    
    $zet_frm_name = sanitize_text_field( $_POST["user"] ); 
    $zet_recepient = sanitize_email( $_POST["user_email"] ); 
    $zet_sitename  = sanitize_text_field( $_POST["user_url"] ); 
    $zet_subject   = esc_html__( 'New contact from', 'zet' ) . ' '. esc_html__( $zet_sitename ); 

    $zet_name = sanitize_text_field( $_POST["name"] );
    $zet_email = sanitize_email( $_POST["email"] );
    $zet_msg = sanitize_text_field( $_POST["message"] );
                
    $zet_name = ( $zet_name ) ? $zet_name : esc_html_e( 'no visiter&#8216;s name', 'zet' );
    $zet_email = ($zet_email) ? $zet_email : esc_html_e( 'no visiter&#8216;s email', 'zet' );
    $zet_msg = ($zet_msg) ? $zet_msg : esc_html_e( 'no visiter&#8216;s message', 'zet' );

    $zet_message = '-------------------<br><br>';
    $zet_message .= esc_html__( 'Visitor name:', 'zet' ) . $zet_name . '<br>';
    $zet_message .= esc_html__( 'Visitor email:', 'zet' ) . $zet_email . '<br><br>';
    $zet_message .= $zet_msg . '<br><br>-------------------';
      
    wp_mail( $zet_recepient, $zet_subject, $zet_message, esc_html__( 'From:','zet' ) . $zet_name . "<$zet_recepient>" . "\r\n" . esc_html__( 'Reply-To:','zet' ) . $zet_recepient . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" . "Content-type: text/html; charset=\"utf-8\"");
    
    wp_die();
};

// add Open Graph markup for Facebook share button
add_action( 'wp_head', 'zet_add_opengraph' );
function zet_add_opengraph(){

     $zet_og_markup = '<meta property="og:title" content="' . esc_html( get_the_title() ) . '"/>';
     $zet_og_markup .= '<meta property="og:type" content="article"/>';
     $zet_og_markup .= '<meta property="og:url" content="' . esc_html( get_permalink() ) . '"/>';
     $zet_og_markup .= '<meta property="og:image" content="' . esc_url( get_the_post_thumbnail_url() ) . '"/>';
     $zet_og_markup .= '<meta property="og:site_name" content="' . esc_html( get_bloginfo() ) . '"/>';
     $zet_og_markup .= '<meta property="og:description" content="' . esc_html( get_the_excerpt() ) . '"/>';
    
     $zet_string = wp_unslash( $zet_og_markup );
       $zet_allowed_html = array(
          'meta' => array(
              'property' => true,
              'content' => true,
               ),
       ); 
                          
    echo ( wp_kses( $zet_string, $zet_allowed_html ) );
    
  
}

?>