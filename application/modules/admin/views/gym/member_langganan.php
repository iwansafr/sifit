<!-- <a href="<?= base_url('admin/gym/daftar_member') ?>" class="btn btn-primary">Daftar Langganan Baru</a> -->
<?php

$form = new Zea();

$form->init('roll');
$form->setDataTable(true);
$form->setTable('gym_member_paket');
$form->setWhere('gym_member_paket.user_id = '.$user['id']);

$form->join('gym_member','ON(gym_member_paket.gym_member_id = gym_member.id)','gym_member.gym_id,gym_member_paket.id,gym_member.nama,gym_member.alamat,gym_member.tgl_masuk,gym_member_paket.gym_paket_id,gym_member_paket.status');

$form->search();
$form->setNumbering(true);

$form->setNumbering(true);
$form->addInput('id','plaintext');
$form->addInput('gym_id','plaintext');
$form->setPlainText('gym_id',[
	base_url('admin/gym/upload_bukti_tf/{gym_id}')=>'Upload Bukti Transfer'
]);
$form->setLabel('gym_id','action');
$form->addInput('nama','plaintext');
$form->addInput('alamat','plaintext');
$form->addInput('tgl_masuk','plaintext');

$form->addInput('gym_paket_id','dropdown');
$form->tableOptions('gym_paket_id','gym_paket','id','judul','','harga');
$form->setAttribute('gym_paket_id','disabled');
$form->setLabel('gym_paket_id','Paket');
$form->addInput('gym_paket_id','dropdown');
$form->addInput('status','dropdown');
$form->setOptions('status',['Belum Aktif','Aktif']);
$form->addInput('status','dropdown');
$form->setOptions('status',['Belum dikonfirmasi','Sudah dikonfirmasi']);
$form->setAttribute('status','disabled');
$form->form();
// $form->form();