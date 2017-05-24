<?php
Class Language extends CI_Model
{
	
	function getLanguages()
	{
		$query = $this->db->get('languages');
		if($query->num_rows() > 0)
		{
			$rows = $query->result_array();
		}

	 	return $rows;
	}
    
    function getLanguageById($id)
	{  
            $this->db->where('id', $id);
            $query = $this->db->get('languages');

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
