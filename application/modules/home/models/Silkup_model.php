<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Silkup_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		$this->set_popular_lpk();
		$this->set_latest_program();
		$this->set_popular_program();
	}
	public function get_popular_lpk()
	{
		// $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
		$data = $this->db->query('SELECT param->>"$.lpk_id" AS lpk_id,count(param->>"$.lpk_id") AS total,lpk.* FROM user_member INNER JOIN lpk ON(lpk.id=param->>"$.lpk_id") WHERE param->>"$.lpk_id" > 0 GROUP BY param->>"$.lpk_id" ORDER BY total DESC LIMIT 6')->result_array();
		if(!empty($data))
		{
			return $data;
		}
	}
	public function set_popular_lpk()
	{
		$data = $this->get_popular_lpk();
		if(!empty($data))
		{
			$this->esg->set_esg('popular_lpk',$data);
		}
	}
	public function get_latest_program()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(16);
		return $this->db->get('lpk_program')->result_array();
	}
	public function get_popular_program()
	{
		$data = $this->db->query('SELECT count(lpk_program_id) AS total,param FROM lpk_program_member GROUP BY lpk_program_id ORDER BY total DESC LIMIT 6')->result_array();
		if(!empty($data))
		{
			return $data;
		}
	}
	public function set_popular_program()
	{
		$data = $this->get_popular_program();
		if(!empty($data))
		{
			$this->esg->set_esg('popular_program',$data);
		}
	}
	public function set_latest_program()
	{
		$data = $this->get_latest_program();
		if(!empty($data))
		{
			$this->esg->set_esg('latest_program',$data);
		}
	}
}