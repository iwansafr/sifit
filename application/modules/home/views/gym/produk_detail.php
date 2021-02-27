<div class="panel panel-default">
	<div class="panel-body">
		<center>
			<img src="<?php echo image_module('gym_gallery',$data['id'].'/'.$data['gambar']) ?>" class="img img-responsive">
		</center>
		<h3>
			<?php echo $data['nama'] ?>
		</h3>
		<p>
			<span class="badge badge-info">Rp <?= number_format($data['harga'],0,',','.') ?></span>
		</p>
		<p>
			<?= $data['deskripsi'] ?>
		</p>
	</div>
	<div class="panel-footer">
		<a href="https://wa.me/<?php echo $meta['contact']['wa'];?>?text=<?php echo urlencode('saya ingin memesan produk '.$data['nama'].' '.current_url());?>" class="btn btn-success"><i class="fa fa-whatsapp"></i> Pesan</a>
	</div>
</div>