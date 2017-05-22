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

}
?>
