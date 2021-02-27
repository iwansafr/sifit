<div class="row">
	<?php if (!empty($data['data'])): ?>
		<?php foreach ($data['data'] as $key => $value): ?>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="<?= base_url('home/gym/produk_detail/'.$value['id'].'/'.urlencode($value['nama'])) ?>">
							<img src="<?php echo image_module('gym_gallery',$value['id'].'/'.$value['gambar']) ?>" class="img img-responsive" style="max-height: 250px;">
						</a>
						<p>
							<a href="<?= base_url('home/gym/produk_detail/'.$value['id'].'/'.urlencode($value['nama'])) ?>" class="text-black">
								<?php echo $value['nama'] ?>
							</a>
						</p>
						<p>
							<span class="badge badge-info">Rp <?= number_format($value['harga'],0,',','.') ?></span>
						</p>
					</div>
					<div class="panel-footer">
						<a href="https://wa.me/<?php echo $meta['contact']['wa'];?>?text=<?php echo urlencode('saya ingin memesan produk '.$value['nama'].' '.base_url('home/gym/produk_detail/'.$value['id'].'/'.$value['nama']));?>" class="btn btn-success"><i class="fa fa-whatsapp"></i> Pesan</a>
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