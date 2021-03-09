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

	public function profile($gym_id = 0)
	{
		$this->load->view('index',['gym_id'=>$gym_id]);
	}
	public function fasilitas($gym_id = 0)
	{
		$this->load->view('index',['gym_id'=>$gym_id]);
	}
	public function gallery($gym_id = 0)
	{
		$this->load->view('index',['gym_id'=>$gym_id]);
	}
	public function clear_gallery($gym_id = 0)
	{
		$this->load->view('admin/gym/gallery',['gym_id'=>$gym_id]);
	}
	public function paket($gym_id = 0)
	{
		$this->load->view('index',['gym_id'=>$gym_id]);
	}
	public function clear_paket($gym_id = 0)
	{
		$this->load->view('admin/gym/paket',['gym_id'=>$gym_id]);
	}
	public function jadwal($gym_id = 0)
	{
		$this->load->view('index',['gym_id'=>$gym_id]);
	}
	public function clear_jadwal($gym_id = 0)
	{
		$this->load->view('admin/gym/jadwal',['gym_id'=>$gym_id]);
	}
	public function produk($gym_id = 0)
	{
		$this->load->view('index',['gym_id'=>$gym_id]);
	}
	public function clear_produk($gym_id = 0)
	{
		$this->load->view('admin/gym/produk',['gym_id'=>$gym_id]);
	}
	public function consultant()
	{
		$this->load->view('index');
	}
}