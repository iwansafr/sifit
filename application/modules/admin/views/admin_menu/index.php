<?php defined('BASEPATH') OR exit('No direct script access allowed');
$data['p_id'] = $this->input->get('id');
$this->load->view('admin_menu/list', $data);