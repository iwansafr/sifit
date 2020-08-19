<?php

$form = new zea();

$form->init('param');

$form->setTable('config');

$form->setParamName('lpk_config');
$form->addInput('title','text');
$form->setLabel('title','Nama Usaha');

$form->addInput('color','text');
$form->setType('color','color');
$form->setLabel('color','Warna Utama');

$form->setRequired('All');
$form->form();
