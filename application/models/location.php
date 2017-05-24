<?php
Class Location extends CI_Model
{
	
	function get_locations()
	{
		$query = $this->db->get('location');
		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
		}

	 	return $row;
	}
    
    function getLocationById($id)
	{  
            $this->db->where('id', $id);
            $query = $this->db->get('location');

            $row = array();

            if($query->num_rows() > 0)
                    {
                            $row = $query->row();
                    return $row;
                    }

            return $row;
	}

}
?>
