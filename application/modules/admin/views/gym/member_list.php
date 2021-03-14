<?php
$gym_id = $this->member_model->get_gym_id();
if(!empty($gym_id))
{
	$form = new Zea();
	$form->init('roll');
	$form->setTable('gym_member');

	$form->search();


	$form->setNumbering(true);
	$form->setWhere('gym_id = '.$gym_id);
	$form->addInput('id','hidden');
	$form->addInput('nama','plaintext');
	$form->addInput('alamat','plaintext');
	$form->addInput('tgl_masuk','plaintext');
	$form->addInput('paket_id','dropdown');
	$form->tableOptions('paket_id','gym_paket','id','judul');
	$form->setLabel('paket_id','paket');
	$form->setAttribute('paket_id','disabled');
	$form->addInput('status','dropdown');
	$form->setOptions('status',['Belum Aktif','Aktif']);
	$form->setDelete(true);
	$form->setUrl('admin/gym/clear_member_list');
	$form->form();
}else{
	msg('maaf hanya akun pemilik gym yg bisa mengakses halaman ini','danger');
}