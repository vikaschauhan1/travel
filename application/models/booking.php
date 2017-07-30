<?php

Class Booking extends CI_Model {

    function getBookings($id, $isGuide = false) {

        if ($isGuide) {
            $this->db->where('guide_id', $id);
        } else {
            $this->db->where('member_id', $id);
        }
        $query = $this->db->get('bookings');

        if ($query->num_rows() > 0) {
            $rows = $query->result_array();
            return $rows;
        }
        return array();
    }

    function saveRating($data) {
        $whereCond = array('guide_id' => $data['guide_id'], 'member_id' => $data['member_id']);

        $this->db->where($whereCond);
        $query = $this->db->get('ratings');
        try {
            if ($query->num_rows() > 0) {
                $this->db->where($whereCond);
                $this->db->update('ratings', $data);
            } else {
                $this->db->insert('ratings', $data);
            }
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            die;
        }
        return true;
    }

    function getEarning($id) {
        $this->db->select('sum(users_profile.price) as price, bookings.guide_id', false);
        $this->db->join('users_profile', 'bookings.guide_id = users_profile.user_id');
        $this->db->from('bookings');
        $this->db->where('bookings.guide_id = ', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $rows = $query->row();
            return $rows;
        }

        return array();
    }
    
    function getBookingDetail($id, $isGuide = false) {

        $this->db->select('bookings.member_id,bookings.guide_id, bookings.booking_date, bookings.booking_detail,'
                . 'bookings.location_id, users.lastname, users.firstname,users.email, users.phone,'
                . ' bookings.submission_date,location.location, users_profile.price', false);
        $this->db->from('bookings');
        $this->db->join('location', 'bookings.location_id = location.id');

        if ($isGuide) {
            $this->db->join('users', 'bookings.member_id = users.id');
            $this->db->join('users_profile', 'bookings.guide_id = users_profile.user_id');

            $this->db->where('bookings.guide_id = ', $id);
        } else {
            $this->db->join('users', 'bookings.guide_id = users.id');
            $this->db->join('users_profile', 'bookings.guide_id = users_profile.user_id');

            $this->db->where('bookings.member_id = ', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $rows = $query->result_array();
            return $rows;
        }

        return array();
    }
    function getBookingRow(){
        $this->db->select('bookings.id, bookings.member_id,bookings.guide_id, bookings.booking_date, bookings.booking_detail,'
                . 'bookings.location_id, bookings.submission_date, users_profile.price', false);
        $this->db->from('bookings');
        $this->db->join('users_profile', 'bookings.guide_id = users_profile.user_id');
        $this->db->where('bookings.id = ', $this->session->userdata('booking_id'));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $rows = $query->row();
            return $rows;
        }

    }
    function getRating($data) {
        $whereCond = array('guide_id' => $data['guide_id'], 'member_id' => $data['member_id']);

        $this->db->where($whereCond);
        $query = $this->db->get('ratings');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return array();
    }

    function saveBooking($data) {

        $whereCond = array('guide_id' => $data['guide_id'], 'member_id' => $data['member_id'], 'booking_date' => $data['booking_date']);

        $this->db->where($whereCond);
        $query = $this->db->get('bookings');

        if ($query->num_rows() > 0) {
            $this->db->where($whereCond);
            $this->db->update('bookings', $data);
            $row = $query->row();
            $insert_id = $row->id;
        } else {
            $this->db->insert('bookings', $data);
            $insert_id = $this->db->insert_id();
        }
        
        $this->session->set_userdata('booking_id', $insert_id);
        
    }

}

?>
