<?php

add_action( 'cmb2_init', 'cmb2_add_metabox' );
function cmb2_add_metabox() {

	$prefix = '_alpha_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'image_information',
		'title'        => __( 'Image Information', 'alpha' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Camera Model', 'alpha' ),
		'id' => $prefix . 'camera_model',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Location', 'alpha' ),
		'id' => $prefix . 'location',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'alpha' ),
		'id' => $prefix . 'date',
		'type' => 'text_date',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licensed', 'alpha' ),
		'id' => $prefix . 'licensed',
		'type' => 'checkbox',
		
	) );

	$cmb->add_field( array(
		'name' => __( 'License Information', 'alpha' ),
		'id' => $prefix . 'license_information',
		'type' => 'textarea',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'licensed',
		),
	) );

	$cmb->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'id' => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'Upload Resume', 'cmb2' ),
		'id' => $prefix . 'resume',
		'type' => 'file',
		'text' =>array(
			'add_upload_file_text' => __('Upload')
		),
		'query_args' => array(
			'type' => array('application/pdf')
		),
		'options' => array(
			'url' => false
		)
	) );

}




function cmb2_add_pricingTable() {

	$prefix = '_alpha_pt_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'pricing_table',
		'title'        => __( 'Pricing Table', 'cmb2' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$group = $cmb->add_field( array(
		'name' => __( 'Pricing Table', 'cmb2' ),
		'id' => $prefix . 'pricing_table',
		'type' => 'group',
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Captions', 'cmb2' ),
		'id' => $prefix . 'caoptions',
		'type' => 'text',
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Options', 'cmb2' ),
		'id' => $prefix . 'options',
		'type' => 'text',
		'repeatable' => true
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Price', 'cmb2' ),
		'id' => $prefix . 'price',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'cmb2_add_pricingTable' );


/**
 * 
 * services
 */


function alpha_add_services() {

	$prefix = '_alpha_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'servies',
		'title'        => __( 'Servies', 'alpha' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$service = $cmb->add_field( array(
		'name' => __( 'Services', 'alpha' ),
		'id' => $prefix . 'services',
		'type' => 'group',
	) );

	$cmb->add_group_field($service, array(
		'name' => __( 'Icon', 'alpha' ),
		'id' => $prefix . 'icon',
		'type' => 'text',
	) );

	$cmb->add_group_field($service, array(
		'name' => __( 'Title', 'alpha' ),
		'id' => $prefix . 'title',
		'type' => 'text',
	) );

	$cmb->add_group_field($service, array(
		'name' => __( 'Content', 'alpha' ),
		'id' => $prefix . 'content',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'alpha_add_services' );
