<?php

if($this->member_model->is_active() || is_admin() || is_root())
{
	if(is_admin() || is_root())
	{
		$id = @intval($gym_id);
	}else{
		$id = $this->member_model->get_gym_id();
	}
	$user = user();
	?>
	<a href="<?= base_url('admin/gym/paket') ?>" class="btn btn-warning pull-right" title="refresh untuk tambah paket baru"><i class="fa fa-refresh"></i> Reset</a>
	<?php
	$form = new Zea();
	$form->init('edit');
	$form->setTable('gym_paket');
	$form->setId(@intval($_GET['id']));
	$form->addInput('judul','text');
	$form->addInput('harga','text');
	$form->setType('harga','number');
	$form->addInput('deskripsi','textarea');
	$form->addInput('user_id','static');
	$form->setValue('user_id',$user['id']);
	$form->addInput('gym_id','static');
	$form->setValue('gym_id',$id);
	$form->form();

	$roll = new Zea();
	$roll->init('roll');
	$roll->setTable('gym_paket');
	$roll->setWhere('gym_id = '.$id);
	$roll->search();
	$roll->addInput('id','hidden');
	$roll->setNumbering(true);
	$roll->addInput('judul','plaintext');
	$roll->addInput('harga','plaintext');
	$roll->setMoney('harga');
	$roll->addInput('deskripsi','plaintext');
	$roll->setDelete(true);
	$roll->setEdit(true);
	$roll->setEditLink(base_url('admin/gym/paket/?id='));
	$extra_url = !empty($gym_id) ? '/'.$gym_id : '';
	$roll->setUrl('admin/gym/clear_paket'.$extra_url);
	$roll->form();
}else{
	msg('Akun Anda Belum dikonfirmasi oleh admin, silahkan kontak admin','danger');
}