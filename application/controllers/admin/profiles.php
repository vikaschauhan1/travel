<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
                
		$this->load->model('profile');
		$details = $this->profile->get_profile($this->session->userdata('id'));
		$this->view($details);
	}
	function view($details){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('age', 'Age', 'required|max(100)');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$data['role'] = $this->session->userdata('role');
        $data['user_id'] = $this->session->userdata('id');

            if ($this->form_validation->run() == FALSE){
                    
            $this->load->model('location');
            $this->load->model('profile');
            $this->load->model('language');
            $data['profile'] = $details;


            $data['location'] = $this->location->get_locations();
            if($data['role'] == 2){
                $data['languages'] = $this->language->getLanguages();
            }
			$data['main_content'] = 'backend/profile/profiles';
			$data['title'] = 'Profile';
			$this->load->view('includes/template', $data);
		}else{
			$this->load->model('profile');
			$data = $this->input->post();
            $data['location_id'] = $data['location'];
            unset($data['location']);
            $this->profile->save_profile($data);
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
