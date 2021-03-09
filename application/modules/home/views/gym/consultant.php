<?php if (!empty($data)): ?>
	<div class="box box-warning">
	  <div class="box-header with-border">
	    <h3 class="box-title">List Pelatih</h3>

	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	    </div>
	  </div>
	  <!-- /.box-header -->
	  <div class="box-body">
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
	      	<?php foreach ($data as $key => $value): ?>
	      		<div class="col-md-3">
	          	<div class="panel panel-default">
	          		<div class="panel-body" style="padding: 0;">
									<table class="table">
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td><?php echo $value['nama'] ?> </td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td><?php echo $value['alamat'] ?> </td>
										</tr>
									</table>
	          			<hr>
	          			<span class="product-description">
	                	Konsultasi via : <a href="https://wa.me/<?php echo $value['wa'];?>?text=saya ingin konsultasi" class="btn btn-sm btn-block btn-success" style="font-size: 24px;"><i class="fa fa-whatsapp"></i></a>
	              	</span>
	          		</div>
	          	</div>
	      		</div>
	      	<?php endforeach ?>
	      </div>
	    </div>
	  </div>
	  <div class="box-footer">
			
	  </div>
	</div>
<?php endif ?>