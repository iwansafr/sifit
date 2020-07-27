<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lpk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('lpk_model');
		$this->load->helper('content');
		$this->load->library('esg');
	}

	public function list()
	{
		$this->home_model->home();
		$data = $this->lpk_model->get_lpk_list();
		$old_nav = $this->esg->get_esg('navigation');
		$bisnis = $this->esg->get_config('lpk_config');
		$old_nav['array']['1'] = $bisnis['title'];
		$this->esg->set_esg('navigation',$old_nav);
		$this->load->view('index',['data'=>$data]);
	}

	public function detail($id = 0)
	{
		$this->home_model->home();
		$old_nav = $this->esg->get_esg('navigation');
		$bisnis = $this->esg->get_config('lpk_config');
		$old_nav['array']['1'] = $bisnis['title'];
		$this->esg->set_esg('navigation',$old_nav);
		$this->load->view('index',['data'=>$this->lpk_model->get_lpk($id),'program'=>$this->lpk_model->get_program_by_lpk($id)]);
	}
	public function program_detail($id = 0)
	{
		$this->home_model->home();
		$old_nav = $this->esg->get_esg('navigation');
		$bisnis = $this->esg->get_config('lpk_config');
		$old_nav['array']['1'] = $bisnis['title'];
		$this->esg->set_esg('navigation',$old_nav);
		$this->load->view('index',['data'=>$this->lpk_model->get_program($id)]);
	}

	public function e()
	{
		$this->load->view('error');
	}
}