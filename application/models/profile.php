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
    
    function getGuidesByLocation($locationId = 0, $languageId = 0, $priceFilter = 0){
        
        $this->db->select('users_profile.id, users_profile.location_id,users_profile.about_me, users_profile.age, users_profile.gender, '
                . 'users.firstname,users_profile.user_id, users_profile.views, users_profile.price, users_profile.language_id,location.location, users.lastname, users.email, users.phone, users.role, languages.language', false);
        $this->db->from('users_profile');
        $this->db->join('users', 'users_profile.user_id = users.id');
        $this->db->join('location', 'location.id = users_profile.location_id');
        $this->db->join('languages', 'users_profile.language_id = languages.id');
        $this->db->where('users.role = ', '2');
       
        if($languageId){
            $this->db->where('users_profile.language_id = ', $languageId);
        }
        if($locationId){
            $this->db->where('users_profile.location_id = ', $locationId);
        }
        
        if($priceFilter){
            $pricefilterRange = $this->getPriceRangeFilter($priceFilter);
            if($pricefilterRange['price_from']){
                $this->db->where('users_profile.price >= ', $pricefilterRange['price_from']);
            }
            if($pricefilterRange['price_to']){
                $this->db->where('users_profile.price <= ', $pricefilterRange['price_to']);
            }
        }
        
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $rows = $query->result_array();
            return $rows;
        }
        
        return array();
        
    }
    function getPriceRangeFilter($priceFilter){
        
        $pricefilterRange = array();
        
        switch($priceFilter){
            case 1:
                $pricefilterRange['price_from'] = 0;
                $pricefilterRange['price_to'] = 500;
            break;
            case 2:
                $pricefilterRange['price_from'] = 501;
                $pricefilterRange['price_to'] = 1000;
            break;
            case 3:
                $pricefilterRange['price_from'] = 1001;
                $pricefilterRange['price_to'] = 2000;
            break;
            case 4:
                $pricefilterRange['price_from'] = 2001;
                $pricefilterRange['price_to'] = 3000;
            break;
            case 5:
                $pricefilterRange['price_from'] = 3001;
                $pricefilterRange['price_to'] = 4000;
            break;
            case 6:
                $pricefilterRange['price_from'] = 4001;
                $pricefilterRange['price_to'] = 5000;
            break;
            case 7:
                $pricefilterRange['price_from'] = 5001;
                $pricefilterRange['price_to'] = 0;
            break;
                
        }
        return $pricefilterRange;
        
    }
	      
	function save_profile($data){         
            
        $this->db->where('user_id', $data['user_id']);
        $query = $this->db->get('users_profile');
		
        if($query->num_rows() > 0){
            
            if($data['views']){
                $row = $query->row();;
                $viewData['views'] = $row->views + 1;
                $this->db->where('user_id', $data['user_id']);
                $this->db->update('users_profile', $viewData);
            } else {
                $this->db->update('users_profile', $data);
            }
        }else{
            $this->db->insert('users_profile', $data);
        }
		
	}

	
}
?>
