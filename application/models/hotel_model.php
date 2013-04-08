<?php
class Hotel_model extends CI_Model {


	function __construct() {
		parent::__construct();
		$this->load->session;
	}



	function getHotelsList($city='',$state='',$country='',$arrival='',$departure='') {

		$city = urlencode($city);
		$state = urlencode($state);
		$url = "http://api.ean.com/ean-services/rs/hotel/v3/list?";
		$url .="minorRev=14&apiKey=d2j7ufn9b6c5e2muza2bv83r&cid=392498&IP=64.202.61.13&locale=en_US";
		$url .="&city=$city&stateProvince=$state&countryCode=$country";
		$url .="&numberOfResults=20&searchRadius=50";
		$url .="&supplierCacheTolerance=MED_ENHANCED";
		$url .="&arrivalDate=$arrival";
		$url .="&departureDate=$departure&room1=2&_type=json";


		// Setting Session data
		$sessionData = array('city'=>$city,'state'=>$state,'country'=>$country,'arrival'=>$arrival,'departure'=>$departure);
		$this->session->set_userdata($sessionData);

		//getting data from url
		$data = file_get_contents("$url");
		return json_decode($data);



	}
}