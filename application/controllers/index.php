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
           $data['guideRowset'] = array();
           $data['selectedlocation'] = '';
           
            if($this->input->Post('search')){
               $data['selectedlocation'] = $this->input->Post('location');
               $data['guideRowset'] = $this->profile->getGuidesByLocation($data['selectedlocation']);
           }else{
               $data['guideRowset'] = $this->profile->getGuidesByLocation();
           }
           
           $data['location'] = $this->location->get_locations();
	   $this->load->view('frontend/index', $data);
	}

    


}

?>
