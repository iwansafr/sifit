<?php
if(check_role('member'))
{
	if(!empty($lpk))
	{
		$bisnis = $this->esg->get_config('lpk_config');
		$form = new zea();
		$form->init('param');
		$form->setHeading('Lengkapi data legal '.$lpk['title']);
		$form->setTable('lpk_data');
		$form->setParamName(esg_encrypt($lpk['id']));
		$form->addInput('alamat','textarea');
		$form->addInput('kontak','text');
		$form->setLabel('kontak','kontak yg bisa dihubungi');
		$form->addInput('koordinat','text');
		$form->setLabel('koordinat','koordinat (copy koordinat dari google map kantor '.$bisnis['title'].' anda)');
		// $form->addInput('image_dokumentasi','files');
		// $form->setLabel('image_dokumentasi','Dokumentasi (upload beberapa foto dokumentasi)');
		// $form->setAccept('image_dokumentasi','.jpg,.png,.jpeg');
		$form->addInput('wa','text');

		$form->setRequired('All');
		$form->setFormName('data_legal_edit');
		$form->form();

		$lpk_dok = new zea();
		$lpk_dok->init('edit');
		if(!empty($id))
		{
			$lpk_dok->setId($id);	
		}
		$lpk_dok->setHeading($bisnis['title'].' Dokumentasi <a href="'.base_url('admin/lpk/data_legal').'" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> Reload</a>');
		$lpk_dok->setEditStatus(false);
		$lpk_dok->setTable('lpk_data_dok');
		$lpk_dok->addInput('lpk_id','static');
		$lpk_dok->setValue('lpk_id',$lpk['id']);
		$lpk_dok->addInput('images','files');
		$lpk_dok->setLabel('images','Dokumentasi (upload beberapa foto dokumentasi)');
		$lpk_dok->setAccept('images','.jpg,.png,.jpeg');
		$lpk_dok->setFormName('data_legal_dok');
		$lpk_dok->form();

	}else{
		msg('maaf anda belum memiliki lpk, silahkan hubungi admin','danger');
	}
}else{
	msg('Maaf anda tidak bisa mengakses halaman ini','danger');
}