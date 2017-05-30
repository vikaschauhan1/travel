<?php
Class Newmodel extends CI_Model
{
	
	function getCountries()
	{
		$query = $this->db->get('country');
		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
		}

	 	return $row;
	}
    
    function getCountryById($id)
	{  
            $this->db->where('id', $id);
            $query = $this->db->get('country');

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
