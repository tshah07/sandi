<?php 
if (!defined('BASEPATH')) die();
class Reader extends Main_Controller{

	public function index() {

		$this->load->view('include/header');
		
		$this->searchBook();
		$this->load->view('include/footer');

	}

	public function searchBook($name='') {
		
		$this->load->model('books_model');
		$data = $this->books_model->searchBook('');
		print_r($data);

	}


}