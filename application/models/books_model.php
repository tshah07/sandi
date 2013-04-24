<?php

class Books_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function searchBook($str = '') {

		$str = "%" . $str . "%";
		// Query for : Fetching data from books table where any of column = 'str'
		// Data returned from this query is a single column i.e all column info is concatinated (because of future use of autocomplete function)
		$sql = "SELECT concat(title,' | ',author,' | ',isbn,' | ',publisher) as label FROM `books` where title like '$str' or author like '$str' or isbn like '$str' or publisher like '$str'";
		//echo $sql;
		$data = $this -> db -> query($sql) -> result_array();
		return ($data);
	}

	function addBook($title, $isbn = null, $author = NULL, $publisher = NULL, $publishDate = NULL, $branchId , $numberOfBooks = '', $position = '') {
		if ($title == '') {
			echo "Please Enter Title for Book";
			return FALSE;
		}

		//If branchId , numberOfBooks or position is assigned as default
		if ($branchId == '') {
			$branchId = '1';
		}
		if ($numberOfBooks == '') {
			$numberOfBooks = '1';
		}
		if ($position == '') {$position = 'not assigned';
		}

		// Updating books database
		$sql = "INSERT INTO `sandeep`.`books` (`bookId`, `title`, `isbn`, `author`, `publisher`, `publishDate`) VALUES (NULL, '$title', '$isbn','$author', '$publisher', '$publishDate')";
		$this -> db -> query($sql);
		echo "$sql";

		//Get BookId Of recently inserted one so that we can use it to update branchdetails
		// as our branchdetails has a child key bookId referencing to bookId

		$sql = "SELECT bookId FROM `books` where title = '$title' and isbn = '$isbn' and author = '$author' and publisher = '$publisher'";
		$data = $this -> db -> query($sql) -> result_array();
		echo "$sql";
		$bookId = $data[0]['bookId'];

		//Updating branches , adding book to that branch

		$sql = "INSERT INTO `sandeep`.`branchdetails` (`branchId`, `bookId`, `numberOfBooks`, `position`) VALUES ('$branchId', '$bookId', '$numberOfBooks' , '$position');";
		echo $sql;
		$this -> db -> query($sql);
		return TRUE;
	}

	// Get all information about branches
	// Pass empty string if you want all branches

	function getAllBranches($id = '', $name = '', $location = '') {
		$sql = "SELECT * FROM `branches` WHERE branchId like'%$id%' or name like '%$name%' or location like '%$location%'";

		$data = $this -> db -> query($sql) -> result_array();
		return $data;
	}

	function getBranchDetails($id = '', $name = '', $location = '') {
		$sql = "SELECT br.name,br.location,bk.bookId,bk.title,bk.author,bk.isbn,position,bk.publisher,bk.publishDate ,bd.numberOfBooks\n" . "FROM `branchdetails` as bd \n" . "join `books` as bk on bd.bookId = bk.bookId \n" . "right outer join `branches` as br on br.branchId = bd.branchId \n" . "WHERE br.branchId = $id ";
		$data = $this -> db -> query($sql) -> result_array();
		echo "$sql";
		return $data;
	}

	// Function to search branch Id
	function searchBranchId($str = '') {

		$str = "'%" . $str . "%'";
		$sql = "SELECT concat(branchId,' | ',name,', ',location) as label FROM `branches` WHERE `name` LIKE $str  or `branchId` LIKE $str or `location` like $str";
		$data = $this -> db -> query($sql) -> result_array();
		return ($data);
	}

	//Show All books in library
	function showAllBooks() {
		$data = $this -> searchBookByParam();
		return $data;

	}

	function searchBookByParam($bookId = '', $title = '', $author = '', $isbn = '', $publisher = '', $publishDate = '') {

		$sql = "SELECT * FROM `books` where title like '%$title%' or author like '%$author%' or isbn like '%$isbn%' or publisher like '%$publisher%'";
		//$sql = "SELECT bd.bookId, bd.numberOfBooks,bd.position,bk.title,br.name FROM `branchdetails` as bd join books as bk on bk.bookId = bd.bookId join branches as br on br.branchId = bd.branchId where bk.bookId = $bookId ";

		$data = $this -> db -> query($sql) -> result_array();
		return $data;
	}

	function reserve($bookId, $readerId, $bDate) {

		if ($this -> bookAvailable($bookId)) {

			$sql = "SELECT bd.branchId, bd.bookId, bd.numberOfBooks,bd.position,bk.title,br.name FROM `branchdetails` as bd join books as bk on bk.bookId = bd.bookId join branches as br on br.branchId = bd.branchId where bk.bookId = $bookId ";
			$data = $this -> db -> query($sql) -> result_array();
			$branchId = $data[0]['branchId'];
			$title = $data[0]['title'];

			foreach ($data as $book) {

				// Check If book is avalaible or not
				if ($book['numberOfBooks'] > 0) {
					$oldNumberOfBooks = $book['numberOfBooks'];
					$newNumberOfBooks = $book['numberOfBooks'] - 1;
					// Get Reader Info
					$sql = '';
					$sql = "SELECT * FROM `readers` where readerId = $readerId ";
					$readerData = $this -> db -> query($sql) -> result_array();

					// Check If Reader is registered or not
					if ($readerData[0]['registered'] == 1) {
						$sql = '';
						$this -> load -> library('custom');

						// adding 20 days to start date for return date
						// Generate a unique Reservation id
						$resId = md5($bDate + $bookId + rand());
						// Add 20 days to borrow Date
						$rdate = $this -> custom -> addDate($bDate, '+20 day');

						// Inserting All values need to make reservation
						$sql = "INSERT INTO `sandeep`.`borrow` (`readerId`, `resId`, `bDate`, `rDate`, `bookId`,`branchId`) VALUES ('$readerId', '$resId', '$bDate', '$rdate', $bookId,'$branchId');";
						$data = $this -> db -> query($sql);

						//Updating : Substract number of books by 1
						$sql = "UPDATE `sandeep`.`branchdetails` SET `numberOfBooks` = '$newNumberOfBooks' WHERE `branchdetails`.`branchId` = '$branchId' AND `branchdetails`.`bookId` = '$bookId' AND `branchdetails`.`numberOfBooks` = '$oldNumberOfBooks'";
						$this -> db -> query($sql);

						$sql = "SELECT * FROM `borrow` WHERE `resId` = 20 ORDER BY `borrow`.`branchId`";

						$info = array('bDate' => $bDate, 'rDate' => $rdate, 'bookId' => $bookId, 'status' => '1', 'branchId' => $branchId, 'readerId' => $readerId, 'title' => $title, 'resId' => $resId);
						return $info;
					}

				}
			}

		} else {
			return false;

		}
	}

	function bookAvailable($bookId = '') {

		$sql = "SELECT bd.bookId, bd.numberOfBooks,bd.position,bk.title,br.name FROM `branchdetails` as bd join books as bk on bk.bookId = bd.bookId join branches as br on br.branchId = bd.branchId where bk.bookId = $bookId ";
		$data = $this -> db -> query($sql) -> result_array();
		if (empty($data)) {
			return false;
		} else {
			return $data;
		}

	}

}
?>