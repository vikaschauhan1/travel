<?php
Class Booking extends CI_Model
{
	
	function getBookings($id, $isGuide = false){
		
        if($isGuide){
            $this->db->where('guide_id', $id);
        }else{
            $this->db->where('member_id', $id);
        }
        $query = $this->db->get('bookings');
		
        if($query->num_rows() > 0){
            $rows = $query->result_array();
            return $rows;
        }
        return array();
	 	
	}
    
    function getBookingDetail($id, $isGuide = false){
        
        $this->db->select('bookings.member_id,bookings.guide_id, bookings.booking_date, bookings.booking_detail,'
                . 'bookings.location_id, users.lastname, users.firstname,users.email, users.phone,'
                . ' bookings.submission_date,location.location, users_profile.price', false);
        $this->db->from('bookings');
        $this->db->join('location', 'bookings.location_id = location.id');
        if($isGuide){
            $this->db->join('users', 'bookings.member_id = users.id');
            $this->db->join('users_profile', 'bookings.guide_id = users_profile.user_id');
            $this->db->where('bookings.guide_id = ', $id);
        }else{
            $this->db->join('users', 'bookings.guide_id = users.id');
            $this->db->join('users_profile', 'bookings.guide_id = users_profile.user_id');
            $this->db->where('bookings.member_id = ', $id);
        }
       
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            $rows = $query->result_array();
            return $rows;
        }
        
        return array();
        
    }
	      
	function saveBooking($data){ 
        
        $whereCond = array('guide_id' => $data['guide_id'], 'member_id' => $data['member_id']);

        $this->db->where($whereCond);         
        $query = $this->db->get('bookings');
        
        if($query->num_rows() > 0){
           $this->db->update('bookings', $data);
        }else{
            $this->db->insert('bookings', $data);
        }
        
		
	}

	
}
?>
