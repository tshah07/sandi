<?php 

class Books_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}

	function searchBook($str='') {
		
		$str = "%".$str."%";
		// Query for : Fetching data from books table where any of column = 'str'
		// Data returned from this query is a single column i.e all column info is concatinated (because of future use of autocomplete function)
		$sql = "SELECT concat(title,' ',author,' ',isbn,' ',publisher) as name FROM `books` where title like '$str' or author like '$str' or isbn like '$str' or publisher like '$str'";
		echo $sql;
		$data = $this->db->query($sql)->result();
		$data = json_encode($data);

		return $data;
	}


}

?>