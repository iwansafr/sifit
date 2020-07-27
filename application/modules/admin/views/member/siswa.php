<?php
if(!empty($role_member))
{
	$id = !empty($id) ? intval($id) : 0;
	$form = new zea();

	$form->init('roll');

	if(check_role('member'))
	{
		$id = $this->member_model->get_lpk_id();
	}

	$form->setTable('user_member');
	$form->search();
	$form->join('user','ON(user_member.user_id = user.id)',
		'user_member.id, user_member.name, user_member.param->>"$.nama" AS nama,
		 user_member.param->>"$.alamat" AS alamat,
		 user.username,
		 user_member.param->>"$.email" AS email,
		 user_member.param->>"$.user_role_id" AS user_role_id
		 ');
	$where = '';
	if(!empty($id))
	{
		$where = ' AND user_member.param->>"$.lpk_id" = '.$id;
	}
	$form->setWhere('user_member.param->>"$.user_role_id" = '.$role_member['id'].' '.$where);
	$form->setParamName(uniqid());
	$form->param_field = 'param';
	$form->addInput('id','plaintext');
	$form->setLabel('id','action');
	$form->setPlaintext('id',
		[base_url('admin/member/detail/{name}')=>'detail'],
		[base_url('admin/member/edit?id={id}')=>'edit']
	);
	$form->addInput('nama','plaintext');
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
	$form->setEditLink('siswa_edit?id=');

	$form->setEnableDeleteParam(false);
	$form->setNumbering(true);
	$form->setUrl('admin/member/clear_siswa/'.$id);

	$form->form();
}else{
	msg('mohon maaf group member tidak tersedia','danger');
}