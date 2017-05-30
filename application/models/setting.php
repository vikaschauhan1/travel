<?php
Class Setting extends CI_Model
{
	
	function show_settings()
	{
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}

		function get_user($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}
	function save_user($data, $id)
	{

		if (empty($data['password'])) {
			$crop_data = elements(array('firstname','lastname','username','role','email'), $data);
		} else {
			$crop_data = elements(array('firstname','lastname','username','password','role','email'), $data);
		}

		$this->db->where('id', $id);
		$this->db->update('users', $crop_data);
	}

	function save_settings($data,$id)
	{   
        unset($data['account_id']);
        $this->db->where('id', $id);
		$this->db->update('users', $data);
	}



}
?>
