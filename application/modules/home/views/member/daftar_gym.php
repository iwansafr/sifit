<?php

if($this->members_model->check_role_gym_exist())
{
	$form = new Zea();
	$form->init('edit');
	$form->setEditStatus(false);
	$form->setTable('gym');
	$form->setHeading('Pendaftaran Gym');

	$form->addInput('nama','text');
	$form->setAttribute('nama',['placeholder'=>'Nama Tempat Fitnes / Gym']);
	$form->addInput('alamat','textarea');
	$form->setAttribute('alamat',['placeholder'=>'Alamat Tempat Fitnes / Gym']);
	$form->addInput('email','text');
	$form->setUnique(['email'],'<b>{value}</b> sudah terdaftar silahkan gunakan email lainnya');
	$form->setType('email','email');
	$form->setAttribute('email',['placeholder'=>'email aktif tempat fitnes / gym, email ini digunakan untuk login nanti']);

	$form->addInput('password','text');
	$form->setType('password','password');
	$form->setAttribute('password',['placeholder'=>'Password untuk login']);

	$form->addInput('hp','text');
	$form->setType('hp','phone');
	$form->setAttribute('hp',['placeholder'=>'Nomor HP tempat fitnes / Gym']);
	$form->setRequired('All');

	$form->form();
	if($form->success)
	{
		$this->members_model->register_member();
	}
}else{
	msg('tidak menerima pendaftaran gym silahkan hubungi admin','danger');
}