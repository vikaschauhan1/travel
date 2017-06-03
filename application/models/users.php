<?php
Class Users extends CI_Model
{
	function validate()
	{
	   $this->db->where('email', $this->input->post('email'));
	   $this->db->where('password', MD5($this->input->post('password')));

	   $query = $this->db->get('users');

	   if($query->num_rows != 0)
	   {
	     return true;
	   }

	 }
         function validatePassword($data){
            $this->db->where('id', $data['id']);
            $this->db->where('password', MD5($data['oldpassword']));

            $query = $this->db->get('users');

             if ($query->num_rows() > 0){
                 return true;
             }
             else{
                 return false;
             }

         }
	function mail_exists($key)
	{
    $this->db->where('email',$key);
    $query = $this->db->get('users');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
	}
	function show_users($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->where('id !=', 1);
	 	$query = $this->db->get('users');
	 	return $query->result();
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

	function get_user_details($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}

   function get_details($email)
	{
		$this->db->where('email', $email);
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
        
        function resetPassword($data){
            
        }
        
	function create_user($data)
	{
		$crop_data = elements(array('firstname','lastname','email','phone','password','role'), $data);
		$add_user = $this->db->insert_string('users', $crop_data);
		$this->db->query($add_user);
	}
	
	function user_role($email){
		$this->db->select('role');
		$this->db->where('email',$email);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->role;
		}
	}
	function member_id($username){
		$this->db->select('id');
		$this->db->where('username',$username);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->id;
		}
	}
	function member_language($username){
		$this->db->select('language');
		$this->db->where('username',$username);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->language;
		}
	}
}
?>
