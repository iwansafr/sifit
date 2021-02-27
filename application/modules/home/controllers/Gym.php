<?php
class Gym extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
		$this->home_model->home();
	}
	public function gallery($id = 0)
	{
		$form = new Zea();
		$form->init('roll');
		$form->setWhere('gym_id = '.$id);
		$form->join('gym','ON(gym_gallery.gym_id=gym.id)','gym_gallery.id,gym_gallery.gambar,gym_gallery.deskripsi,gym.nama');
		$form->setTable('gym_gallery');
		$form->addInput('id','plaintext');
		$form->addInput('gambar','plaintext');
		$form->addInput('deskripsi','plaintext');
		$form->addInput('gym_id','plaintext');
		

		$data = $form->getData();
		$this->load->view('index',['data'=>$data]);
	}

	public function paket($id = 0)
	{
		$form = new Zea();
		$form->init('roll');
		$form->setWhere('gym_id = '.$id);
		$form->join('gym','ON(gym_paket.gym_id=gym.id)','gym_paket.id,gym_paket.judul,gym_paket.deskripsi,gym.nama,gym_paket.harga');
		$form->setTable('gym_paket');
		$form->addInput('id','plaintext');
		$form->addInput('judul','plaintext');
		$form->addInput('harga','plaintext');
		$form->setMoney('harga');
		$form->addInput('deskripsi','plaintext');
		$form->addInput('gym_id','plaintext');
		$form->setDataTable(true);
		

		$data = $form->getData();
		$form = $form;
		$this->load->view('index',['data'=>$data,'form'=>$form]);
	}

	public function produk($id = 0)
	{
		$form = new Zea();
		$form->init('roll');
		$form->setWhere('gym_id = '.$id);
		$form->join('gym','ON(gym_produk.gym_id=gym.id)','gym_produk.id,gym_produk.nama,gym_produk.deskripsi,gym.nama,gym_produk.harga,gym_produk.gambar');
		$form->setTable('gym_produk');
		$form->addInput('id','plaintext');
		$form->addInput('nama','plaintext');
		$form->addInput('gambar','plaintext');
		$form->addInput('harga','plaintext');
		$form->setMoney('harga');
		$form->addInput('deskripsi','plaintext');
		$form->addInput('gym_id','plaintext');
		$form->setDataTable(true);
		

		$data = $form->getData();
		$form = $form;
		$this->load->view('index',['data'=>$data,'form'=>$form]);
	}

	public function list()
	{
		$form = new Zea();
		$form->init('roll');
		$form->setTable('gym');
		$form->setWhere('status = 1');
		$form->addInput('id','plaintext');
		$form->addInput('image','plaintext');
		$form->addInput('fasilitas','plaintext');
		$form->addInput("nama",'plaintext');

		$data = $form->getData();
		$this->load->view('index',['data'=>$data]);
	}
	public function profile($id = 0)
	{
		$data = $this->db->get_where('gym',['id'=>$id])->row_array();
		$this->load->view('index',['data'=>$data]);
	}
}