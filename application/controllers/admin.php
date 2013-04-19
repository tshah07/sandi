<?php 
if (!defined('BASEPATH')) die();
class Admin extends Main_Controller{
	
	public function index() {
		$this->view->view('include/header');
		$this->view->view('include/footer');
		
	}
}