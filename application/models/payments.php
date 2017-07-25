<?php

Class Payments extends CI_Model {

    function saveTransaction($data) {
        try {
            $this->db->insert('payments', $data);
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            die;
        }
        return true;
    }
    function getBookingPayment($data){
        $whereCond = array('booking_id' => $data['booking_id'], 'payment_status' => 'Completed');

        $this->db->where($whereCond);
        $query = $this->db->get('payments');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
       return array();
    }
  
}

?>
