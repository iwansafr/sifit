<?php

$form = new Zea();

$form->init('roll');
$form->setDataTable(true);
$form->setTable('gym_member_paket');
$form->setWhere('user_id = '.$user['id']);

$form->search();
$form->setNumbering(true);
$form->addInput('id','plaintext');
$form->addInput('gym_paket_id','dropdown');
$form->tableOptions('gym_paket_id','gym_paket','id','judul','','harga');
$form->setAttribute('gym_paket_id','disabled');
$form->setLabel('gym_paket_id','Paket');
$form->addInput('status','dropdown');
$form->setOptions('status',['Belum dikonfirmasi','Sudah dikonfirmasi']);
$form->setAttribute('status','disabled');
$form->form();