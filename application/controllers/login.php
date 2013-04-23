<?php

/**
 *
 */
class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> view('include/header');

	}
	
	public function index()
	{
		$this->load->view('templates/login');
		$this->load->view('include/footer');
	}
	
	

	public function readerLogin() {
		$username = $_GET['username'];
		$password = $_GET['password'];

		if ($username == '' or $password == '') {
			$data['error'] = "Please Login with valid credential(REaderid Is ur username)";
		}
		
		$loggedIn = $this -> session -> userdata('logged_in');
		
		if(isset($loggedIn)){
			redirect('/reader');
		}
		if (!isset($loggedIn)) {

			$sql = "SELECT * FROM  `readers` WHERE readerId =  '$username'";
			$password_verify = $this -> db -> query($sql) -> result_array();
			$password_verify = $password_verify[0]['password'];

			if ($password == $password_verify) {
				$sessionData = array('readerId' => $username, 'logged_in' => TRUE);
				$this -> session -> set_userdata($sessionData);
			}

		}

		$this -> load -> view('include/footer');

	}
	
	public function logout()
	{
		$data =  array('readerId' => '', 'logged_in' => false);
		$this->session->set_userdata($data);
		redirect('/login');
	}
	
	

}
