<?php
if(!empty($lpk_id))
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
	$form = new zea();

	$form->init('edit');
	$form->setHeading('Program LPK');

	$form->setTable('lpk_program');
	$form->setId($id);
	$form->addInput('title','text');
	$form->setLabel('title','nama program');

	$form->addInput('description','textarea');
	$form->addInput('foto','file');
	$form->setAccept('foto','.jpg,.png,.jpeg');

	$form->addInput('lpk_id','static');
	$form->setValue('lpk_id',$lpk_id);

	$form->addInput('syarat','textarea');
	$form->setAttribute('syarat',['id'=>'summernote']);
	$form->setLabel('syarat','Syarat Masuk');

	$form->addInput('lama_kursus','text');
	$form->setType('lama_kursus','number');
	$form->setAttribute('lama_kursus',['min'=>'1','placeholder'=>'lama kursus dalam bulan']);
	$form->setLabel('lama_kursus','Lama Kursus (dalam bulan)');

	$form->addInput('jadwal','text');
	$form->setLabel('jadwal','Jadwal Kursus');

	$form->addInput('pembayaran_1','text');
	$form->setType('pembayaran_1','number');
	$form->setAttribute('pembayaran_1',['min'=>'0']);
	$form->setLabel('pembayaran_1','Biaya Pembayaran pertama');

	$form->addInput('pembayaran_2','text');
	$form->setType('pembayaran_2','number');
	$form->setAttribute('pembayaran_2',['min'=>'0']);
	$form->setLabel('pembayaran_2','Biaya Pembayaran kedua');

	$form->addInput('lain_lain','textarea');
	$form->setLabel('lain_lain','Keterangan Lain-lain');

	$form->setRequired(['title']);
	$form->form();
}else{
	msg('halaman yang anda tuju tidak valid','danger');
}