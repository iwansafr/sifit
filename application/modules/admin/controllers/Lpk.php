<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lpk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('lpk_admin_model');
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
		$this->load->view('index');
	}

	public function clear_list()
	{
		$this->load->view('lpk/list');
	}
	public function edit()
	{
		$this->load->view('index');
	}
	public function data_legal()
	{
		$lpk = $this->lpk_admin_model->my_lpk();
		$id = $this->lpk_admin_model->get_doc_id();
		$this->load->view('index',['lpk'=>$lpk,'id'=>$id]);
	}
	public function config()
	{
		$this->load->view('index');
	}
}