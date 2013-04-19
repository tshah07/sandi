<?php if (!defined('BASEPATH')) die();
class Frontpage extends Main_Controller {

	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('templates/login');
		$this->load->view('include/footer');
	}

	public function getHotels(){
		$this->load->view('include/header');
		$this->load->view('frontpage');

		$this->load->model('hotel_model');
		$data = $this->hotel_model->getHotelsList('long island city','ny','usa','04-11-2013','04-12-2013');
		$grid['gridData'] = $data->HotelListResponse->HotelList->HotelSummary;
	
		$this->load->view('grid',$grid);
		

			


		$this->load->view('include/footer');
	}

}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
