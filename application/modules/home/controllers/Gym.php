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
	}
	public function gallery()
	{
		$form = new Zea();
		$form->init('roll');
		$form->join('gym','ON(gym_gallery.gym_id=gym.id)','gym_gallery.id,gym_gallery.gambar,gym_gallery.deskripsi,gym.nama');
		$form->setTable('gym_gallery');
		$form->addInput('id','plaintext');
		$form->addInput('gambar','plaintext');
		$form->addInput('deskripsi','plaintext');
		$form->addInput('gym_id','plaintext');
		

		$data = $form->getData();
		$this->load->view('index',['data'=>$data]);
	}
}