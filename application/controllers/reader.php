<?php 
if (!defined('BASEPATH')) die();
class Reader extends Main_Controller{

	public function index() {

		$this->load->view('include/header');
		print_r( '<div class="row-fluid">');
		
		$this->searchBook();
		echo '</div>';
		$this->load->view('include/footer');

	}

	public function searchBook($name='') {
		
		$data['fields'] = array(array(
						'name' => 'Book Name',
						'type' => 'text',
						'default' => 'search By Book'
				));

		$this->load->view('templates/form',$data);
		

	}


}