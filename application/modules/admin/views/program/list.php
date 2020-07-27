<?php
if(!empty($lpk_id))
{
	$form = new zea();

	$form->init('roll');
	$form->setHeading('Program LPK');

	$form->setTable('lpk_program');

	$form->setNumbering();
	$form->addInput('id','plaintext');
	$form->setPlainText('id',[
		base_url('admin/member/siswa/?p_id={id}')=>'Data Siswa'
	]);
	$form->setLabel('id','action');
	$form->addInput('title','plaintext');
	$form->setLabel('title','nama program');

	$form->addInput('description','plaintext');
	$form->addInput('foto','thumbnail');

	$form->setUrl('admin/program/clear_list');
	$form->setEdit(true);
	$form->setDelete(true);
	$form->form();
}else{
	msg('halaman yang anda tuju tidak valid','danger');
}