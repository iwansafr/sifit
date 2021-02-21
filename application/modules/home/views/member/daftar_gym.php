<?php

$form = new Zea();
$form->init('edit');
$form->setEditStatus(false);
$form->setTable('gym');
$form->setHeading('Pendaftaran Gym');

$form->addInput('nama','text');
$form->addInput('alamat','textarea');
$form->addInput('email','text');
$form->setUnique(['email'],'<b>{value}</b> sudah terdaftar silahkan gunakan email lainnya');
$form->setType('email','email');
$form->addInput('hp','text');
$form->setType('hp','phone');
$form->setRequired('All');


$form->form();
if($form->success)
{
	msg('Kami sudah menerima data pendaftaran anda silahkan menunggu konfirmasi dari admin','success');
}