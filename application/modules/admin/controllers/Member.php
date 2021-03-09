<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
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
		if(!$this->db->field_exists('status','gym_member'))
		{
			$this->load->dbforge();
			$fields = array(
	      'status' => array(
	              'type' => 'TINYINT',
	              'constraint' => '1',
	              'default' => '0',
	              'after' => 'password'
	      ),
			);
			$this->dbforge->add_column('gym_member',$fields);
		}
	}

	public function index()
	{
		$role_member = $this->member_model->member_role('member');
		$this->load->view('index',['role_member'=>$role_member]);
	}

	public function clear_list()
	{
		$role_member = $this->member_model->member_role('member');
		$this->load->view('member/index',['role_member'=>$role_member]);
	}

	public function edit()
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		$name = $this->db->query('SELECT name FROM user_member WHERE id = ? ',$id)->row_array();
		$name = !empty($name['name']) ? $name['name'] : '';

		$role_member = $this->member_model->member_role('member');
		$this->load->view('index',['name'=>$name,'id'=>$id,'role_member'=>$role_member]);
	}

	public function siswa($id = 0)
	{
		$role_member = $this->member_model->member_role('siswa');
		$title = !empty($id) ? $this->db->query('SELECT title FROM lpk WHERE id = ?',$id)->row_array() : '';
		if(!empty($title))
		{
			$this->esg_model->set_nav_title('data siswa '.$title['title']);
		}
		$this->load->view('index',['role_member'=>$role_member,'id'=>$id]);
	}

	public function clear_siswa($id = 0)
	{
		$role_member = $this->member_model->member_role('siswa');
		$title = !empty($id) ? $this->db->query('SELECT title FROM lpk WHERE id = ?',$id)->row_array() : '';
		if(!empty($title))
		{
			$this->esg_model->set_nav_title('data siswa '.$title['title']);
		}
		$this->load->view('member/siswa',['role_member'=>$role_member,'id'=>$id]);
	}

	public function siswa_edit()
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
		$name = $this->db->query('SELECT name FROM user_member WHERE id = ? ',$id)->row_array();
		$name = !empty($name['name']) ? $name['name'] : '';

		$role_member = $this->member_model->member_role('siswa');
		$this->load->view('index',['name'=>$name,'id'=>$id,'role_member'=>$role_member]);
	}
	public function detail($name = '')
	{
		$data = $this->db->query('SELECT * FROM user_member WHERE name = ?',$name)->row_array();
		$this->load->view('index',['data'=>$data,'kelamin'=>['1'=>'Laki-laki','2'=>'Perempuan'],'status'=>$this->member_model->member_role('siswa')]);
	}
}