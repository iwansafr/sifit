<?php

$form = new zea();

$form->init('param');

$form->setTable('config');

$form->setParamName('lpk_config');
$form->addInput('title','text');
$form->setLabel('title','Nama Usaha');

$form->setRequired('All');
$form->form();
