<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'libraries/woocommerce/woocommerce-api.php' );

/*
 *	API controller
 */
class Api extends CI_Controller {

	private $consumer_key;
	private $consumer_secret;
	private $api_options;

	private $woo_client;

	/*
	 *	Constructor
	 */
	function __construct() {
		parent::__construct();

		$this->consumer_key = 'ck_6217294d2af1821ae7593238f30a02bb9fb6dac0';
		$this->consumer_secret = 'cs_725d3cf7ae11ca0674057cf776926a90ec95b3df';
		$this->options = array(
		    'ssl_verify'	=> false,
		);

		try {

		    $this->woo_client = new WC_API_Client( 'http://getmeliquor.com', $this->consumer_key, $this->consumer_secret, $this->options );

		} catch ( WC_API_Client_Exception $e ) {

		    echo $e->getMessage() . PHP_EOL;
		    echo $e->getCode() . PHP_EOL;

		    if ( $e instanceof WC_API_Client_HTTP_Exception ) {

		        print_r( $e->get_request() );
		        print_r( $e->get_response() );
		    }
		}
	}

	public function index() {
		print_r($this->woo_client->products->get(23) );
	}

} // end of API Controller Class



