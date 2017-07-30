<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
                
            $this->load->model('users');
            $this->load->model('message');
            $this->load->model('booking');
            $details = $this->users->get_user_details($this->session->userdata('id'));
            $this->view($details);
	}
	function view($details){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('receiver', 'receiver', 'trim|required');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		
                $isguide = $details->role == 1? false : true; 
            if ($this->form_validation->run() == FALSE){
                $data['main_content'] = 'backend/messages/messages';
                $data['receivers'] = $this->booking->getBookingDetail($this->session->userdata('id'), $isguide);
                $data['title'] = 'Messages';
                $this->load->view('includes/template', $data);
            } else {
                
                $data = $this->input->post();
                if($isguide){
                    $data['user_id'] = $data['receiver'];
                    $data['guide_id'] = $this->session->userdata('id');
                } else{
                    $data['guide_id'] = $data['receiver'];
                    $data['user_id'] = $this->session->userdata('id');
                }
                unset($data['receiver']);
                $this->message->sendMessage($data);
                $this->session->set_flashdata('message', 'Message Sent successfully!');
                redirect('admin/messages', 'refresh');
            }
		
        }
        
	private function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			echo 'login please';
			die();
		}
	}
}
?>
