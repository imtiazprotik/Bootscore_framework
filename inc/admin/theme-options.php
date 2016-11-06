<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'colour_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function colour_theme_options() {

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
        'title'       => __( 'Header logo', 'colour' )
      ),

      



    ),


    // section setting parts

    'settings'        => array( 
      
      array(
        'id'          => 'site_logo',
        'label'       => __( 'Upload logo', 'colour' ),
        'desc'        => sprintf( __( 'The Upload logo for in header', 'colour' ), '<code>ot-upload-attachment-id</code>' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_logo',
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