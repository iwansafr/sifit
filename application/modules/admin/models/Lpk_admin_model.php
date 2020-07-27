<?php

class Lpk_admin_model extends CI_Model
{
	public function my_lpk()
	{
		if(!empty($_SESSION))
		{
			$lpk = $this->db->query('SELECT param->>"$.lpk_id" AS id FROM user_member WHERE user_id = ?',$_SESSION[base_url().'_logged_in']['id'])->row_array();
			$lpk_id = !empty($lpk['id']) ? $lpk['id'] : 0;
			if(!empty($lpk_id))
			{
				return $this->db->query('SELECT * FROM lpk WHERE id = ?',$lpk_id)->row_array();
			}
		}
	}
	public function get_doc_id()
	{
		if(!empty($_SESSION))
		{
			$lpk = $this->db->query('SELECT param->>"$.lpk_id" AS id FROM user_member WHERE user_id = ?',$_SESSION[base_url().'_logged_in']['id'])->row_array();
			$lpk_id = !empty($lpk['id']) ? $lpk['id'] : 0;
			if(!empty($lpk_id))
			{
				$doc = $this->db->query('SELECT id FROM lpk_data_dok WHERE lpk_id = ?',$lpk_id)->row_array();
				$dok_id = !empty($doc['id']) ? $doc['id'] : 0;
				return $dok_id;
			}
		}
	}
	public function register($program = array())
	{
		if(!empty($program) && is_array($program) && !empty($_SESSION[base_url('_logged_in')]))
		{
			$data                   = [];
			$user_id = $_SESSION[base_url('_logged_in')]['id'];
			$this->db->select('id');
			$id = $this->db->get_where('lpk_program_member',['user_id'=>$user_id,'lpk_program_id'=>$program['id']])->row_array();
			if(empty($id))
			{
				$data['user_id']        = $user_id;
				$data['lpk_program_id'] = $program['id'];
				$data['param']          = json_encode($program);
				$data['name']           = esg_encrypt($user_id.$program['id']);
				$this->db->insert('lpk_program_member',$data);
				$id = $this->db->insert_id();
			}else{
				$id = $id['id'];
			}
			return $id;
		}
	}
	public function get_program_member($id = 0)
	{
		if(!empty($id))
		{
			return $this->db->get_where('lpk_program_member',['id'=>$id])->row_array();
		}
	}
}