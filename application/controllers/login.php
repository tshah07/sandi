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
	
	
	// Reader login function 
	
	public function readerLogin() {
<<<<<<< HEAD
		
		
		if ($_GET['username'] == '' or $_GET['password'] == '') {
			$data['error'] = "Please Login First with ur readerId</br> Use username = 2 and Password = sandy";
			redirect('/');
		}
		
		$username = $_GET['username'];
		$password = $_GET['password'];
		
=======
		// Get username and password from form
		$username = $_GET['username'];
		$password = $_GET['password'];

		// Checking if one of both fields are not empty
		if ($username == '' or $password == '') {
			$data['error'] = "Please Login with valid credential(REaderid Is ur username)";
		}
>>>>>>> 528ea6236da0a622dd01d2b900ec8dcb780d97de
		
		// If not empty then check if he is already logged in? 
		$loggedIn = $this -> session -> userdata('logged_in');
		
		if($loggedIn == 1){
			redirect('/reader');
		}
<<<<<<< HEAD
		if (!isset($loggedIn) || empty($loggedIn)) {
=======
		
		// If session doesnt contain any login info then push username and password 
		// Check it with reader table for password
		if (!isset($loggedIn)) {
>>>>>>> 528ea6236da0a622dd01d2b900ec8dcb780d97de

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
