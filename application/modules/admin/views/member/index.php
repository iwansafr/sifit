<?php
if(!empty($role_member))
{
	$form = new zea();
	$form->init('roll');

	$form->setTable('member');
	$form->search();
	$form->join('user','ON(member.user_id = user.id)',
		'member.id, member.name, member.param->>"$.nama" AS nama,
		 member.param->>"$.lpk_id" AS lpk,
		 member.param->>"$.alamat" AS alamat,
		 user.username,
		 member.param->>"$.email" AS email,
		 member.param->>"$.user_role_id" AS user_role_id
		 ');
	$form->setWhere('member.param->>"$.user_role_id" = '.$role_member['id']);
	$form->setParamName(uniqid());
	$form->param_field = 'param';
	$form->addInput('id','plaintext');
	$form->setLabel('id','action');
	$form->setPlaintext('id',
		[base_url('admin/member/detail/{name}')=>'detail'],
		[base_url('admin/member/edit?id={id}')=>'edit']
	);
	$form->addInput('nama','plaintext');
	$form->addInput('lpk','dropdown');
	$form->tableOptions('lpk','lpk','id','title');
	$form->setAttribute('lpk','disabled');
	$form->addInput('name','plaintext');
	$form->setLabel('name','kode');
	$form->addInput('alamat','plaintext');

	$form->addInput('username','plaintext');
	$form->addInput('email','plaintext');
	$form->setType('email','email');

	$form->addInput('user_role_id','dropdown');
	$form->setOptions('user_role_id',[$role_member['id']=>$role_member['title']]);
	$form->setLabel('user_role_id','group');
	$form->setAttribute('user_role_id','disabled');


	$form->startCollapse('username','User Detail');
	$form->endCollapse('user_role_id');
	$form->setCollapse('username',FALSE);

	$form->setDelete(true);
	$form->set_delete_jointable();
	$form->setEdit(true);
	// $form->setEditLink('member/edit?id=');

	$form->setEnableDeleteParam(false);
	$form->setNumbering(true);
	$form->setUrl('admin/member/clear_list');

	$form->form();
}else{
	msg('mohon maaf group member tidak tersedia','danger');
}