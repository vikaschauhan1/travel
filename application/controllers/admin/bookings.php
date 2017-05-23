<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookings extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
        $this->is_logged_in();
	}
	function index(){
		$this->load->model('users');
		$details = $this->users->get_user_details($this->session->userdata('id'));
        $this->view($details);
	}
	function view($details){
        
		
			$this->load->model('booking');
			$this->load->model('location');
            $this->users->get_user();
            $data['locationRow'] = $this->location->getLocationById($this->input->post('location_id'));
            $data['bookingPage'] = $this->input->post('bookingPage',0);
            $data['main_content'] = 'backend/bookings/booking';
            $data['title'] = 'Bookings';
			
            $this->load->view('includes/template', $data);
		
	}



	private function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login');
            die();
		}
	}
}
?>
