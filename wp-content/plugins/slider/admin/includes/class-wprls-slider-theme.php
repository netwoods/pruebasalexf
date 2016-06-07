<?php

class Wprls_Slider_Theme {

	function __construct( $do_start = false ) {

		if ( $do_start ) {

			$this->_init();
			$this->_hooks();
			$this->_filters();

		}
	}

	function _init() {

		add_shortcode( 'rlslider', array( $this, 'process_shortcode' )  );

	}


	function _hooks() {

		
	}

	function _filters() {

	}

	function process_shortcode( $atts ) {

		extract( shortcode_atts( array(
				'id' => null
			), $atts ) );

		if ( ! $id )
			return FALSE;

		if ( get_post_status( $id ) !== 'publish' )
			return FALSE;

		$slider_id = $id;

		$slider_options = wprls_get_slider_data( $slider_id );

		$slides = wprls_get_slider_slides( $slider_id );

		ob_start();

		include wprls_view_admin_path( 'public/slider-1.php' ); 

		return ob_get_clean();


	}

}