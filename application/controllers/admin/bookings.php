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
        function earning(){
            $this->load->model('booking');
            
            $data['earning'] = $this->booking->getEarning($this->session->userdata('id'));
            
            $data['main_content'] = 'backend/bookings/earning';
            $data['title'] = 'earning';
			
            $this->load->view('includes/template', $data);
		
	}
        
        function rating(){
            $this->load->model('booking');
            $data = $this->input->Post();
            $data['member_id'] = $this->session->userdata('id');
            return $this->booking->saveRating($data);
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
