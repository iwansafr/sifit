<div class="row">
	<?php if (!empty($data['data'])): ?>
		<?php foreach ($data['data'] as $key => $value): ?>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="#" data-toggle="modal" data-target="#gallery_<?php echo $value['id'];?>">
							<img src="<?php echo image_module('gym_gallery',$value['id'].'/'.$value['gambar']) ?>" class="img img-responsive" style="max-height: 250px;">
						</a>
						<div class="modal fade" id="gallery_<?php echo $value['id'];?>" style="display: none;">
		          <div class="modal-dialog">
		            <div class="modal-content">
			          	<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">×</span></button>
		              </div>
		              <div class="modal-body">
										<img src="<?php echo image_module('gym_gallery',$value['id'].'/'.$value['gambar']) ?>" class="img img-responsive">
		              </div>
		            </div>
		          </div>
		        </div>
						<p>
							<?php echo $value['deskripsi'] ?>
						</p>
						<p>
							<span class="badge badge-info">Rp <?= number_format($value['harga'],0,',','.') ?></span>
						</p>
					</div>
					<div class="panel-footer">
						<a href="https://wa.me/<?php echo $meta['contact']['wa'];?>?text=<?php echo urlencode('saya ingin memesan produk '.current_url());?>" class="btn btn-success"><i class="fa fa-whatsapp"></i> Pesan</a>
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