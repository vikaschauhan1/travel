<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
		$this->load->model('users');
		$details = $this->users->get_user_details($this->session->userdata('id'));
		$this->account_settings($details);
	}
	function account_settings($details){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Id', 'required|users.unique');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('Adhar_no', 'Aadhar Number', 'required');
		$this->form_validation->set_rules('licence_no', 'Licence Number', 'required');
		$this->form_validation->set_rules('valid_up_to', 'Date', 'required');
		$this->form_validation->set_rules('induction_year', 'Induction Year', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('setting');
			$this->load->model('country');
			$data['setting'] = $details;
			$data['main_content'] = 'backend/settings/settings';
            $data['countries'] = $this->country->getCountries();
			$data['title'] = 'Settings';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->load->model('setting');
			$data = $this->input->post();
			$this->setting->save_settings($data,$this->input->post('account_id'));
			$this->session->set_flashdata('message', 'Settings successfully saved');
			redirect('admin/settings', 'refresh');
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
