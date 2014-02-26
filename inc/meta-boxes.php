<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'YOUR_PREFIX_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'ADAMJANG_';

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'standard',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Standard Fields', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'projects' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}text",
				// Field description (optional)
				'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			
		),
		'validation' => array(
			'rules' => array(
				"{$prefix}password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"{$prefix}password" => array(
					'required'  => __( 'Password is required', 'rwmb' ),
					'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
				),
			)
		)
	);


	return $meta_boxes;
}


