<?php if (!empty($data['data'])): ?>
	<div class="box box-warning">
	  <div class="box-header with-border">
	    <h3 class="box-title">Data Tempat Fitnes</h3>

	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	    </div>
	  </div>
	  <!-- /.box-header -->
	  <div class="box-body">
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
	      	<?php foreach ($data['data'] as $key => $value): ?>
	      		<div class="col-md-3">
	          	<div class="panel panel-default">
	          		<div class="panel-body" style="padding: 0;">
	          			<span class="label pull-right bg-blue"><?php echo $value['nama'];?></span>
	          			<img src="<?php echo image_module('gym',$value['id'].'/'.$value['image']) ?>" alt="" style="object-fit: cover; width: 100%;height:150px;">
	          			<a href="<?php echo base_url('home/gym/profile/'.$value['id'].'/'.$value['nama']);?>" class="btn btn-sm btn-default">Profile</a>
	          			<a href="#" data-toggle="modal" data-target="#modal-fasilitas-<?php echo $value['id'];?>" class="btn btn-sm btn-default">Fasilitas</a>
	          			<a href="<?php echo base_url('home/gym/gallery/'.$value['id'].'/'.$value['nama']);?>" class="btn btn-sm btn-default">Gallery</a>
	          			<a href="<?php echo base_url('home/gym/paket/'.$value['id'].'/'.$value['nama']);?>" class="btn btn-sm btn-default">Paket</a>
	          			<a href="<?php echo base_url('home/gym/produk/'.$value['id'].'/'.$value['nama']);?>" class="btn btn-sm btn-default">Produk</a>
	          			<a href="<?php echo base_url('home/gym/jadwal/'.$value['id'].'/'.$value['nama']);?>" class="btn btn-sm btn-default">Jadwal</a>
	          			<a href="<?php echo base_url('home/member/daftar_member?gym_id='.$value['id'].'/'.$value['nama']);?>" class="btn btn-sm btn-default">Register Member</a>
	          			<a href="<?php echo base_url('home/gym/consultant?gym_id='.$value['id'].'/'.$value['nama']);?>" class="btn btn-sm btn-default">Konsultasi</a>
		              <div class="modal fade" id="modal-fasilitas-<?php echo $value['id'];?>" style="display: none;">
					          <div class="modal-dialog">
					            <div class="modal-content">
					              <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                  <span aria-hidden="true">×</span></button>
					                <h4 class="modal-title">Fasilitas</h4>
					              </div>
					              <div class="modal-body">
					                <?php echo $value['fasilitas'] ?>
					              </div>
					              <div class="modal-footer">
					                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					              </div>
					            </div>
					          </div>
					        </div>
	          			<hr>
	          			<span class="product-description">
	                	<a href="<?php echo base_url('home/gym/detail/'.$value['id'].'/'.urlencode(str_replace(' ','-',$value['nama']))) ?>"><b><?php echo $value['nama'] ?></b></a>
	              	</span>
	          		</div>
	          	</div>
	      		</div>
	      	<?php endforeach ?>
	      </div>
	    </div>
	  </div>
	  <div class="box-footer">
			<?php echo $data['pagination'];?>
	  </div>
	</div>
<?php endif ?>