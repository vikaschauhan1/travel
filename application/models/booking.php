<?php
Class Booking extends CI_Model
{
	
	function getBookings($id, $isGuide = true){
		
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
    
    function getGuidesByLocation($locationId){
        
        $this->db->select('users_profile.id, users_profile.location_id,users_profile.about_me, users_profile.age, users_profile.gender, '
                . 'users.firstname, users.lastname, users.email, users.phone, users.role', false);
        $this->db->from('users_profile');
        $this->db->join('users', 'users_profile.user_id = users.id');
        $this->db->where('users.role = ', '2');
        $this->db->where('users_profile.location_id = ', $locationId);
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            $rows = $query->result_array();
            return $rows;
		}
        
        return array();
        
    }
	      
	function saveBooking($data){         
            
        $query = $this->db->get('bookings');
        $this->db->insert('bookings', $data);
        
		
	}

	
}
?>
