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
	<?php if (!empty($form->form())): ?>
		<?php $form->form() ?>
	<?php endif ?>
<?php endif ?>