<?php
if(is_root() || is_admin())
{
	$form = new Zea();
	$form->init('roll');
	$form->setTable('gym');
	$form->search();
	$form->setNumbering(true);
	$form->addInput('id','hidden');
	$form->addInput('nama','plaintext');
	$form->addInput('alamat','plaintext');
	$form->addInput('email','plaintext');
	$form->addInput('hp','plaintext');
	$form->addInput('status','dropdown');
	$form->setOptions('status',['Belum Aktif','Aktif']);


	$form->setUrl('admin/gym/clear_index');
	$form->setDelete(true);
	$form->form();
}