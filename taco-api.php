<?php
/**
 * Plugin Name: The WP REST API Taco Endpoint
 * Plugin URI: https://github.com/royboy789/WP-Rest-API-Taco-Endpoint
 * Description: Add a taco endpoint, or taco data to your posts
 * Version: 0.0.1
 * Author: Roy Sivan
 * Author URI: http://www.roysivan.com
 * Text Domain: tacos
 * License: GPL3
 */


class taco_api {

	/**
	 * Holds the class instance.
	 *
	 * @access  private
	 * @var     taco_api
	 */
	private static $instance;
	/**
	 * Returns the instance of this class.
	 *
	 * @access  public
	 * @return  taco_api
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			$class_name = __CLASS__;
			self::$instance = new $class_name;
		}
		return self::$instance;
	}


	function __construct() {

		add_action( 'rest_api_init', array( $this, 'taco_api_endpoints' ) );
		add_filter( 'taco_api_tacos', array( $this, 'add_tacos' ), 10, 1 );

	}

	function taco_api_endpoints() {
		register_rest_route( 'wp/v2', '/tacos', array(
			'methods' => 'GET',
			'callback' => array( $this, 'get_tacos_callback' ),
		) );
	}

	function get_tacos_callback( WP_REST_Request $request ) {

		$tacos = $this->get_tacos();


		$response = new WP_REST_Response( $tacos );

		return $response;

	}

	function get_tacos() {

		$taco_data = array(
			'taco' => true,
			'tacos' => array()
		);

		$taco_data['tacos'] = apply_filters( 'taco_api_tacos', $taco_data['tacos'] );

		return $taco_data;

	}

	function add_tacos( $tacos ) {

		$tacos[] =
			"┈┈┈┈╭╯╭╯╭╯┈┈┈┈┈ \\n".
			"┈┈┈╱▔▔▔▔▔╲▔╲┈┈┈ \\n".
			"┈┈╱┈╭╮┈╭╮┈╲╮╲┈┈ \\n".
			"┈┈▏┈▂▂▂▂▂┈▕╮▕┈┈ \\n".
			"┈┈▏┈╲▂▂▂╱┈▕╮▕┈┈ \\n".
			"┈┈╲▂▂▂▂▂▂▂▂╲╱┈┈ \\n".
			"F U C K Y E A H E A T T A C O S";

		return $tacos;

	}




}


function init_taco_api() {
	return taco_api::instance();
}

init_taco_api();