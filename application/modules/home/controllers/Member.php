<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('home_model');
		$this->load->model('admin/member_model');
		$this->load->model('members_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
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
	public function daftar_gym()
	{
		$this->load->view('index');
	}
	public function failed()
	{
		$this->load->view('index');
	}
	public function daftar_member()
	{
		if (!empty($_POST['email'])) {
			if($this->members_model->check_exist($_POST['email']))
			{
				redirect(base_url('home/member/failed?gym_id='.@intval($_GET['gym_id']).'&msg='.str_replace(' ','_','email '.$_POST['email'].' Sudah terdaftar silahkan gunakan email lainnya&back='.base_url('home/member/daftar_member?gym_id='.@intval($_GET['gym_id'])))));
			}
		}
		$this->esg->add_css(base_url('templates/AdminLTE').'/bower_components/select2/dist/css/select2.min.css');
		$this->esg->add_js(base_url('templates/AdminLTE').'/bower_components/select2/dist/js/select2.full.min.js');
		$this->esg->add_script(
			'$(".select2").select2();'
		);
		$id = @intval($_GET['gym_id']);
		$this->db->select('id,judul,harga');
		$paket = $this->db->get_where('gym_paket',['gym_id'=>$id])->result_array();
		if(!empty($paket))
		{
			$output = [];
			foreach ($paket as $key => $value) {
				$output[$value['id']] = $value['judul'].' | Rp.'.number_format($value['harga'],0,2,'.');
			}
			$paket = $output;
		}
		$this->load->view('index',['data'=>$this->db->get('gym')->result_array(),'paket'=>$paket]);
	}
}