<?php
if (!defined('BASEPATH'))
	die();
class Admin extends Main_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> view('include/header');
		$this -> load -> model('books_model');
	}

	public function index() {
		
		$this -> load -> view('admin/index');
		$this ->load->view('reader/search');
		$this -> load -> view('include/footer');

	}

	public function addBook() {

		$status = $this -> books_model -> addBook($_POST['title'], $_POST['isbn'], $_POST['author'], $_POST['publisher'], $_POST['publishDate']);
		
		echo "Book Added ".$_POST['title']."-".$_POST['isbn'];
		return $status;
	}

	public function searchBranchId() {
		$term = $_GET["term"];
		$data = $this -> books_model -> searchBranchId($term);
		print_r(json_encode($data));
	}
	
	public function branch()
	{
		// By passing no value , it will give all results
		$data['branches'] = $this->books_model->getAllBranches();
		$this->load->view('admin/branchAll',$data);
		$this -> load -> view('include/footer');
	}
	
	public function branchDetails()
	{
		$branchId= $_GET['branchId'];
		$data['books'] = $this->books_model->getBranchDetails($branchId);
		$this->load->view('admin/branchDetails',$data);
		$this -> load -> view('include/footer');
	}

}
