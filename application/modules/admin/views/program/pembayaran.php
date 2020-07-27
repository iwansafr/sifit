<?php

if($valid)
{
	$form = new zea();
	$form->init('param');
	$form->setTable('lpk_program_member');
	$form->param_field = 'param_pembayaran_'.$gelombang;
	$param = json_decode($data['param'],1);
	$form->setParamName(esg_encrypt($user['id'].$param['id']));
	$form->addInput('Nama_Bank','text');
	$form->addInput('Nomor_Rekening','text');
	$form->addInput('nominal','text');
	$form->addInput('atas_nama','text');
	$form->addInput('bukti_transfer','file');
	$form->setAccept('bukti_transfer','.jpg,.png,.jpeg');
	$form->addInput('lunas','static');
	$form->setValue('lunas','1');

	$form->setRequired('All');
	$form->form();
}else{
	msg('maaf link yang anda tuju tidak valid','danger');	
}