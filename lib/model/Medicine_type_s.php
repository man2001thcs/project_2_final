<?php
require_once(dirname(__FILE__).DS. "../controller/AppModel.php");
require_once(dirname(__FILE__).DS. "../controller/Helper.php");
require_once(dirname(__FILE__).DS. "../controller/Session.php");

class Medicine_type_s extends AppModel {
	protected $table = 'wp_medicine_type_s';
	protected $alias = 'WpMedicineTypeS';
	
	private $session = null;
	
	protected $rules = array(
		"id" => array(
			"form" => array(
				"type" => "hidden"
			)
		),
		"name" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		),
		"support" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		)
	);
	
	public function __construct() {
		parent::__construct();
		
		$this->session = new Session();
	}
	
}