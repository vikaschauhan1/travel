<?php
Class Profile extends CI_Model
{
	
	function get_profile($id){
		
        $this->db->where('user_id', $id);
		$query = $this->db->get('users_profile');
		
        if($query->num_rows() > 0){
                
            $row = $query->row();
                        return $row;
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
	      
	function save_profile($data){         
            
        $this->db->where('user_id', $data['user_id']);
        $query = $this->db->get('users_profile');
		
        if($query->num_rows() > 0){
            $this->db->update('users_profile', $data);
        }else{
            $this->db->insert('users_profile', $data);
        }
		
	}

	
}
?>
