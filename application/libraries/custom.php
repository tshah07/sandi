<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Custom {
	// THis functio adds days to specific date
	//If no date is provided then Systemdate will be considered\
	//$date = strtotime(date("Y-m-d", strtotime($date)) . " +20 day");

	public function addDate($date = '', $numberOfDays) {
		
		
		if($date =='')
			$date = date('y-m-d h:i:s', time());
		
		
		//Adding 20 days to starting date
		$date = strtotime(date("Y-m-d", strtotime($date)) . "$numberOfDays");
		$date = date('Y-m-d', $date);
		return $date;
	}

}
