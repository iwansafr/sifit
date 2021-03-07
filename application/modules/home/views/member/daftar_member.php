<?php if (empty($_GET['gym_id'])): ?>
	<?php if (!empty($data)): ?>
		<form action="" method="get">
			<div class="form-group">
				<label for="">pilih gym</label>
				<select name="gym_id" class="form-control select2">
					<?php foreach ($data as $key => $value): ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['nama'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-sm btn-info">Pilih</button>
			</div>
		</form>
	<?php endif ?>
<?php else: ?>
	<?php if (!empty($paket)): ?>
		<?php 
		$form = new Zea();
		$form->init('edit');
		$form->setTable('gym_member');

		$form->setEditStatus(false);
		$form->addInput('nama','text');
		$form->addInput('alamat','textarea');
		$form->addInput('tgl_masuk','text');
		$form->setType('tgl_masuk','date');
		$form->addInput('hp','text');
		$form->setType('hp','number');
		$form->addInput('paket_id','dropdown');
		$form->setOptions('paket_id',$paket);
		$form->setLabel('paket_id','pilih paket');
		$form->addInput('email','text');
		$form->setLabel('email','email yang digunakan untuk login nanti');
		$form->addInput('password','password');
		$form->setLabel('password','buat password untuk login nanti');
		$form->setRequired('All');
		$form->form();
		if($form->success)
		{
			$this->members_model->register_member_gym();
		}
		?>
	<?php endif ?>
<?php endif ?>