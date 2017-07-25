<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('payments');
     }
     
     function success(){
        //get the transaction data
        $paypalInfo = $this->input->post();
        $data['booking_id'] = $paypalInfo['custom']; 
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["payment_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];
        //pass the transaction data to view
        $paymentdetail = $this->payments->getBookingPayment($data);
        if(empty($paymentdetail)){
            $this->payments->saveTransaction($data);
        }
        
        $this->load->view('paypal/success', $data);
     }
     
     function cancel(){
        $this->load->view('paypal/cancel');
     }
     
     function ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();
        $data['booking_id'] = $paypalInfo['custom']; 
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["payment_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];
        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
        $this->load->model('payments');
        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database
            $this->payments->saveTransaction($data);
        }
    }
}