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
    
    function getMessage($userId){
        $this->db->select('messages.send_by,messages.send_to, messages.subject, messages.message,'
                . 'users.firstname, users.lastname', false);
        $this->db->from('messages');
        $this->db->join('users', 'messages.send_by = users.id');
        $this->db->where('messages.send_to = ', $userId);
       
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $rows = $query->result_array();
            return $rows;
        }

        return array();
    }
}

?>
