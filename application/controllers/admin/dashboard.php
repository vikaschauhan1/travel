<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){

		$this->load->model('users');
		$this->load->model('profile');
		$data['details'] = $this->users->get_user_details($this->session->userdata('id'));
        $data['users_profile'] = $this->profile->get_profile($this->session->userdata('id'));
        $data['rating'] = $this->profile->getAvgRating($this->session->userdata('id'));
        $data['rank'] = $this->profile->getRank($this->session->userdata('id'));
		$data['main_content'] = 'backend/dashboard/dashboard';
		$data['title'] = 'Dashboard';
		$this->load->view('includes/template', $data);
	}


	private function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('login?logout=1');
			die();
		}
	}

}

?>
