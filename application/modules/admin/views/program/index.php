<?php
if(check_role('siswa'))
{
	$form = new zea();

	$form->init('roll');
	$form->setHeading('Program LPK');

	$form->setTable('lpk_program');
	$form->join('lpk_program_member','ON(lpk_program.id=lpk_program_member.lpk_program_id)','lpk_program.id,lpk_program.title');
	$form->setWhere('lpk_program_member.user_id = '.$_SESSION[base_url('_logged_in')]['id']);
	$form->setNumbering();
	$form->addInput('id','plaintext');
	$form->setLabel('id','action');
	$form->setPlainText('id',[
		'#'=>'Detail'
	]);
	$form->addInput('title','plaintext');
	$form->setLabel('title','nama program');

	// $form->addInput('description','plaintext');
	// $form->addInput('foto','thumbnail');

	$form->setUrl('admin/program/clear_list');
	$form->form();
}else{
	msg('halaman yang anda tuju tidak valid','danger');
}