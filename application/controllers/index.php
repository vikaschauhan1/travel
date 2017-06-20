<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
    function __construct()
	{
		parent::__construct();
	}

	function index()
	{
	   $data['title'] = 'Welcome';
           $this->load->model('location');
           $this->load->model('profile');
           $this->load->model('users');
           $this->load->model('language');
           
           $data['selectedlocation'] = '';
           $data['selectedlanguage'] = array();
            if($this->input->Post('search')){
               $data['selectedlocation'] = $this->input->Post('location');
               $data['selectedlanguage'] = $this->input->Post('language_id') ? $this->input->Post('language_id') : array();
               $data['price'] = $this->input->Post('price');
               $data['gender'] = $this->input->Post('gender');
               $data['age'] = $this->input->Post('age');
               $data['experience'] = $this->input->Post('experience');
               $data['guideRowset'] = $this->profile->getGuidesByLocation($data['selectedlocation'], $data['selectedlanguage'], $data['price'], 
               $data['gender'], $data['age'], $data['experience']);
           }else{
               $data['guideRowset'] = $this->profile->getGuidesByLocation();
           }
           $data['languages'] = $this->language->getLanguages();
           $data['location'] = $this->location->get_locations();
	   $this->load->view('frontend/index', $data);
	}

    


}

?>
