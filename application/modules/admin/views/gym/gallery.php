<?php

if($this->member_model->is_active())
{
	$user = user();
	?>
	<a href="<?= base_url('admin/gym/gallery') ?>" class="btn btn-warning pull-right" title="refresh untuk tambah gallery baru"><i class="fa fa-refresh"></i> Reset</a>
	<?php
	$id = $this->member_model->get_gym_id();
	$form = new Zea();
	$form->init('edit');
	$form->setTable('gym_gallery');
	$form->setId(@intval($_GET['id']));
	$form->addInput('gambar','file');
	$form->setAccept('gambar','.jpg,.png');
	$form->addInput('deskripsi','textarea');
	$form->addInput('user_id','static');
	$form->setValue('user_id',$user['id']);
	$form->addInput('gym_id','static');
	$form->setValue('gym_id',$id);
	$form->form();

	$roll = new Zea();
	$roll->init('roll');
	$roll->setTable('gym_gallery');
	$roll->setWhere('gym_id = '.$id);
	$roll->search();
	$roll->addInput('id','hidden');
	$roll->setNumbering(true);
	$roll->addInput('gambar','thumbnail');
	$roll->addInput('deskripsi','plaintext');
	$roll->setDelete(true);
	$roll->setEdit(true);
	$roll->setEditLink(base_url('admin/gym/gallery/?id='));
	$roll->setUrl('admin/gym/clear_gallery');
	$roll->form();
}else{
	msg('Akun Anda Belum dikonfirmasi oleh admin, silahkan kontak admin','danger');
}