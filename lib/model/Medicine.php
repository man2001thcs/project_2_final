<?php
require_once(dirname(__FILE__).DS. "../controller/AppModel.php");
require_once(dirname(__FILE__).DS. "../controller/Helper.php");
require_once(dirname(__FILE__).DS. "../controller/Session.php");
require_once(dirname(__FILE__).DS. "../model/Medicine_type_s.php");
require_once(dirname(__FILE__).DS. "../model/Manufacturer.php");

class Medicine_M extends AppModel {
	protected $table = 'wp_medicine';
	protected $alias = 'WpMedicine';
	
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
		"price" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			),
			"isNumber" => array(
				"rule" => "isNumber",
				"message" => MSG_ERR_NUMER
			)
		),
		"remain_number" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			),
			"isNumber" => array(
				"rule" => "isNumber",
				"message" => MSG_ERR_NUMER
			)
		),
		"bought_number" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			),
			"isNumber" => array(
				"rule" => "isNumber",
				"message" => MSG_ERR_NUMER
			)
		),
		"HSD" => array(
			"form" => array(
				"type" => "text"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			),
			"isNumber" => array(
				"rule" => "isNumber",
				"message" => MSG_ERR_NUMER
			)
		),
		"description" => array(
			"form" => array(
				"type" => "textarea"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		),
		"manual" => array(
			"form" => array(
				"type" => "textarea"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		),
		"described" => array(
			"form" => array(
				"type" => "textarea"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		),
		"type" => array(
			"form" => array(
				"type" => "select",
				"options" => array()
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		),
		"manufacturer_id" => array(
			"form" => array(
				"type" => "select",
				"options" => array()
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => MSG_ERR_NOTEMPTY
			)
		)		
	);
	
	public function __construct() {
		$type1 = new Medicine_type_s();
		$catList1 = $type1->findAll();

		$type2 = new Manufacturer();
		$catList2 = $type2->findAll();
		
		$cats1 = array("--Select--");
		if (!empty($catList1)) {
			foreach ($catList1 as $cat1) {
				$cats1[$cat1['WpMedicineTypeS']['id'] ?? ""] = $cat1['WpMedicineTypeS']['name'];
			}
		}

		$cats2 = array("--Select--");
		if (!empty($catList2)) {
			foreach ($catList2 as $cat2) {
				//echo json_encode($cat2);
				$cats2[$cat2['WpManufacturer']['id'] ?? ""] = $cat2['WpManufacturer']['name'];
			}
		}
		
		$this->rules['type']['form']['options'] = $cats1;
		$this->rules['manufacturer_id']['form']['options'] = $cats2;
		
		parent::__construct();
		
		$this->session = new Session();
	}
	
}