<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gym extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('member_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function clear_index()
	{
		$this->load->view('admin/gym/index');
	}
	public function list()
	{
		$this->load->view('index');
	}

	public function clear_list()
	{
		$this->load->view('gym/list');
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

	public function profile()
	{
		$this->load->view('index');
	}
	public function fasilitas()
	{
		$this->load->view('index');
	}
	public function gallery()
	{
		$this->load->view('index');
	}
	public function clear_gallery()
	{
		$this->load->view('admin/gym/gallery');
	}
	public function paket()
	{
		$this->load->view('index');
	}
	public function clear_paket()
	{
		$this->load->view('admin/gym/paket');
	}
	public function jadwal()
	{
		$this->load->view('index');
	}
	public function clear_jadwal()
	{
		$this->load->view('admin/gym/jadwal');
	}
	public function produk()
	{
		$this->load->view('index');
	}
	public function clear_produk()
	{
		$this->load->view('admin/gym/produk');
	}
}