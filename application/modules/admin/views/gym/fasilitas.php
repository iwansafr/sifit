<?php

if($this->member_model->is_active())
{
	$id = $this->member_model->get_gym_id();
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