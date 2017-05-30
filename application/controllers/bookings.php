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
	}
	function book(){
        
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('booking_date', 'Date', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('booking');
			$this->load->model('location');
                        $this->load->model('profile');
                        if($this->input->get('is_booking',0)){
                            $data['location_id'] = $this->input->get('location_id');
                            $data['guide_id'] = $this->input->get('guide_id');
                        }else{
                           $data['location_id'] = $this->input->post('location_id');
                            $data['guide_id'] = $this->input->post('guide_id'); 
                        }
                        $this->profile->save_profile(array('user_id' => $data['guide_id'], 'views' => 1));
                        $data['locationRow'] = $this->location->getLocationById($data['location_id']);
                        $data['bookingPage'] = $this->input->post('bookingPage',0);
                        $data['title'] = 'Bookings';

                         $this->load->view('frontend/booking', $data);
		}
		else
		{
			$this->load->model('booking');
			$data['member_id'] = $this->session->userdata('id');
                        $data['guide_id'] = $this->input->post('guide_id');
                        $data['location_id'] = $this->input->post('location_id');
                        $data['submission_date'] = date('Y-m-d');
                        $data['booking_date'] = $this->input->post('booking_date');
                        $data['booking_detail'] = $this->input->post('booking_detail');
            
			$this->booking->saveBooking($data);
			$this->session->set_flashdata('message', 'Guide has booked');
                        
			redirect('admin/bookings', 'refresh');
		}
	}



	private function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
            
            redirect('login?is_booking=1&guide='.$this->input->post('guide_id').'&location='.$this->input->post('location_id'));
            die();
		}
	}
}
?>
