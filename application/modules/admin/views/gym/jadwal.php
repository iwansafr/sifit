<?php

if($this->member_model->is_active())
{
	$user = user();
	?>
	<a href="<?= base_url('admin/gym/jadwal') ?>" class="btn btn-warning pull-right" title="refresh untuk tambah jadwal baru"><i class="fa fa-refresh"></i> Reset</a>
	<?php
	$id = $this->member_model->get_gym_id();
	$form = new Zea();
	$form->init('edit');
	$form->setTable('gym_jadwal');
	$form->setId(@intval($_GET['id']));
	$form->addInput('hari','text');
	$form->addInput('keterangan','textarea');
	$form->addInput('jam_mulai','text');
	$form->setType('jam_mulai','time');
	$form->addInput('jam_selesai','text');
	$form->setType('jam_selesai','time');
	$form->addInput('user_id','static');
	$form->setValue('user_id',$user['id']);
	$form->addInput('gym_id','static');
	$form->setValue('gym_id',$id);
	$form->form();

	$roll = new Zea();
	$roll->init('roll');
	$roll->setTable('gym_jadwal');
	$roll->setWhere('gym_id = '.$id);
	$roll->search();
	$roll->addInput('id','hidden');
	$roll->setNumbering(true);
	$roll->addInput('hari','plaintext');
	$roll->addInput('keterangan','plaintext');
	$roll->addInput('jam_mulai','plaintext');
	$roll->addInput('jam_selesai','plaintext');
	$roll->setDelete(true);
	$roll->setEdit(true);
	$roll->setEditLink(base_url('admin/gym/jadwal/?id='));
	$roll->setUrl('admin/gym/clear_jadwal');
	$roll->form();
}else{
	msg('Akun Anda Belum dikonfirmasi oleh admin, silahkan kontak admin','danger');
}