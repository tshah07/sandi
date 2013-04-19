<?php 
if (!defined('BASEPATH')) die();
class Main extends Main_Controller{
	public function  index(){
		$this->load->view('include/header');
		$this->load->view('main');
		$this->load->view('include/footer');
		}
}