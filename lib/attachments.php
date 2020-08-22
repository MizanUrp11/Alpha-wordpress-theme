<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function alpha_my_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'alpha' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
  );

  $args = array(
    'label'         => 'My Attachments',
    'post_type'     => array( 'post' ),
    'filetype'      => "image",  // no filetype limit
    'note'          => 'Attach files here!',
    'append'        => true,
    'button_text'   => __( 'Attach Files', 'attachments' ),
    'fields'        => $fields,

  );

  $attachments->register( 'slider', $args ); // unique instance name
}

add_action( 'attachments_register', 'alpha_my_attachments' );



function alpha_page_testimonials( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'name',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Name', 'alpha' ),    // label to display
    ),
    array(
      'name'      => 'company',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Company', 'alpha' ),    // label to display
    ),
    array(
      'name'      => 'position',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Position', 'alpha' ),    // label to display
    ),
    array(
      'name'      => 'testimonials',                         // unique field name
      'type'      => 'textarea',                          // registered field type
      'label'     => __( 'Testimonials', 'alpha' ),    // label to display
    ),
  );


  $args = array(
    'label'         => 'testimonials',
    'post_type'     => array( 'page' ),
    'filetype'      => "image",  // no filetype limit
    'note'          => 'Attach files here!',
    'append'        => true,
    'button_text'   => __( 'Attach Files', 'alpha' ),
    'fields'        => $fields,

  );

  $attachments->register( 'testimonials', $args ); // unique instance name
}

add_action( 'attachments_register', 'alpha_page_testimonials' );





function alpha_page_team( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'name',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Name', 'alpha' ),    // label to display
    ),
    array(
      'name'      => 'company',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Company', 'alpha' ),    // label to display
    ),
    array(
      'name'      => 'position',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Position', 'alpha' ),    // label to display
    ),
    array(
      'name'      => 'bio',                         // unique field name
      'type'      => 'textarea',                          // registered field type
      'label'     => __( 'Bio', 'alpha' ),    // label to display
    ),
  );


  $args = array(
    'label'         => 'Team Members',
    'post_type'     => array( 'page' ),
    'filetype'      => "image",  // no filetype limit
    'note'          => 'Attach files here!',
    'append'        => true,
    'button_text'   => __( 'Attach Files', 'alpha' ),
    'fields'        => $fields,

  );

  $attachments->register( 'team', $args ); // unique instance name
}

add_action( 'attachments_register', 'alpha_page_team' );