<?php

// function bootscore_service_metaboxes() {
//     $prefix = 'bootscore_';
//     /**
//      * Metaboxes for service post type
//      */
//     $cmb_service = new_cmb2_box( array(
//         'id'           => $prefix . 'service_metabox',
//         'title'        => __( 'Additional informations', 'bootscore' ),
//         'object_types' => array( 'service', ), // Post type
//     ) );

//     $cmb_service->add_field( array(
//         'name' => __( 'Service Icon', 'bootscore' ),
//         'desc' => __( 'Enter fontawesome icon name only here', 'bootscore' ),
//         'id'   => $prefix . 'service_icon',
//         'type' => 'text',
//     ) );

// }

// add_action( 'cmb2_admin_init', 'bootscore_service_metaboxes' );