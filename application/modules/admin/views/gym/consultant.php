<?php 
if(!empty($this->member_model->get_gym_id()))
{
	$form = new Zea();
	$form->init('edit');
	$form->setTable('gym_consultant');

	$form->setId(@intval($_GET['id']));
	$form->setHeading('<a class="btn btn-warning" href="'.base_url('admin/gym/consultant').'">Refresh</a>');
	$form->addInput('nama','text');
	$form->setLabel('nama','nama pelatih');
	$form->addInput('alamat','textarea');
	$form->addInput('wa','text');
	$form->setType('wa','number');
	$form->setLabel('wa','Whatsapp pelatih');

	$form->setRequired('All');

	$form->form();

	$roll = new Zea();
	$roll->init('roll');
	$roll->setTable('gym_consultant');

	$roll->search();
	$roll->setNumbering(true);
	$roll->addInput('id','hidden');
	$roll->addInput('nama','plaintext');
	$roll->setLabel('nama','nama pelatih');
	$roll->addInput('alamat','plaintext');
	$roll->addInput('wa','plaintext');
	$roll->setLabel('wa','Whatsapp pelatih');

	$roll->setRequired('All');

	$roll->form();
}else{
	msg('hanya pemilik gym yg dapat mengakses halaman ini','danger');
}
