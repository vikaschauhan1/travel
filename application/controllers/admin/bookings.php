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
            $isguide = $details->role == 1? false : true; 
            $data['allBookings'] = $this->booking->getBookingDetail($this->session->userdata('id'), $isguide);
            $data['details'] = $details;
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
