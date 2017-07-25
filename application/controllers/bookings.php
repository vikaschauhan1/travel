<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bookings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
    }

    function index() {
        $this->load->model('users');
        $details = $this->users->get_user_details($this->session->userdata('id'));
    }

    function book() {

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_rules('booking_date', 'Date', 'required');
        $this->form_validation->set_rules('hotel_booking', 'Hotel Booking', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('booking');
            $this->load->model('location');
            $this->load->model('profile');
            if ($this->input->get('is_booking', 0)) {
                $data['location_id'] = $this->input->get('location_id');
                $data['guide_id'] = $this->input->get('guide_id');
            } else {
                $data['location_id'] = $this->input->post('location_id');
                $data['guide_id'] = $this->input->post('guide_id');
            }
            $data['numberOfPerson'] = $this->input->post('number_of_persons');
            $data['numberOfDaynight'] = $this->input->post('number_day_night');
            $data['bookingDetail'] = $this->input->post('booking_detail');
            $this->profile->save_profile(array('user_id' => $data['guide_id'], 'views' => 1));
            $data['locationRow'] = $this->location->getLocationById($data['location_id']);
            $data['bookingPage'] = $this->input->post('bookingPage', 0);
            $data['title'] = 'Bookings';

            $this->load->view('frontend/booking', $data);
        } else {
            $this->load->model('booking');
            $data['member_id'] = $this->session->userdata('id');
            $data['guide_id'] = $this->input->post('guide_id');
            $data['location_id'] = $this->input->post('location_id');
            $data['submission_date'] = date('Y-m-d');
            $data['booking_date'] = $this->input->post('booking_date');
            $data['booking_detail'] = $this->input->post('booking_detail');
            $data['number_of_persons'] = $this->input->post('number_of_persons');
            $data['number_day_night'] = $this->input->post('number_day_night');
            $data['hotel_booking'] = $this->input->post('hotel_booking');
            
            $this->booking->saveBooking($data);
            $this->session->set_flashdata('message', 'Guide has booked');
            
            redirect('bookings/payment', 'refresh');
        }
    }
    function payment(){
        $returnURL = base_url().'index.php/paypal/success'; //payment success url
        $cancelURL = base_url().'index.php/paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'index.php/paypal/ipn'; //ipn url
        //get particular product data
        $this->load->model('booking');
        $bookingRow = $this->booking->getBookingRow();
        
        $userID = $this->session->userdata('id');; //current user id
        
        
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('custom', $bookingRow->id);
        $this->paypal_lib->add_field('amount',  $bookingRow->price);        
        
        $this->paypal_lib->paypal_auto_form();
    }

    private function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {

            redirect('login?is_booking=1&guide=' . $this->input->post('guide_id') . '&location=' . $this->input->post('location_id'));
            die();
        }
    }

}

?>
