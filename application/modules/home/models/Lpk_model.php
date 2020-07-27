<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lpk_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		$this->load->library('ZEA/Zea');	
	}
	
	public function get_lpk_list()
	{
		$form = new zea();
		$form->init('roll');
		$form->setTable('lpk');
		$form->search();
		$form->addInput('id','plaintext');
		$form->addInput('title','plaintext');
		$form->addInput('image','thumbnail');
		$form->addInput('description','plaintext');
		// $form->setLimit(2);

		$data = $form->getData();
		if(!empty($data))
		{
			return $data;
		}
	}

	public function get_lpk($id = 0)
	{
		return $this->db->get_where('lpk',['id'=>$id])->row_array();
	}
	public function get_program($id = 0)
	{
		return $this->db->get_where('lpk_program',['id'=>$id])->row_array();
	}
	public function get_program_by_lpk($id = 0)
	{
		return $this->db->get_where('lpk_program',['lpk_id'=>$id])->result_array();
	}
}