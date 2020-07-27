<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('member_model');
		$this->load->model('lpk_admin_model');
		$this->load->model('home/lpk_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function list()
	{
		$lpk_id = 0;
		if(check_role('member'))
		{
			$lpk_id = $this->member_model->get_lpk_id();
		}
		$this->load->view('index',['lpk_id'=>$lpk_id]);
	}

	public function clear_list()
	{
		$lpk_id = 0;
		if(check_role('member'))
		{
			$lpk_id = $this->member_model->get_lpk_id();
		}
		$this->load->view('program/list',['lpk_id'=>$lpk_id]);
	}
	public function edit()
	{
		$lpk_id = 0;
		if(check_role('member'))
		{
			$lpk_id = $this->member_model->get_lpk_id();
		}
		$this->load->view('index',['lpk_id'=>$lpk_id]);
	}

	public function daftar()
	{
		$lpk = $this->lpk_admin_model->my_lpk();
		$program = [];
		if(!empty($lpk['id']))
		{
			$program = $this->lpk_model->get_program_by_lpk($lpk['id']);
		}
		$this->load->view('index',['lpk'=>$lpk,'program'=>$program]);
	}
	public function register($id = '')
	{
		$this->esg_model->set_nav_title('Daftar Program');
		$id = esg_decrypt($id);
		$program = $this->lpk_model->get_program($id);
		$program_member_id = 0;
		if(!empty($program))
		{
			$program_member_id = $this->lpk_admin_model->register($program);
			$program_member    = $this->lpk_admin_model->get_program_member($program_member_id);
		}
		$this->load->view('index',['program_member'=>$program_member,'program_member_id'=>$program_member_id]);
	}
	public function pembayaran($gelombang = 1, $id = '')
	{
		$id = esg_decrypt($id);
		if($this->db->field_exists('param_pembayaran_'.$gelombang,'lpk_program_member'))
		{
			$valid = true;
			$data = $this->db->get_where('lpk_program_member',['id'=>$id])->row_array();
		}else{
			$valid = false;
			$data = [];
		}
		$this->load->view('index',['data'=>$data,'valid'=>$valid,'gelombang'=>$gelombang]);
	}
}