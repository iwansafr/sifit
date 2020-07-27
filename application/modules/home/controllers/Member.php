<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('home_model');
		$this->load->model('admin/member_model');
		$this->load->model('lpk_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function clear_list()
	{
		$this->load->view('member/index');
	}

	public function daftar($lpk_id = 0)
	{
		$id = 0;
		if(!empty($_SESSION[base_url('_logged_in')]))
		{
			$id = $this->db->query('SELECT id FROM user_member WHERE user_id = ?',$_SESSION[base_url('_logged_in')]['id'])->row_array();
			if(!empty($id['id']))
			{
				$id = $id['id'];
			}
		}
		$name = $this->db->query('SELECT name FROM user_member WHERE id = ? ',$id)->row_array();
		$name = !empty($name['name']) ? $name['name'] : '';
		$lpk = $this->lpk_model->get_lpk($lpk_id);
		$role_siswa = $this->member_model->member_role('siswa');

		$this->load->view('index',['name'=>$name,'id'=>$id,'role_siswa'=>$role_siswa,'lpk'=>['id'=>$lpk_id,'data'=>$lpk]]);
	}
	public function cetak()
	{
		$id = 0;
		if(!empty($_SESSION[base_url('_logged_in')]))
		{
			$id = $this->db->query('SELECT id FROM user_member WHERE user_id = ?',$_SESSION[base_url('_logged_in')]['id'])->row_array();
			if(!empty($id['id']))
			{
				$id = $id['id'];
			}
		}
		$data = $this->db->query('SELECT * FROM user_member WHERE id = ? ',$id)->row_array();
		$this->load->view('index',['data'=>$data,'id'=>$id,'kelamin'=>['1'=>'Laki-laki','2'=>'Perempuan'],'status'=>$this->member_model->member_role('siswa')]);
	}
}