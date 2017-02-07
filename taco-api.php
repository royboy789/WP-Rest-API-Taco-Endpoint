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
 *
 */

/*
 * For the love of Tacos
 * ┈┈┈┈╭╯╭╯╭╯┈┈┈┈┈
 * ┈┈┈╱▔▔▔▔▔╲▔╲┈┈┈
 * ┈┈╱┈╭╮┈╭╮┈╲╮╲┈┈
 * ┈┈▏┈▂▂▂▂▂┈▕╮▕┈┈
 * ┈┈▏┈╲▂▂▂╱┈▕╮▕┈┈
 * ┈┈╲▂▂▂▂▂▂▂▂╲╱┈┈
 *
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

	/**
	 * taco_api constructor.
	 */
	function __construct() {

		add_action( 'rest_api_init', array( $this, 'taco_api_endpoints' ) );
		add_filter( 'taco_api_tacos', array( $this, 'add_tacos' ), 10, 1 );

	}

	/**
	 * Taco API Endpoint & Modified Return Data
	 */
	function taco_api_endpoints() {
		register_rest_route( 'wp/v2', '/tacos', array(
			'methods' => 'GET',
			'callback' => array( $this, 'get_tacos_callback' ),
		) );

		register_rest_field( 'post',
			'tacos',
			array(
				'get_callback'    => array( $this, 'tacos_for_posts' ),
				'schema'          => null,
			)
		);

	}

	/**
	 * Get Tacos!
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_REST_Response
	 */
	function get_tacos_callback( WP_REST_Request $request ) {

		$tacos = $this->get_tacos();


		$response = new WP_REST_Response( $tacos );

		return $response;

	}

	/**
	 * Get Tacos! for a post object
	 *
	 * @param $object
	 * @param $field_name
	 * @param $request
	 *
	 * @return array
	 */
	function tacos_for_posts( $object, $field_name, $request ) {
		$data = $request->get_params();
		if( isset( $data['tacos'] ) && 'true' === $data['tacos'] ) {
			return $this->get_tacos();
		}
	}

	/**
	 * Get all the tacos
	 *
	 * @return array
	 */
	function get_tacos() {

		$taco_data = array(
			'taco' => true,
			'tacos' => array()
		);

		$taco_data['tacos'] = apply_filters( 'taco_api_tacos', $taco_data['tacos'] );

		return $taco_data;

	}


	/**
	 * Add a taco! callback of taco_api_tacos filter
	 *
	 * @param $tacos
	 *
	 * @return array
	 *
	 */
	function add_tacos( $tacos ) {

		$tacos[] = array(
			("┈┈┈┈╭╯╭╯╭╯┈┈┈┈┈"),
			("┈┈┈╱▔▔▔▔▔╲▔╲┈┈┈"),
			("┈┈╱┈╭╮┈╭╮┈╲╮╲┈┈ "),
			("┈┈▏┈▂▂▂▂▂┈▕╮▕┈┈ "),
			("┈┈▏┈╲▂▂▂╱┈▕╮▕┈┈"),
			("┈┈╲▂▂▂▂▂▂▂▂╲╱┈┈ ")
		);

		return $tacos;

	}




}

/**
 * Init Taco API
 *
 * @return taco_api
 */
function init_taco_api() {
	return taco_api::instance();
}

init_taco_api();