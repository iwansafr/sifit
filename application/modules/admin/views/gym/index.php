<?php
if(is_root() || is_admin())
{
	$form = new Zea();
	$form->init('roll');
	$form->setTable('gym');
	$form->search();
	$form->setNumbering(true);
	$form->addInput('id','plaintext');
	$form->setLabel('id','action');
	$form->addInput('nama','plaintext');
	$form->setPlainText('id',[
		base_url('admin/gym/profile/{id}/{nama}') => 'profile',
		base_url('admin/gym/produk/{id}/{nama}') => 'produk',
		base_url('admin/gym/paket/{id}/{nama}') => 'paket',
		base_url('admin/gym/jadwal/{id}/{nama}') => 'jadwal',
		base_url('admin/gym/gallery/{id}/{nama}') => 'gallery',
		base_url('admin/gym/fasilitas/{id}/{nama}') => 'fasilitas',
	]);
	$form->addInput('alamat','plaintext');
	$form->addInput('email','plaintext');
	$form->addInput('hp','plaintext');
	$form->addInput('status','dropdown');
	$form->setOptions('status',['Belum Aktif','Aktif']);


	$form->setUrl('admin/gym/clear_index');
	$form->setDelete(true);
	$form->form();
}