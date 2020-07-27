<?php
if(!empty($role_member))
{
	$this->zea->init('param');

	$this->zea->setTable('member');
	$this->zea->setId($id);
	$name = !empty($name) ? $name : uniqid();
	$this->zea->setParamName($name);
	$this->zea->param_field = 'param';
	$this->zea->addInput('nama','text');
	$this->zea->setLabel('nama','Nama Lengkap');
	$this->zea->addInput('name','hidden');
	$this->zea->setValue('name',$name);
	$this->zea->addInput('alamat','textarea');
	$this->zea->addInput('image_foto_diri','file');
	$this->zea->setAccept('image_foto_diri','.jpg, .png, .jpeg');
	$this->zea->setLabel('image_foto_diri','foto');
	$this->zea->addInput('jenis_kelamin','dropdown');
	$this->zea->setOptions('jenis_kelamin',['1'=>'Laki-laki','2'=>'Perempuan']);

	$this->zea->addInput('lpk_id','dropdown');
	$this->zea->setLabel('lpk_id','LPK yg dipimpin');
	$this->zea->removeNone('lpk_id',true);
	$this->zea->tableOptions('lpk_id','lpk','id','title');

	$this->zea->addInput('username','text');
	$this->zea->addInput('email','text');
	$this->zea->setType('email','email');
	$this->zea->addInput('password','password');

	$this->zea->addInput('user_role_id','static');
	$this->zea->setValue('user_role_id',$role_member['id']);

	$this->zea->startCollapse('username','User Detail');
	$this->zea->endCollapse('user_role_id');
	$this->zea->setCollapse('username',FALSE);
	if(!empty($user_id))
	{
		$this->zea->addInput('user_id','static');
		$this->zea->setValue('user_id',$user_id);
	}

	$this->zea->setEnableDeleteParam(false);
	$this->zea->setFormName('member_edit');

	$this->zea->editJoin([
		'table'=>'user',
		'field'=>['username','password','email','user_role_id'],
		'key'=>'user_id',
	]);
	$this->zea->setEncrypt(['password']);
	$this->zea->setUnique(['username']);
	$this->zea->setRequired(['nama','username','password','email','user_role_id']);

	$this->zea->form();
}else{
	msg('mohon maaf group member tidak tersedia','danger');
}