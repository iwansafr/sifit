<?php

pr($_SESSION);
if($this->member_model->is_active() || is_admin() || is_root())
{
	if(is_admin() || is_root())
	{
		$id = @intval($gym_id);
	}else{
		$id = $this->member_model->get_gym_id();
	}
	$form = new Zea();
	$form->init('edit');
	$form->setheading(' Profile Gym');
	$form->setTable('gym');
	$form->setId($id);
	$form->addInput('nama','text');
	$form->addInput('image','image');
	$form->setAccept('image','.jpg,.png,.jpeg');
	$form->addInput('alamat','textarea');
	$form->addInput('hp','text');
	$form->form();
}else{
	msg('Akun Anda Belum dikonfirmasi oleh admin, silahkan kontak admin','danger');
}