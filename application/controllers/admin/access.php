<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends CI_Controller {
    
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
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passagain]|md5');
		$data['user_id'] = $this->session->userdata('id');

            if ($this->form_validation->run() == FALSE){
                $data['main_content'] = 'backend/access/access';
                $data['title'] = 'access';
                $this->load->view('includes/template', $data);
            } else {
                
                $data = $this->input->post();
                $this->users->resetPassword($data);
                $this->session->set_flashdata('message', 'profile successfully saved');
                redirect('admin/profiles', 'refresh');
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
