<?php 
$gym_id = $this->member_model->get_gym_id();
if(!empty($gym_id))
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
	$form->setHelp('wa','gunakan angka 62 misal 6285758700025');
	$form->setAttribute('wa',['placeholder'=>'gunakan angka 62 misal 6285758700025']);
	$form->addInput('gym_id','static');
	$form->setValue('gym_id', $gym_id);
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
	$roll->setEdit(true);
	$roll->setDelete(true);
	$roll->setEditLink(base_url('admin/gym/consultant?id='),'id');

	$roll->form();
}else{
	msg('hanya pemilik gym yg dapat mengakses halaman ini','danger');
}
