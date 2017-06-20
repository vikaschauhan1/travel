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
    
    function getLanguagesByIds($languageIds = array())
	{   
        $this->db->select('GROUP_CONCAT(languages.language) as language', false);
        $this->db->from('languages');
        $this->db->where_in('languages.id', $languageIds);
		
        $query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$rows = $query->row();
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
