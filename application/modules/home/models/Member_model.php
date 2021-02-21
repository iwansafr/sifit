<?php
class Member_model extends CI_Model
{
	public function check_exist($username = '')
	{
		if(!empty($username))
		{
			$user = $this->db->query('SELECT id FROM user WHERE username = ?',$username)->row_array();
			if(!empty($user))
			{
				return true;
			}
		}
	}
}