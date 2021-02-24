<?php

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
	$form->setheading(' Fasilitas Gym');
	$form->setTable('gym');
	$form->setId($id);
	$form->addInput('fasilitas','textarea');
	$form->setAttribute('fasilitas',['id'=>'summernote']);
	$form->form();
}else{
	msg('Akun Anda Belum dikonfirmasi oleh admin, silahkan kontak admin','danger');
}