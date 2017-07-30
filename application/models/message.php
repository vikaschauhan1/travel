<?php

Class Message extends CI_Model {

    function sendMessage($data) {
       try {
               $this->db->insert('messages', $data);
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            die;
        }
        return true;
    }
}

?>
