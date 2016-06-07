<?php

class Wprls_Slider{

	function __construct( $do_start = false ) {

		if ( $do_start ) {

			$this->_init();
			$this->_hooks();
			$this->_filters();

		}
	}

	function _init() {

			

	}


	function _hooks() {

		add_action( 'init', array( $this, 'register_post_type' ) );

		add_action( 'init', array( $this, 'save_slider_options' ) );

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		add_action( 'admin_init', array( $this, 'add_assets' ) );

		add_action( 'wp_ajax_wprlsajaxsave', array( $this, 'save_slide_ajax' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'public_assets' ) );
	}

	function _filters() {

	}

	function register_post_type() {

		$labels = array(
				'name'               => _x( 'Sliders', 'post type general name', 'wprls' ),
				'singular_name'      => _x( 'Slider', 'post type singular name', 'wprls' ),
				'menu_name'          => _x( 'Sliders', 'admin menu', 'wprls' ),
				'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'wprls' ),
				'add_new'            => _x( 'Add New', 'Slider', 'wprls' ),
				'add_new_item'       => __( 'Add New Slider', 'wprls' ),
				'new_item'           => __( 'New Slider', 'wprls' ),
				'edit_item'          => __( 'Edit Slider', 'wprls' ),
				'view_item'          => __( 'View Slider', 'wprls' ),
				'all_items'          => __( 'All Sliders', 'wprls' ),
				'search_items'       => __( 'Search Sliders', 'wprls' ),
				'parent_item_colon'  => __( 'Parent Sliders:', 'wprls' ),
				'not_found'          => __( 'No Sliders found.', 'wprls' ),
				'not_found_in_trash' => __( 'No Sliders found in Trash.', 'wprls' )
		);
	
		$args = array(
				'labels'             => $labels,
		                'description'        => __( 'Description.', 'wprls' ),
				'public'             => false,
				'publicly_queryable' => false,
				'show_ui'            => true,
				'show_in_menu'       => false,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'wprls_slider' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title' )
		);

		register_post_type( 'wprls_slider', $args );

	}

	function admin_menu() {

		$page_title = __( 'Layer Slider', 'wprls' );
		$menu_title = __( 'Layer Slider', 'wprls' );
		$capability = 'manage_options';
		$menu_slug = 'edit.php?post_type=wprls_slider';

		//add_object_page( $page_title, $menu_title, $capability,
		//	$menu_slug );

		add_menu_page( $page_title, $menu_title , $capability,
		  	'wprls_sliders_page', 
		  	array( $this, 'sliders_page' ) );

    	add_submenu_page( 'wprls_sliders_page', 'Slider', 'Add New Slider', $capability, 'wprls_add_slider', array( $this, 'add_new_slider' ) );

	}


	function public_assets() {

		if ( is_admin() ) return;
		wp_enqueue_script('jquery' );
		wp_enqueue_style( 'wprls-style', plugins_url( '../css/public/slider-pro.min.css' , __FILE__ ) );

		wp_enqueue_script( 'wprls-script', plugins_url( '../js/public/jquery.sliderPro.js', __FILE__ ) );

	}

	function add_assets() {

			if ( ! isset( $_GET['page'] ) ) return;

			if ( $_GET['page'] == 'wprls_add_slider' || $_GET['page'] == 'wprls_sliders_page' ) {
				
				wp_enqueue_style( 'wprls-style', plugins_url( '../css/style.css' , __FILE__ ) );

				wp_enqueue_script( 'jquery-ui-core' );

				wp_enqueue_script( 'jquery-ui-tabs' );

				wp_enqueue_script( 'jquery-ui-draggable' );

				wp_enqueue_script( 'jquery-ui-droppable' );

				wp_enqueue_script( 'wprls-script', plugins_url( '../js/wprls.js', __FILE__ ) );

				 wp_enqueue_media();

				 $js = array(
				 		'bgimgbutton' => plugins_url( '../img/not_set.png', __FILE__ ),
				 		'admin_url' => admin_url(),
				 		'ajaxurl' => admin_url( 'admin-ajax.php' )
				 	);			 

				 wp_localize_script( 'wprls-script', 'wprlsslider', $js );
			
			}

	}

	function sliders_page() {

		$nonce = wp_create_nonce( 'wprls_slider_delete_nonce' );

		if ( isset( $_GET['action'] ) ) {

			if ( $_GET['action'] == 'delete_slider' ) {
				
				$post_id = intval($_GET['post_id']);

				wp_delete_post( $post_id, true );

			}
		
		}


		include wprls_view_admin_path( 'sliders-page.php' );

	}

	function add_new_slider() {

		$nonce = wp_create_nonce( 'wprls_settings_nonce' );

		$slider_nonce = wp_create_nonce( 'wprls_slides_nonce' );

		$slider_options = $this->default_slider_options();

		$slides = $this->default_slide_options();

		$save_link = admin_url('admin.php?page=wprls_add_slider&action=wprls_add_slider&new_post=1');

		if ( isset( $_GET['action'] ) ) {

			if ( $_GET['action'] == 'edit_slider' ) {

				$post_id = $_GET['post_id'];

				$save_link = admin_url('admin.php?page=wprls_add_slider&action=edit_slider&post_id=' . $post_id );

				$slider_options = get_post_meta( $post_id, 'sl_data', true );

				$slider_options['title'] = get_the_title( $post_id );

				$slides = wprls_get_slider_slides( $_GET['post_id'] );

				if ( ! $slides )
					$slides = $this->default_slide_options();

			}

		}

		include wprls_view_admin_path( 'add-slider-page.php' );

	}


	

	function default_slider_options() {

		$default_options = array(
				'title' => '',
				'is_responsive' => true,
				'width' => 500,
				'height' => 340,
				'nav_skin' => '1',
				'nav_color' => '2',
				'player_skin' => '1',
				'auto_start' => false,
				'pause_on_mouse_over' => true,
				'slide_order' => 'seq',
				'random_order' => false,
				'autoplay_vid' => false,
				'pause_slideshow_vid' => true,
				'autoplay_delay' => 5000,
			);

		return $default_options;

	}

	function default_slide_options() {

		$default_options = array(
				'bgimage' => '',
				'slideduration' => '500',
				'transduration' => '100',
			);

		$slide = array(
				'type' => 'text',
				'width' => '90',
				'height' => '31',
				'top' => '0',
				'left' => '0',
				'tsize' => '15',
				'imgwidth' => '',
				'imgheight' => '',
				'tcolor' => '#000000',
				'tcontent' => 'Empty Text',
				'bgcolor' => '#ffffff',
				'animationdelay' => '700',
				'animation' => 'fadeIn' 
			);

		$default_options['layers'] = array(
				$slide
			);

		$slides = array( $default_options );

		

		return $slides;

	}

	function save_slides_options() {




	}

	function save_slider_options() {

		if ( ! isset( $_POST['wprls_nonce'] ) ) return;

		if ( ! wp_verify_nonce( $_POST['wprls_nonce'], 'wprls_settings_nonce' ) ) {

				die ( 'Security Error' );
				
		}



		$sl_data = $_POST;
		
		if ( isset( $_GET['new_post'] ) ) {
			
			$postarr = array( 
					'post_title' => wp_strip_all_tags( $sl_data['title'] ),
					'post_status' => 'publish',
					'post_type' => 'wprls_slider',
					'post_author' => 1,
				);

			$post_id = wp_insert_post( $postarr );

			$meta_sl_data = array();

			$meta_sl_data['width'] = stripslashes($sl_data['width']);

			$meta_sl_data['height'] = stripslashes($sl_data['height']);

			$meta_sl_data['autoplay_delay'] = stripslashes($sl_data['autoplay_delay']);

			$meta_sl_data['nav_skin'] = stripslashes($sl_data['nav_skin']);

			$meta_sl_data['player_skin'] = stripslashes($sl_data['player_skin']);

			$meta_sl_data['nav_color'] = stripslashes($sl_data['nav_color']);

			$meta_sl_data['slide_order'] = stripslashes($sl_data['slide_order']);

			if ( isset( $sl_data['is_responsive'] ) )
				$meta_sl_data['is_responsive'] = true;
			else
				$meta_sl_data['is_responsive'] = false;

			if ( isset( $sl_data['auto_start'] ) )
				$meta_sl_data['auto_start'] = true;
			else
				$meta_sl_data['auto_start'] = false;

			if ( isset( $sl_data['pause_on_mouse_over'] ) )
				$meta_sl_data['pause_on_mouse_over'] = true;
			else
				$meta_sl_data['pause_on_mouse_over'] = false;

			if ( isset( $sl_data['autoplay_vid'] ) )
				$meta_sl_data['autoplay_vid'] = true;
			else
				$meta_sl_data['autoplay_vid'] = false;

			if ( isset( $sl_data['pause_slideshow_vid'] ) )
				$meta_sl_data['pause_slideshow_vid'] = true;
			else
				$meta_sl_data['pause_slideshow_vid'] = false;


 
			update_post_meta( $post_id, 'sl_data', $meta_sl_data );

			$location = admin_url('admin.php?page=wprls_add_slider&action=edit_slider&post_id=' . $post_id );

			wp_redirect( $location );

			exit;

		} else if ( isset( $_GET['post_id'] ) && $_GET['action'] == 'edit_slider' ) {

			$post_id = $_GET['post_id'];

			if ( FALSE === get_post_status( $post_id ) ) return;

			$title = wp_strip_all_tags( $sl_data['title'] );

			$postarr = array( 
					'ID' => $post_id,
					'post_title' => $title
				);

			wp_update_post( $postarr );

			$meta_sl_data = array();


			$meta_sl_data['width'] = intval($sl_data['width']);

			$meta_sl_data['height'] = intval($sl_data['height']);

			$meta_sl_data['autoplay_delay'] = stripslashes($sl_data['autoplay_delay']);

			$meta_sl_data['nav_skin'] = stripslashes($sl_data['nav_skin']);

			$meta_sl_data['player_skin'] = stripslashes($sl_data['player_skin']);

			$meta_sl_data['nav_color'] = stripslashes($sl_data['nav_color']);

			$meta_sl_data['slide_order'] = stripslashes($sl_data['slide_order']);

			if ( isset( $sl_data['is_responsive'] ) )
				$meta_sl_data['is_responsive'] = true;
			else
				$meta_sl_data['is_responsive'] = false;

			if ( isset( $sl_data['auto_start'] ) )
				$meta_sl_data['auto_start'] = true;
			else
				$meta_sl_data['auto_start'] = false;

			if ( isset( $sl_data['pause_on_mouse_over'] ) )
				$meta_sl_data['pause_on_mouse_over'] = true;
			else
				$meta_sl_data['pause_on_mouse_over'] = false;

			if ( isset( $sl_data['autoplay_vid'] ) )
				$meta_sl_data['autoplay_vid'] = true;
			else
				$meta_sl_data['autoplay_vid'] = false;

			if ( isset( $sl_data['pause_slideshow_vid'] ) )
				$meta_sl_data['pause_slideshow_vid'] = true;
			else
				$meta_sl_data['pause_slideshow_vid'] = false;


 
			update_post_meta( $post_id, 'sl_data', $meta_sl_data );

			

		}


	}

	function save_slide_ajax() {

		if ( ! current_user_can( 'manage_options' ) )
			die(0);

		$json = stripcslashes($_POST['json']);

		$postid = $_POST['postid'];

		$slides = json_decode( $json, true );

		update_post_meta( $postid, 'sl_slides', $slides );

		exit( 'success' );

	}


}