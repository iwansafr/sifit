<?php
class Members_model extends CI_Model
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
	public function register_member()
	{
		$data        = $this->input->post();
		$gym_role_id = $this->get_gym_role_id();
		if(!empty($gym_role_id) && !empty($data))
		{
			if($this->db->insert('user',[
				'email' => $data['email'],
				'password' => encrypt($data['password']),
				'username' => $data['email'],
				'user_role_id' => $gym_role_id,
				'active' => 1
			]))
			{
				$this->db->update('gym',['user_id'=>$this->db->insert_id()]);
			}
		}
	}
	public function register_member_gym($member_id = 0)
	{
		$data        = $this->input->post();
		$member_role_id = $this->get_member_role_id();
		if(!empty($member_role_id) && !empty($data))
		{
			if($this->db->insert('user',[
				'email' => $data['email'],
				'password' => encrypt($data['password']),
				'username' => $data['email'],
				'user_role_id' => $member_role_id,
				'active' => 1
			]))
			{
				$last_id = $this->db->insert_id();
				$this->db->insert('gym_member_paket',[
					'gym_id' => $data['gym_id'],
					'user_id' => $last_id,
					'gym_paket_id'=> $data['paket_id'],
					'gym_member_id'=> $member_id,
				]);
				$this->db->update('gym_member',['user_id'=>$last_id]);
			}
		}
	}
	public function get_gym_role_id()
	{
		$this->db->select('id');
		$exist = $this->db->get_where('user_role',['title'=>'gym'])->row_array();
		if(!empty($exist))
		{
			return $exist['id'];
		}
		return 0;
	}
	public function get_member_role_id()
	{
		$this->db->select('id');
		$exist = $this->db->get_where('user_role',['title'=>'member'])->row_array();
		if(!empty($exist))
		{
			return $exist['id'];
		}
		return 0;
	}
	public function check_role_gym_exist()
	{
		$this->db->select('id');
		$exist = $this->db->get_where('user_role',['title'=>'gym'])->row_array();
		if(!empty($exist))
		{
			return true;
		}
	}
}