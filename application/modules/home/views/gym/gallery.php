<div class="row">
	<?php if (!empty($data['data'])): ?>
		<?php foreach ($data['data'] as $key => $value): ?>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<img src="<?php echo image_module('gym_gallery',$value['id'].'/'.$value['gambar']) ?>" class="img img-responsive" style="image-fit: cover; max-height: 250px;max-width: 250px;">
					</div>
					<div class="panel-footer">
						<?php echo substr($value['deskripsi'], 0,12) ?>...
					</div>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</div>
<div class="row">
	<?php if (!empty($data['pagination'])): ?>
		<?php echo $data['pagination'] ?>
	<?php endif ?>
</div>