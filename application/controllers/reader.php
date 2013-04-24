<?php
if (!defined('BASEPATH'))
	die();
class Reader extends Main_Controller {
	var $readerId;

	public function __construct() {
		parent::__construct();
		$this -> load -> model('books_model');

		date_default_timezone_set('America/New_York');
		$logged_in = $this -> session -> userdata('logged_in');
		$this -> readerId = $this -> session -> userdata('readerId');
		if (!isset($logged_in) || empty($logged_in)) {
			redirect('/login/readerLogin');
		}

	}

	public function index() {
		
		$this -> load -> view('include/header');
		$this -> load -> view('reader/index');
		$this -> load -> view('reader/search');
		$this -> showAllBooks();
		$this -> load -> view('include/footer');

	}

	public function searchBooks() {

		//$this->load->view('include/header');
		$q = $_GET["term"];

		$data = $this -> books_model -> searchBook($q);
		print_r(json_encode($data));
	}

	public function showAllBooks() {
		//$this -> load -> view('include/header');

		$data['books'] = $this -> books_model -> showAllBooks();
		$data['readerId'] = $this -> readerId;

		$this -> load -> view('reader/showAllBooks', $data);
		$this -> load -> view('include/footer');

	}

	// Function to reserve books
	// params needed bookId, readerId
	public function reserve() {
		$this -> load -> view('include/header');
		if ($_GET['bookId'] == '' or $_GET['readerId'] == '') {
			echo "Pleae Select A book";
		}

		$date = date('y-m-d h:i:s', time());
		$data = $this -> books_model -> reserve($_GET['bookId'], $_GET['readerId'], $date);
		print_r($data);
		if (empty($data))
			echo "Book Not available. Please CheckBack Later";

	}

}
