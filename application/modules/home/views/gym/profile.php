<?php
if(!empty($data))
{
	?>
	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title"><?php echo $data['nama'] ?></h3>
	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	    </div>
	  </div>
	  <div class="box-body">
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
					<h1><?php echo $data['nama'] ?></h1>
					<center>
						<img src="<?php echo image_module('gym',$data['id'].'/'.$data['image']) ?>" alt="">
					</center>
					<hr>
					<table class="table">
						<tr>
							<td>alamat</td>
							<td><?= $data['alamat'] ?> </td>
						</tr>
						<tr>
							<td>Hp</td>
							<td><?= $data['hp'] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?= $data['email'] ?></td>
						</tr>
						<tr>
							<td>fasilitas</td>
							<td>
								<?= $data['fasilitas'] ?>
							</td>
						</tr>
					</table>
	      </div>
	    </div>
	  </div>
	</div>
	<?php
}