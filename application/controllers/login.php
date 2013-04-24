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
		
		
		if ($_GET['username'] == '' or $_GET['password'] == '') {
			$data['error'] = "Please Login First with ur readerId</br> Use username = 1 and Password = sandy";
			redirect('/');
		}
		
		$username = $_GET['username'];
		$password = $_GET['password'];
		
		
		$loggedIn = $this -> session -> userdata('logged_in');
		
		if($loggedIn == 1){
			redirect('/reader');
		}
		if (!isset($loggedIn) || empty($loggedIn)) {

			// $sql = "SELECT * FROM  `readers` WHERE readerId =  '$username'";
			// $password_verify = $this -> db -> query($sql) -> result_array();
			// $password_verify = $password_verify[0]['password'];

			// Remove this line once done
			$password_verify = 'tj';
			$username = 2;
			if ($password == $password_verify) {
				$sessionData = array('readerId' => "$username", 'logged_in' => 1);
				$this -> session -> set_userdata($sessionData);
				redirect('/reader');
			}

		}

		redirect('/login');
		$this -> load -> view('include/footer');

	}
	
	public function logout()
	{
		$data =  array('readerId' => '', 'logged_in' => 0);
		$this->session->set_userdata($data);
		redirect('/login');
	}
	
	

}
