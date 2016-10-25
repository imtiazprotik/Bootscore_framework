<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'wpbootscore_wp_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function wpbootscore_wp_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    
    // section parts

    'sections'        => array( 

      array(
        'id'          => 'header_logo',
        'title'       => __( 'Header logo', 'wpbootscore_wp' )
      ),

      array(
        'id'          => 'service_section_setting',
        'title'       => __( 'Service Section settings', 'wpbootscore_wp' )
      ),

       array(
        'id'          => 'brand_title_section',
        'title'       => __( 'Brand Title', 'wpbootscore_wp' )
      ),



    ),


    // section setting parts

    'settings'        => array( 
      
      array(
        'id'          => 'site_logo',
        'label'       => __( 'Upload logo', 'wpbootscore_wp' ),
        'desc'        => sprintf( __( 'The Upload logo for in header', 'wpbootscore_wp' ), '<code>ot-upload-attachment-id</code>' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_logo',
        'rows'        => '',
        'class'       => '',
      ),

      array(
        'id'          => 'service_se_title',
        'label'       => __( 'service title', 'wpbootscore_wp' ),
        'desc'        => sprintf( __( 'Write service title', 'wpbootscore_wp' ), '<code>ot-upload-attachment-id</code>' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'service_section_setting',
        'rows'        => '',
        'class'       => '',
      ),
      array(
        'id'          => 'service_se_des',
        'label'       => __( 'service description', 'wpbootscore_wp' ),
        'desc'        => sprintf( __( 'Write service description', 'wpbootscore_wp' ), '<code>ot-upload-attachment-id</code>' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'service_section_setting',
        'rows'        => '',
        'class'       => '',
      ),
      array(
        'id'          => 'brand_des',
        'label'       => __( 'Brand Title', 'wpbootscore_wp' ),
        'desc'        => sprintf( __( 'Write brand title', 'wpbootscore_wp' ), '<code>ot-upload-attachment-id</code>' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'brand_title_section',
        'rows'        => '',
        'class'       => '',
      ),



    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}