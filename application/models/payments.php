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
  
}

?>
